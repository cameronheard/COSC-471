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
import sqlalchemy
import re

bp = Blueprint("auth", __name__, url_prefix="/auth")


@bp.route("/register", methods=("GET", "POST"))
def register():
    if request.method == "POST":
        username = request.form["username"]
        password = request.form["password"]
        email_pattern = re.compile(r"^(?P<local>.{0,64})@(?P<domain>.{0,255})$")
        email = email_pattern.match(request.form["email"])
        error = None
        with engine.begin() as conn:
            if not username:
                error = "Username is required."
            elif not password:
                error = "Password is required."
            elif not request.form["email"]:
                error = "Email is required"
            elif not request.form["phone"]:
                error = "Phone number is required"
            elif (
                conn.execute(
                    "SELECT id FROM user WHERE username = ?", username
                ).first()
                is not None
            ):
                error = f"User {username} is already registered."
            elif email is None:
                error = "Invalid email."
            elif (
                conn.execute(
                    "SELECT id FROM user WHERE email = ?", email
                ).first()
                is not None
            ):
                error = f"Email address {request.form['email']} is already registered."

            if error:
                flash(error)
            else:
                conn.execute(
                    "INSERT INTO user (username, password, email_local, email_domain, phone)"
                    "VALUES (:username, :password, :email_local, :email_domain, :phone)",
                    username=username,
                    password=generate_password_hash(password),
                    email_local=email.group("local"),
                    email_domain=email.group("domain"),
                    phone=request.form["phone"]
                )
                return redirect(url_for("login"))

        return render_template(None)


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
