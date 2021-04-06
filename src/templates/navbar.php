<nav class="topnav">
    <span id="title"><?= htmlspecialchars($title ?? "Empty Page") ?></span>
    <a href="./my-info">My Info</a>
    <a href="./products">Products</a>
    <div id="auth_links">
        <?php if (!isset($_SESSION["user"])): ?>
            <a class="auth_link" href="./register">Register</a>
            <a class="auth_link" href="./login">Log In</a>
        <?php else: ?>
            <a class="auth_link" href="./logout">Log Out</a>
        <?php endif; ?>
    </div>
</nav>
