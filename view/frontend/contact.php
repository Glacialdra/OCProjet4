<?php $title = 'Contact'; ?>
<?php ob_start(); ?>

<h1>Contacter l'auteur</h1>
    <h3>Tél: 01 02 33 44 55</h3>
    <h3>Courrier postal : 66 Galbadia road, PO box 75 36548 Timber city</h3>
    <div class="text-center">
        <p><img class="icon" src="../public/images/mail.png" alt="icône enveloppe"></p>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>