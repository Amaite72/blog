<?php $title = "Potablog"; ?>

<?php ob_start(); ?>
<h1>Le super blog!</h1>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>