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
        <title>Page title</title>

        <base href="/" />
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="inc/style.css">
    </head>
    <body>
    <?php
    include_once "inc/navbar.php";
    ?>

        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <p>
                    <?php 
                        echo "Today is: ";
                        echo date("Y m d");
                        
                    ?>
                </p>
            </div>
            <div class="row justify-content-md-center">
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>
        </div>

        <?php require_once "inc/footer.php"; ?>
        
  </body>
    </body>
</html>