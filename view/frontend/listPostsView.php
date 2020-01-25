<?php $title = 'Liste des chapitres'; ?>

<?php ob_start(); ?>
<div class="container">
<h1 class="text-center">Chapitres</h1>


<?php while ($data = $posts->fetch()): ?>
    
        <h3>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= $data['title'] ?></a>
            
        </h3>
        <p>
            <?=  $data['content_short'] ?>...
        </p>
    
<?php endwhile; ?>
</div>
<?php $posts->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
