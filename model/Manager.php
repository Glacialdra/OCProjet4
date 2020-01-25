<?php

namespace App\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=openclassroom;charset=utf8', 'root', '');
        return $db;
    }
}
