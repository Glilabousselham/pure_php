<?php



// header('Location:/views/upload_image.php');
require $_SERVER['DOCUMENT_ROOT'].'/auto_loader.php';
use Model\Image;


if (isset($_FILES['image']) && $_FILES['image'] != null) {

    $alowed_ext = array('png', 'jpg', 'jpeg', 'gif');
    $max_size = 10 * 1000 * 1000;

    $image = $_FILES['image'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];

    $exploded_arr = explode('.', $image['name']);
    $image_ext = strtolower(end($exploded_arr));

    $publisher = htmlspecialchars($_POST['publisher']);
    $title = htmlspecialchars($_POST['title']);
    $category = htmlspecialchars($_POST['category']);
    $image_name = uniqid('', true) . '.' . $image_ext;
    $image_url = realpath(dirname(getcwd())).'/storage/images/' . $image_name;
    if (in_array($image_ext, $alowed_ext)) {
        if ($image_size < $max_size) {
            if (move_uploaded_file($image_tmp_name, $image_url)) {
                
                $image = new Image();
                $isSaved = $image->save([
                    'url' => '/storage/images/' . $image_name,
                    'title' => $title,
                    'publisher' => $publisher,
                    'cat_id' => $category,
                ]);
                if ($isSaved) {
                    header('Location:/views/upload_image.php?success=true');
                } else {
                    header('Location:/views/upload_image.php?success=false&error=db');

                }
            } else {
                // not moved
                header('Location:/views/upload_image.php?success=false&error=connection');

            }
        } else {
            // big size
            header('Location:/views/upload_image.php?success=false&error=size');

        }
    } else {
        // not alowed
        header('Location:/views/upload_image.php?success=false&error=type');
    }

    echo "<div style='background-color:yellow;color:black;text-align:center;'>code isn't completed (try it later) <a href='/' style='color:red;'>back to home page</a> </div>";
} else {
    header('Location:/views/upload_image.php?success=false&error=unknown');
}


