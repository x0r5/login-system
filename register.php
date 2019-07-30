<?php
// Allow  the config
define('__CONFIG__', true);
require_once "inc/config.php";

forceDashboard();
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
            <div class="row justify-content-md-center mt-5">
       <!-- FORM -->
                <form class="register-form">
                <h3>Register</h3>
                <div class="form-group">
                    <label for="email1">Email address</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" class="form-control" id="password1" placeholder="Password" required="required">
                </div>
                    <div class="alert alert-danger" role="alert" style="display: none">

                    </div>
                <button type="submit" class="btn btn-primary">Regisztráció</button>
                </form>
            </div>
        </div>

        <?php require_once "inc/footer.php" ?>

    </body>
</html>