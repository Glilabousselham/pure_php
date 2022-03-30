<?php
namespace Model;

use Connect;

require $_SERVER['DOCUMENT_ROOT'] .'/auto_loader.php' ;

class Admin {

    public static function login(string $uname, string $pwd){
        $db = Connect::init();
        $statement = $db->prepare("SELECT * FROM admins WHERE username = ? LIMIT 1");
        $statement->execute([$uname]);
        $admin = $statement->fetch();

        if ($admin) {
            if ($admin['password'] === $pwd) {
                return [
                    'success'=>1,
                    'admin' => $admin,
                ];
            }
        }

        return [
            'success' => 0,
        ];
    }

}