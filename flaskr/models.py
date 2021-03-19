from sqlalchemy import Column, Integer, String, CHAR, Computed, JSON
from sqlalchemy.orm import relationship
from flaskr.database import Base


class User(Base):
    __tablename__ = "user"
    id = Column(Integer, primary_key=True, autoincrement=True, nullable=False)
    username = Column(String(length=64), unique=True, nullable=False)
    password = Column(CHAR(length=94), nullable=False)
    email = Column(Computed("email_local + '@' + email_domain", persisted=True))
    email_local = Column(String(length=64), nullable=False)
    email_domain = Column(String(length=255), nullable=False)
    phone = Column(CHAR(10), nullable=False)
    address = Column(JSON())
