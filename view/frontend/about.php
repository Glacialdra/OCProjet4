<?php $title = 'A propos'; ?>
<?php ob_start(); ?>

<div class="container">
    <h1>A propos de l'auteur</h1>
        <div class="text-center">
            <p><img src="../public/images/jean.jpg" alt="portrait de l'auteur"></p>
        </div>
        <p>Jean Forteroche naît en 1974 dans la ville d'Esthar. Il développe très vite un goût prononcé pour la lecture, d'abord de fantasy, pour se tourner ensuite vers des romans. Il commence à écrire au collège, où il remporte plusieurs prix juniors. Après un bac littéraire au lycée de Balamb, il tente d'intégrer la promotion militaire de la faculté mais est déclaré inapte. Toujours motivé par l'écriture, il commence à écrire des piges pour le magazine Timber Maniacs. Son style peu commun attire l'attention de plusieurs éditeurs, et il publie à 20 ans son premier roman, <em>Ultimecia et la compression Temporelle</em>. Le voilà lancé, et c'est plusieurs ouvrages et récompenses prestigieuses plus tard que Jean décide audacieusement d'abandonner le format physique pour auto-publier son thriller nouveau-né dans une version strictement on-line.</p>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>