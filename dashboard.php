<?php
// Allow  the config
define('__CONFIG__', true);
require_once "inc/config.php";


forceLogin();

//get all the data of the user from the DB, create User object
$user = new User($_SESSION['user_id']);

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
        <h2>Dashboard</h2>
    </div>
    <div class="row justify-content-md-center">
        <p>
            <?php
            echo "Today is: ";
            echo date("Y m d");

            ?>
        </p>
    </div>
    <div class="row justify-content-md-center">
        <h4>You are now logged in: <?php
            echo $__user->name;
            ?></h4>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-md-center dashboard">
    What do you want to do today?
        <button type="button" class="btn btn-secondary">Edit profile</button>

    </div>
</div>

<?php require_once "inc/footer.php"; ?>

</body>
</body>
</html>