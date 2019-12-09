<?php
require('controller/frontend.php');
require('controller/backend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'signalComment') {
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
            reportComment($_GET['commentId']);
        } else {
            echo 'erreur pas de commentaire trouvé';
        }
    }
    elseif ($_GET['action'] == 'adminComments') {
        listReported();
    }
    elseif ($_GET['action'] == 'valider') {
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
            validate($_GET['commentId']);
        } else {
            echo 'erreur pas de commentaire trouvé';
        }
    }
    elseif ($_GET['action'] == 'supprimer') {
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
            deleteBadComment($_GET['commentId']);
        } else {
            echo 'erreur pas de commentaire trouvé';
        }
    }
}
else {
    listPosts();
}