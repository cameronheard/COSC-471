from pathlib import Path
from flask import Flask


def create_app(test_config=None):
    app = Flask(__name__, instance_relative_config=True)

    if test_config is None:
        app.config.from_pyfile("config.py", silent=True)
    else:
        app.config.from_mapping(test_config)

    try:
        Path(app.instance_path).mkdir()
    except FileExistsError:
        pass

    from flaskr import auth
    app.register_blueprint(auth.bp)

    return app
