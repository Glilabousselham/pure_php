<?php


use PDO;

class Connect
{

    public static function init()
    {
        $host = 'localhost';
        $db = 'db_name';
        $user = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $pdo = new PDO($dsn, $user, $password);

            return $pdo;
        } catch (PDOException $e) {
            return false;
        }
    }
}
