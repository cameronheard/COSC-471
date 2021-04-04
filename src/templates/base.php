<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/static/base.css" type="text/css">
</head>
<body>
<?php include __DIR__ . "/navbar.php" ?>
<?php if (!empty($_SESSION["errors"])): ?>
    <script id="errors"
            type="application/json"><?= json_encode($_SESSION["errors"])  // Encodes the list of errors into a JSON array.  ?></script>
    <script>
        {
            let errors = JSON.parse(document.getElementById("errors").text);  // Reads the provided JSON array from the server.
            <?php unset($_SESSION["errors"])  // After retrieving the errors, remove them from the session ?>
            alert(errors.join("\n"));  // Alerts the user to the error(s).
        }
    </script>
<?php endif; ?>
<div id="content">
    <?= $content ?>
</div>
</body>
</html>
