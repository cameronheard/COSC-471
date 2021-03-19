import functools
from flask import (
    Blueprint,
    flash,
    g,
    redirect,
    render_template,
    request,
    session,
    url_for,
)
from werkzeug.security import check_password_hash, generate_password_hash
from flaskr.database import engine, db_session
from flaskr.models import User
from flaskr.forms import UserForm, LoginForm
import sqlalchemy
import re
import json

bp = Blueprint("auth", __name__, url_prefix="/auth")


@bp.route("/register", methods=("GET", "POST"))
def register():
    form = UserForm(request.POST)
    if request.method == "POST" and form.validate():
        user = User()
        user.username = form.username
        user.password = generate_password_hash(form.password)
        user.phone = form.phone
        email_pattern = re.compile(r"^(?P<local>.{0,64})@(?P<domain>.{0,255})$")
        email = email_pattern.match(request.form["email"])
        user.email_local = email.group("local")
        user.email_domain = email.group("domain")
        address = {
            "country": form.country,
            "state": form.state,
            "city": form.city,
            "street": form.street,
            "apartment": form.apartment,
            "postal_code": form.postal_code,
        }
        user.address = json.dumps(address)
        db_session.add(user)
        return redirect(url_for("login"))

    return render_template("auth/register.html", form=UserForm())


@bp.route("/login", methods=("GET", "POST"))
def login():
    if request.method == "POST":
        username = request.form["username"]
        password = request.form["password"]
        error = None
        with engine.execute(
            "SELECT password FROM user WHERE username = ?", (username,)
        ) as results:
            results: sqlalchemy.engine.result.ResultProxy
            user = results.first()
            if user is None:
                error = "Incorrect username"
            elif not check_password_hash(user["password"], password):
                error = "Incorrect password"

            if error is None:
                session.clear()
                session["user_id"] = user["id"]


@bp.route("/logout")
def logout():
    session.clear()
    return redirect(url_for(None))
