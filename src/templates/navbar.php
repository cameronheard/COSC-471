<nav id="topnav">
    <link rel="stylesheet" href="/COSC-471/src/static/css/navbar.css">
    <h1 id="title"><?= htmlspecialchars($title ?? "Empty Page") ?></h1>
    <a href="./my-info">My Info</a>
    <a href="./products">Products</a>
    <a href="./dashboard">Dashboard</a>
    <div id="auth_links">
        <?php if (!isset($_SESSION["user"])): ?>
            <a class="auth_link" href="./register">Register</a>
            <a class="auth_link" href="./login">Log In</a>
        <?php else: ?>
            <a class="auth_link" href="./logout">Log Out</a>
        <?php endif; ?>
    </div>
</nav>
