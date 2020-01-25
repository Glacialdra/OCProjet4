<?php $title = "Création d'un nouveau chapitre" ?>
<?php 
if (isset($_SESSION['pseudo'])) 
{
?>
<div class="container">
<h1>Création d'un nouvel article</h1>

<form action="index.php?action=createPost" method="post">
    <div class="form-group">
        <label for="title">Titre</label>
        <input class="form-control" type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="content">Texte</label>
        <textarea class="form-control" id="content" name="content" required></textarea>
    </div>
        <input type="submit" class="btn btn-primary">
</form>
</div>
<script src="../../node_modules/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
        selector: '#content',
        language: 'fr_FR',
        min_height: 500
      });

</script>
<?php $content = ob_get_clean(); ?>
<?php require('view\backend\template.php'); ?>
<?php
}
else 
{
?>
    <h2>Vous n'êtes pas autorisé(e) à accéder à cette page.</h2>
    <p><a href="index.php?action=login">Cliquez ici pour vous authentifier.</a></p>
<?php
}
?>