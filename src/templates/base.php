<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?? "Empty Page" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/COSC-471/src/static/css/base.css" type="text/css">
    <?php if (!empty($_SESSION["errors"])): ?>
        <script id="errors"
                type="application/json"><?= json_encode($_SESSION["errors"])  // Encodes the list of errors into a JSON array.  ?></script>
    <?php unset($_SESSION["errors"])  // After retrieving the errors, remove them from the session ?>
        <script defer src="/COSC-471/src/static/scripts/display_errors.js"></script>
    <?php endif; ?>
</head>
<body>
<?php include __DIR__ . "/navbar.php" ?>
<main id="content">
    <?= $content ?? "" ?>
</main>
</body>
</html>
