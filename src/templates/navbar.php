<nav class="topnav">
    <?= $title ?>
    <ul style="list">
        <?php if (!isset($_SESSION["user"])): ?>
        <li><a href="/index.php/register">Register</a></li>
        <li><a href="/index.php/login">Log In</a></li>
        <?php else: ?>
        <li><a href="/index.php/logout">Log Out</a></li>
        <?php endif; ?>
    </ul>
</nav>
