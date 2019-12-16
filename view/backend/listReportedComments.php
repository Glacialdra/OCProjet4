<?php $title = 'Mon blog'; ?>
<h1>Commentaires signalés :</h1>

    <?php while ($badComment = $listReportedComments->fetch()): ?>
   
    <div class="badComments">
        <h3>
            <?= htmlspecialchars($badComment['author']) ?>
            <em>le <?= $badComment['comment_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($badComment['comment'])) ?>
            <a href="index.php?action=supprimer&amp;commentId=<?= $badComment['id'] ?>">Supprimer</a>
            <a href="index.php?action=valider&amp;commentId=<?= $badComment['id'] ?>">Valider</a>
            <br />
        </p>
        
    </div>
    <?php endwhile; ?>
<?php $listReportedComments->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<p><a href="index.php">Retour à la liste des billets</a></p>
<?php require('view\frontend\template.php'); ?>