<?php $title = 'Alaska - admin'; ?>
<?php 
if (isset($_SESSION['pseudo'])) 
{
?>
<?php ob_start(); ?>
<h1><a href="index.php?action=postForm">Ecrivez un nouveau chapitre</a><br>
ou<br>
Choisissez un chapitre à administrer :</h1>



<table class="table">
    <?php while ($data = $posts->fetch()): ?>
    <tbody>
        <tr>
            <td><a href="index.php?action=postAdmin&amp;id=<?= $data['id'] ?>"><?= $data['title'] ?></a></td>
            <td><?= $data['creation_date_fr'] ?></td>
            <td><a href="index.php?action=updatePost&amp;id=<?= $data['id'] ?>">Modifier ce chapitre </a></td>
            <td><a href="index.php?action=confirmPostDeletion&amp;id=<?= $data['id'] ?>"> Supprimer ce chapitre</a></td>
        </tr>
    </tbody>

    <?php endwhile; ?>
</table>
<?php $posts->closeCursor(); ?>
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