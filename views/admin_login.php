<!-- <h1>Your are not allowed to access this page</h1> -->
<?php
session_start();

use Model\Admin;

require $_SERVER['DOCUMENT_ROOT'] . '/auto_loader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $uname = htmlspecialchars($_POST['uname']);
    $pwd = htmlspecialchars($_POST['pwd']);

    if ($uname !== null && $pwd !== null && strlen($uname) > 2 && strlen($uname) < 21 && strlen($pwd) > 3 && strlen($pwd) < 7) {
        $result = Admin::login($uname, $pwd);
        if ($result && $result['success'] === 1) {
            $admin = $result['admin'];
            $_SESSION['admin_id'] = $admin['ad_id'];
        } else {
            $login_error = "true";
        }
    } else {
        $login_error = "true";
    }
}


if (isset($_SESSION['admin_id'])) {
    header("Location:/views/admin.php");
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

</head>

<body>

    <div class="container-fluid bg-light p-0">

        <?php include 'header.php' ?>

        <div class="container-fluid m-0 my-3 p-0">

            <div style="margin-top: 100px;margin-bottom: 100px;">

                <form class="row m-2 d-flex flex-column" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                        if ($login_error) {
                            echo '<div class="alert alert-danger text-center col-sm-6 col-md-6 col-lg-4 m-auto my-2">Login failed</div>';
                        }
                    }
                    ?>
                    <!-- <div class="alert alert-danger text-center col-sm-6 col-md-6 col-lg-4 m-auto my-2">Login failed</div> -->
                    <div class="col-sm-6 col-md-6 col-lg-4 m-auto  border py-4 px-3 m-3">
                        <h2 class="text text-primary text-center my-2">Admin Login Form</h2>
                        <div class="form-group my-2">
                            <label class="form-label" for="uname">Username:</label>
                            <input type="text" class="form-control" name="uname" id="uname" require>
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label" for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" require>
                        </div>
                        <div class="form-group my-2">
                            <button type="submit" name="submit" class="btn btn-success p-2" style="width: 100%;">Login</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <footer>
            <?php include_once('footer.php') ?>
        </footer>
    </div>



</body>
<script src="/assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>

</html>