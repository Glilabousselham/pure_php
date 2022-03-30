<!-- <h1>Your are not allowed to access this page</h1> -->
<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/auto_loader.php';

use Model\Category;
use Model\Image;

if (!isset($_SESSION['admin_id'])) {
    header("Location:/views/admin_login.php");
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/bootstrap-5.1.3/css/bootstrap.min.css">
    <style>
        .no-content {
            width: 100%;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <div class="container-fluid bg-light p-0">

        <?php include 'header.php' ?>

        <div class="container-fluid m-0 my-3 p-0">
            <form action="get" class="row p-0 m-0 justify-content-start">
                <div class="col-sm-6 d-flex align-items-center">
                    <label for="cat" class="form-label me-2">category</label>
                    <select class="form-select" name="category" id="cat">
                        <option value="o0">all</option>
                        <?php
                        $cats = Category::getAll();
                        foreach ($cats as $cat) {
                            echo '<option value="' . $cat['cat_id'] . '">' . $cat['cat_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </form>

            <div class="row p-0 m-0 rounded">
                <?php

                $image = new Image();
                $images = $image->getNotAllowed();
                if (empty($images)) {
                    echo '<div class="no-content">No content</div>';
                } else {
                    foreach ($images as $img) {
                        $url = $img['img_url'];
                        $id = $img['img_id'];
                        $title = $img['img_title'];
                        $publisher = $img['img_publisher'];
                        echo '
                        <div class="col-lg-2 col-md-3 col-sm-4  p-1">
                            <div class="card p-0 m-0" style="width: 100;box-shadow: 1px 1px 10px -8px black;">
                                <img src="' . $url . '" class="card-img-top" alt="image">
                                <div class="card-body">
                                    <p class="card-text">' . $title . '<br><span style="font-size:14px; opacity:.9;">published by </span><span style="font-size:14px;" class="text-danger">' . $publisher . '</span></p>
                                    <form action="/controller/ar.php" method="POST">
                                        <input type="hidden" name="id" value="' . $id . '">

                                        <input class="btn btn-success py-0 px-1" type="submit" name="accept" value="accept">
                                        <input class="btn btn-danger py-0 px-1" type="submit" name="refuse" value="refuse">

                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                }
                ?>


            </div>

        </div>

        <footer>
            <?php include_once('footer.php') ?>
        </footer>
    </div>



</body>
<script src="/assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>

</html>