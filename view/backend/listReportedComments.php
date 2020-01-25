<?php $title = 'Alaska - admin'; ?>
<?php 
if (isset($_SESSION['pseudo'])) 
{
?>
<h1>Commentaires signalés :</h1>
<?php while ($badComment = $listReportedComments->fetch()): ?>

    
        
            <div class="comment-container">
                <p><strong><?= htmlspecialchars($badComment['author']) ?></strong> le <?= $badComment['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($badComment['comment'])) ?></p>
                <p><a href="index.php?action=supprimer&amp;commentId=<?= $badComment['id'] ?>">Supprimer</a></p>
                <p><a href="index.php?action=valider&amp;commentId=<?= $badComment['id'] ?>">Valider</a></p>
            </div>

<?php endwhile; ?>
<?php $listReportedComments->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<p><a href="index.php?action=adminPanel">Retour au menu principal</a></p>

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