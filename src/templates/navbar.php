<nav id="topnav">
    <link rel="stylesheet" href="/COSC-471/src/static/css/navbar.css">
    <h1 id="title"><?= htmlspecialchars($title ?? "Empty Page") ?></h1>
    <a href="/COSC-471/src/Pages/index.php/my-info">My Info</a>
    <a href="/COSC-471/src/Pages/index.php/products">Products</a>
    <a href="/COSC-471/src/Pages/index.php/dashboard">Dashboard</a>
    <div id="auth_links">
        <?php if (!isset($_SESSION["user"])): ?>
            <a class="auth_link" href="/COSC-471/src/Pages/index.php/register">Register</a>
            <a class="auth_link" href="/COSC-471/src/Pages/index.php/login">Log In</a>
        <?php else: ?>
            <a class="auth_link" href="/COSC-471/src/Pages/index.php/logout">Log Out</a>
        <?php endif; ?>
    </div>
</nav>
