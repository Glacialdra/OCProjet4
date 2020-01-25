<?php $title = 'Alaska - admin'; ?>
<?php ob_start(); ?>
<h1>Vous avez bien été déconnecté !</h1>

<h3><a href="index.php">Retour au blog</a><h3>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>