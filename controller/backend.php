<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
use \OpenClassrooms\Blog\Model\CommentManager;

function listReported()
{
    $commentManager = new CommentManager();
    $listReportedComments = $commentManager->getReported();
    require('view/backend/listReportedComments.php');
}

function validate($commentId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $signaledComment = $commentManager->resetComment($commentId);
    require('view/backend/reset.php');
}

function deleteBadComment($commentId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $signaledComment = $commentManager->deleteComment($commentId);
    require('view/backend/deleteconfirm.php');
}