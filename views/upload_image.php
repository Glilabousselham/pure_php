<?php

require $_SERVER['DOCUMENT_ROOT'] . '/auto_loader.php';

use Model\Category;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link rel="stylesheet" href="/assets/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/upload_image.css">
</head>

<body>

    <div class="container-fluid bg-light p-0">

        <?php require("header.php") ?>


        <div class="container-fluid m-0 my-3 p-0">
            <?php
            if (isset($_GET['success'])) {

                if ($_GET['success'] == true) {
                    echo "
                            <div class='alert alert-success text-center'>upload successful</div>     
                        ";
                } else {
                    $error = $_GET['error'];
                    if ($error == 'size') {
                        $error = 'this image is too big!';
                    } else if ($error == 'type') {
                        $error = 'this type is not allowed!';
                    } else if ($error == 'connection') {
                        $error = 'connection was broken!';
                    } else {
                        $error = 'something went wrong!';
                    }


                    echo "
                        <div class='alert alert-danger text-center'>error: $error</div>
                    ";
                }
            }
            ?>
            <!-- form start -->
            <div class="row">
                <div class="col-md-8 p-0 m-0">
                    <form action="/controller/upload_image.php" method="POST" enctype="multipart/form-data">
                        <h2>Upload Image</h2>
                        <div class="row px-3">
                            <div class="col-sm-4 py-1">
                                <label for="name">Your name</label>
                            </div>
                            <div class="col-sm-8 py-1">
                                <input class="form-control" minlength="3" maxlength="20" type="text" name="publisher" id="publisher" required>
                            </div>
                            <!--  -->
                            <div class="col-sm-4 py-1">
                                <label for="img">Image</label>
                            </div>
                            <div class="col-sm-8 py-1">
                                <input class="form-control" type="file" name="image" id="img" required>
                            </div>
                            <!--  -->
                            <div class="col-sm-4 py-1">
                                <label for="title">Title</label>
                            </div>
                            <div class="col-sm-8 py-1">
                                <input class="form-control" minlength="5" maxlength="50" type="text" name="title" id="title" required>
                            </div>
                            <!--  -->
                            <div class="col-sm-4 py-1">
                                <label for="cat">Category</label>
                            </div>
                            <div class="col-sm-8 py-1">
                                <select class="form-select" name="category" id="cat">

                                    <?php
                                    $cats = Category::getAll();
                                    foreach ($cats as $cat) {
                                        echo '<option value="' . $cat['cat_id'] . '">' . $cat['cat_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--  -->
                            <div class="col-sm-12 py-1">
                                <button type="submit" class="btn btn-success my-1" style="width: 100%;">Upload</button>
                                <button type="button" id="btn-cancel" class="btn btn-outline-primary my-1" style="width: 100%;">Cancel</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-4 p-0 m-0">
                    <div class="logo">
                        <div class="square">
                            <div class="gb">GB</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- form end -->
        </div>
        <footer>
            <?php include_once('footer.php') ?>
        </footer>
    </div>



</body>
<script src="/assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>
<!-- <script src="/js/hot_reload.js"></script> -->
<script>
    document.querySelector('#btn-cancel').onclick = function() {
        window.location.replace('/index.php');
    }
</script>

</html>