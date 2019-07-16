<?php
    //if there is no config var do not load the page
    if(!defined('__CONFIG__')){
        exit("You dont have a config file");
    }

    //
    include_once "inc/classes/DB.php";

    $con = DB::getConnection();
?>