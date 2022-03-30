<?php

namespace Model;

use PDO,PDOException;

class Image
{
    private $db;
    function __construct()
    {
        $host = 'localhost';
        $db = 'db_name';
        $user = 'root';
        $password = '';
        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
        $this->db = new PDO($dsn, $user, $password);
    }

    public function save($image)
    {
        $query = 'INSERT INTO images(img_url,img_title,img_publisher,img_allowed,cat_id) VALUES(:img_url,:img_title,:img_publisher,:img_allowed,:cat_id)';
        $statemenet = $this->db->prepare($query);
        $isInserted = $statemenet->execute([
            ':img_url'=>$image['url'],
            ':img_title'=>$image['title'],
            ':img_publisher'=>$image['publisher'],
            ':img_allowed'=>0,
            ':cat_id'=>$image['cat_id']
        ]);
        return $isInserted;
    }
    public function getAll()
    {
        $query = 'SELECT * FROM images';
        $statemenet = $this->db->query($query);
        $images = $statemenet->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }
    public function getAllowed()
    {
        $query = 'SELECT * FROM images WHERE img_allowed  LIKE 1';
        $statemenet = $this->db->query($query);
        $images = $statemenet->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }
    public function getNotAllowed()
    {
        $query = 'SELECT * FROM images WHERE img_allowed  LIKE 0';
        $statemenet = $this->db->query($query);
        $images = $statemenet->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }


    public function accept($id)
    {
        $query = 'UPDATE images set img_allowed = 1 WHERE img_id LIKE :id';
        $statemenet = $this->db->prepare($query);
        $statemenet->bindParam(':id', $id);
        $executed = $statemenet->execute();
        return $executed;
    }
    public function refuse($id)
    {
        $query = 'DELETE FROM images WHERE img_id LIKE :id';
        $statemenet = $this->db->prepare($query);
        $statemenet->bindParam(':id', $id);
        $executed = $statemenet->execute();
        return $executed;
    }
    public function get($id)
    {
        $query = 'SELECT * FROM images WHERE img_id = ? LIMIT 1';
        $statemenet = $this->db->prepare($query);
        $statemenet->execute([$id]);
        $image = $statemenet->fetch();
        return $image;
    }
}
