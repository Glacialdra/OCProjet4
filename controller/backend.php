<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


use App\Model\CommentManager;
use App\Model\PostManager;


function listReported()
{
    $commentManager = new CommentManager();
    $listReportedComments = $commentManager->getReported();
    require('view/backend/listReportedComments.php');
}

function validate($commentId)
{
    $commentManager = new CommentManager();
    $signaledComment = $commentManager->resetComment($commentId);
    require('view/backend/reset.php');
}

function deleteBadComment($commentId)
{
    $commentManager = new CommentManager();
    $signaledComment = $commentManager->deleteComment($commentId);
    require('view/backend/deleteconfirm.php');
}

function listPostsAdmin()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/backend/listAdminPostsView.php');
}

function postAdmin()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    
    $comments = $commentManager->getComments($_GET['id']);
    $post = $postManager->getPost($_GET['id']);
    require('view/backend/adminPostView.php');
}

function chapterForm()
{
    require('view/backend/postChapterForm.php');
}

function confirmDeletion()
{
    require('view/backend/deletionConfirmation.php');
}

function destroyChapter($id)
{
    $postManager = new PostManager();
    $destroyedPost = $postManager->chapterDestruction($id);
    require('view/backend/chapterDeleteConfirm.php');
}

function updateChapter($id, $title, $content)
{
    $postManager = new PostManager();
    $updatedPost = $postManager->chapterUpdate($id, $title, $content);
    require('view/backend/chapterUpdateConfirm.php');
}

function typeUpdate($id)
{
    $postManager = new PostManager();
    $post = $postManager->getPostUpdate($_GET['id']);
    require('view/backend/updatePost.php');
}

function createPost($title, $content)
{
    $postManager = new PostManager();
    $newPost = $postManager->createChapter($title, $content);

    if ($newPost === false) {
        throw new Exception('Impossible d\'ajouter le chapitre !');
    }
    else {
        require('view/backend/postCreationConfirmed.php');
    }

}

function displayLogin()
{
    require('view/backend/login.php');
}

function authentificate($pseudo)
{
    $postManager = new PostManager();
    $loggedUser = $postManager->loggingUser($pseudo);
    $posts = $postManager->getPosts();
    require('view/backend/listAdminPostsView.php');
}

function logOut()
{
    $postManager = new PostManager();
    $loggedOut = $postManager->loggingOut();
    require('view/backend/loggedOutConfirm.php');
}

function displayAdmin()
{
    require('view/backend/listAdminPostsView.php');
}