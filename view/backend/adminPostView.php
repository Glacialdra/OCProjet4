<?php $title = htmlspecialchars($post['title']); ?>
<?php 
if (isset($_SESSION['pseudo'])) 
{
?>
<?php ob_start(); ?>
<div class="container">
    <p><a href="index.php?action=adminPosts">Retour à la liste des billets</a></p>
    <h3><a href="index.php?action=updatePost&amp;id=<?= $_GET['id'] ?>">Modifier ce chapitre</a></h3>
    <h3><a href="index.php?action=confirmPostDeletion&amp;id=<?= $_GET['id'] ?>">Supprimer ce chapitre</a></h3>

<div class="news">
    <h3>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= $post['content'] ?>
    </p>
</div>

<?php while ($comment = $comments->fetch()): ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php if (!$comment['reported']): ?>
    <p><a href="index.php?action=supprimer&amp;commentId=<?= $comment['id'] ?>">Supprimer</a></p>
    <?php endif; ?>
<?php endwhile; ?>
</div>
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

