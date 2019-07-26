<?php
    //if there is no config var do not load the page
    if(!defined('__CONFIG__')){
        exit("You dont have a config file");
    }
    //require_once "../root.php";

    //error reporting
    error_reporting(-1);
    ini_set('display_errors', 'On');

    //Sessions are always on
    if(!isset($_SESSION)){
        session_start();
    }

    //
    include_once "classes/DB.php";
    include_once "functions.php";
    include_once "classes/User.php";



    //global variables

    //database connection
    $con = DB::getConnection();

    //user object if logged in
    $__user = null;
    if(isLoggedIn()){
        $__user = new User($_SESSION['user_id']);
    }
?>