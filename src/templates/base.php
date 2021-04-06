<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?? "Empty Page" ?></title>
    <link rel="stylesheet" href="/static/base.css" type="text/css">
    <?php if (!empty($_SESSION["errors"])): ?>
        <script id="errors"
                type="application/json"><?= json_encode($_SESSION["errors"])  // Encodes the list of errors into a JSON array.  ?></script>
    <?php unset($_SESSION["errors"])  // After retrieving the errors, remove them from the session ?>
        <script defer src="../static/scripts/display_errors.js"></script>
    <?php endif; ?>
</head>
<body>
<?php include __DIR__ . "/navbar.php" ?>
<div id="content">
    <?= $content ?? "" ?>
</div>
</body>
</html>
