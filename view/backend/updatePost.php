<?php $title = 'Alaska - admin'; ?>
<?php 
if (isset($_SESSION['pseudo'])) 
{
?>
<?php ob_start(); ?>
<div class="container">
<form action="index.php?action=updateForm&amp;id=<?= $_GET['id'] ?>" method="post">
    <div>
        <label for="titleupdate">Titre</label><br />
        <input type="text" id="titleupdate" name="titleupdate" value="<?=$post['title'] ?>">
    </div>
    <div>
        <label for="contentupdate">Texte</label><br />
        <textarea id="contentupdate" name="contentupdate" ><?=$post['content']?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
</div>

<script src="../../node_modules/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
        selector: '#contentupdate',
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

 