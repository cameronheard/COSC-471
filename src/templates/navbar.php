<nav class="topnav">
    <span id="title"><?= htmlspecialchars($title) ?></span>
    <div id="auth_links">
        <?php if (!isset($_SESSION["user"])): ?>
            <a class="auth_link" href="/index.php/register">Register</a>
            <a class="auth_link" href="/index.php/login">Log In</a>
        <?php else: ?>
            <a class="auth_link" href="/index.php/logout">Log Out</a>
        <?php endif; ?>
    </div>
</nav>
