<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}

//error reporting
error_reporting(-1);
ini_set('display_errors', 'On');

//Sessions are always on
if(!isset($_SESSION)){
    session_start();
}

//    INCLUDES
include_once "functions.php";

//global variables

//database connection
$con = DB::getConnection();
?>