<?php
require $_SERVER['DOCUMENT_ROOT'] . '/auto_loader.php';

use Model\Image;

$success = '';
if (isset($_POST['id']) && $_POST['id'] != null) {
    
    $image = new Image();
    $id = $_POST['id'];
    $image_url = realpath(dirname(getcwd())).$image->get($id)['img_url'];
    

    if ($_POST['accept']) {
        //accept
        $success = $image->accept($id)?'true':'false';
    } else {
        $success = $image->refuse($id) ? 'true' : 'false';
        if ($success) {
            if (file_exists($image_url)) {
                unlink($image_url);
            }
        }
    }

}else {
    $success = 'false';
}

header("Location:/views/admin.php?success=$success");
