from wtforms import Form, BooleanField, StringField, validators
from wtforms_sqlalchemy.orm import model_form
from flaskr.models import User


class UserForm(Form):
    username = StringField("Username", [validators.input_required(), validators.length(min=5, max=64)])
    password = StringField("Password", [validators.input_required(), validators.length(min=5, max=64)])
    email = StringField("Email", [validators.input_required(), validators.length(min=6, max=320), validators.email()])
    phone = StringField("Phone Number", [validators.input_required(), validators.length(min=10, max=10)])
    country = StringField("Country", validators=[validators.input_required()])
    state = StringField("State", validators=[validators.input_required()])
    city = StringField("City", validators=[validators.input_required()])
    street = StringField("Street", validators=[validators.input_required()])
    apartment = StringField("Apartment")
    postal_code = StringField("Postal Code")
