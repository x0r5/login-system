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

        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <form class="login-form">
                    <!--EMAIL-->
                <div class="form-group">
                    <label for="email1">Email address</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                    <!--PASSWORD-->
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" class="form-control" id="password1" placeholder="Password" required="required">
                </div>
                <button type="submit" class="btn btn-primary">Belépés</button>
                </form>
            </div>
        </div>

        <?php require_once "inc/footer.php" ?>
        
  </body>
    </body>
</html>