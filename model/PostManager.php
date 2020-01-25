<?php

namespace App\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, LEFT(content, 700) AS content_short, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date ASC LIMIT 0, 15');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function createChapter($title, $content)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW())');
        $newPost = $req->execute(array($title, $content));

        return $newPost;

    }

    public function chapterDestruction($id)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('DELETE FROM posts WHERE id=?');
        $destroyedChapter = $request->execute([$id]);
    }

    public function chapterUpdate($id, $title, $content)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = :nvtitre, content = :nvcontent WHERE id= :idchap');
        $updatedChapter = $request->execute(array(
            'nvtitre' => $title,
            'nvcontent' => $content,
            'idchap' => $id
        ));
    }

    public function getPostUpdate($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT title, content FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function loggingUser($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT user_login, user_password FROM admin_login WHERE user_login = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $result = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $result['user_password']);
        if (!$result) {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else {
            if ($isPasswordCorrect) {
                $_SESSION['pseudo'] = $pseudo;
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }

    public function loggingOut()
    {
        $_SESSION = array();
        session_destroy();
    }
}

