<?php


namespace Model;
require $_SERVER['DOCUMENT_ROOT'] . '/auto_loader.php';

use Connect,PDO;

class Category
{  
    public static function getAll(){
        $db =  Connect::init();
        $query = "SELECT * FROM categories";
        $statemenet = $db->query($query);
        $cats = $statemenet->fetchAll(PDO::FETCH_ASSOC);
        return $cats;
    }
}

