<?php ob_start() ?>

<table>
    <tr>
        <td><label for="email">Email:</label></td>
        <td><input id="email" type="email" required></td>
    </tr>
    <tr>
        <td><label for="password">Password:</label></td>
        <td><input id="password" type="password" required></td>
    </tr>
</table>

<?php $form = ob_get_clean() ?>

<?php include __DIR__ . '/auth.php' ?>
