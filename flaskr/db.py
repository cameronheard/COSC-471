from sqlalchemy import create_engine, MetaData
from instance.config import url

engine = create_engine(url)
metadata = MetaData(bind=engine)
