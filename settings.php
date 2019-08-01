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
            <form class="form-settings">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name-settings">Név</label>
                        <input type="text" class="form-control" id="name-settings" value="<?php echo $__user->name; ?> ">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email-settings">Email</label>
                        <input type="email" class="form-control" id="email-settings" value="<?php echo $__user->email;?>">
                    </div>
                </div>
                <?php if(count($__user->addresses)== 0): ?>
                    <div class="alert alert-warning" role="alert">
                        There are no addresses. Do you want to add one?
                    </div>

                <?php else:
                    foreach($__user->addresses as $address){
                        $address->displayForm();
                    }
                    ?>


                <?php endif; ?>
            </form>
        </div>



    </div>
    <!-- /.container -->








        <?php require_once "inc/footer.php"; ?>
        
  </body>
    </body>
</html>