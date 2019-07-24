<?php

// Allow  the config
define('__CONFIG__', true);
require_once "inc/config.php";

//require 'vendor/autoload.php';

$db = MongoDB::getDatabase();
echo $_SERVER['DOCUMENT_ROOT'];

?>