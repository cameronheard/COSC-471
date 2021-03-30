<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
</head>
<body>
<?php include __DIR__ . "/navbar.php" ?>
<?php if (!empty($_SESSION["errors"])): ?>
    <script>
        {
            let errors = JSON.parse('<?= json_encode($_SESSION["errors"])  // Encodes the list of errors into a JSON array. ?>');  // Reads the provided JSON array from the server.
            <?php unset($_SESSION["errors"])  // After retrieving the errors, remove them from the session ?>
            alert(errors.join("\n"));  // Alerts the user to the error(s).
        }
    </script>
<?php endif; ?>
<?= $content ?>
</body>
</html>
