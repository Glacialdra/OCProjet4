<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php while ($data = $posts->fetch()): ?>
    <div class="news">
        <h3>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
        </p>
    </div>
<?php endwhile; ?>
<?php $posts->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
