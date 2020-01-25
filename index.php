<?php
session_start();
//chargement des controllers

require('controller/frontend.php');
require('controller/backend.php');

// Partie front-end : affichage des chapitres, commentaires 

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
    elseif ($_GET['action'] == 'about') {
        about();
    }
    elseif ($_GET['action'] == 'contact') {
        contact();
    }
    // Partie back end
    // 1 Commentaires

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

    //2 Billets

    elseif ($_GET['action'] == 'adminPanel') {
        listPostsAdmin();
    }

    elseif ($_GET['action'] == 'adminPosts') {
        listPostsAdmin();
    }
    elseif ($_GET['action'] == 'postAdmin') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            postAdmin();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'postForm') {
        chapterForm();
    }
    elseif ($_GET['action'] == 'createPost') {
       if ($_POST['title'] != "" && $_POST['content'] != "")
        {
        createPost($_POST['title'], $_POST['content']);
       }
       else {
           echo 'Il manque un titre et/ou du texte';
       }
    }
    elseif ($_GET['action'] == 'confirmPostDeletion') {
        confirmDeletion();
    }
    elseif ($_GET['action'] == 'deleteChapter') {
        destroyChapter($_GET['id']);
    }
    elseif ($_GET['action'] == 'updatePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            typeUpdate($_GET['id']);
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'updateForm') {
        if (isset($_GET['id']) && isset($_POST['title']) && isset($_POST['content']) && $_GET['id'] > 0) {
            updateChapter($_GET['id'], $_POST['title'], $_POST['content']);
        }
        else {
            echo 'Erreur : manque titre, contenu ou identifiant du billet';
        }
    }

    // 3 Authentification

    elseif ($_GET['action'] == 'login') {
        displayLogin();
    }
    elseif ($_GET['action'] == 'authentification') {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            authentificate($_POST['username']);
        }
        else {
            echo 'Erreur : veuillez renseigner tous les champs';
        }
        
    }
    elseif ($_GET['action'] == 'logOut') {
        logOut();
    }

}
else {
    listPosts();
}

