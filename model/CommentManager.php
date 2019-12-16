<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, reported, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function signalComment(int $commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE comments SET reported = 1 WHERE id=?');
        $commentSignaled = $request->execute([$commentId]);

        return $commentSignaled;
    }

    public function getReported()
    {
        $db = $this->dbConnect();
        $badComments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE reported = 1 ORDER BY comment_date DESC');
        $badComments->execute(array());

        return $badComments;
    }

    public function resetComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE comments SET reported = 0 WHERE id=?');
        $commentreset = $request->execute([$commentId]);

        return $commentreset;
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('DELETE FROM comments WHERE id=?');
        $commentreset = $request->execute([$commentId]);
    }
}
