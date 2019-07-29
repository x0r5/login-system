<?php 
// Allow  the config
define('__CONFIG__', true);
require_once "inc/config.php";

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
    <div class="container">

        <div class="row">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">email</span>
            </div>
            <input type="text" class="form-control">
        </div>
        <div class="row">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Név</span>
            </div>
            <input type="text" class="form-control">
        </div>

            
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->








        <?php require_once "inc/footer.php"; ?>
        
  </body>
    </body>
</html>