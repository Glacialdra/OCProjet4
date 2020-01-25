<?php $title = 'Alaska - admin'; ?>
<?php 
if (isset($_SESSION['pseudo'])) 
{
?>
<h1>Êtes-vous sûr de vouloir supprimer ce chapitre ?</h1>

    <p><a href="index.php?action=deleteChapter&amp;id=<?= $_GET['id'] ?>">Supprimer</a></p>
    <p><a href="index.php?action=adminPosts">Annuler</a></p>
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