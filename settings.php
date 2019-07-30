<?php 
// Allow  the config
define('__CONFIG__', true);
require_once "inc/config.php";

forceLogin();
?>


<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $__page_title; ?></title>

        <base href="/" />
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="inc/style.css">
    </head>
    <body>
    <?php
    include_once "inc/navbar.php";
    ?>


    <!-- Page Content -->
    <div class="container w-75 mt-5 settings-form">

        <div class="row justify-content-md-center">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name">Név</span>
                </div>
                <input type="text" value="<?php echo $__user->name ?>" class="form-control">
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="email">email</span>
                </div>
                <input type="text" value="<?php echo $__user->email ?>" class="form-control">
            </div>
        </div>



    </div>
    <!-- /.container -->








        <?php require_once "inc/footer.php"; ?>
        
  </body>
    </body>
</html>