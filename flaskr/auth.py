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
