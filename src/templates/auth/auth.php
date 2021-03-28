<?php ob_start() ?>

<form method="POST" id="user_form" action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]) ?>">
    <?= $form ?>
    <button type="submit">Submit</button>
</form>

<?php $content = ob_get_clean() ?>

<?php include __DIR__.'/../base.php' ?>
