<?php $title = $post['title']; ?>

<?php ob_start(); ?>



<div>
    <h2>
        <?= $post['title'] ?>
    </h2>

    <p>
        <?= $post['content'] ?>
    </p>
</div>

<p><a href="index.php">Retour à la liste des chapitres</a></p>

<h2>Commentaires</h2>

    <?php while ($comment = $comments->fetch()): ?>
        <div class="comment-container">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
            <?php if (!$comment['reported']): ?>
            <p><a href="index.php?action=signalComment&amp;commentId=<?= $comment['id'] ?>">Signaler</a></p>
       
        <?php endif; ?>
    <?php endwhile; ?>


<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input class="form-control" type="text" id="author" name="author" required />
    </div>
    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment" required></textarea>
    </div>
    <div>
        <input class="btn btn-primary" type="submit" />
    </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
