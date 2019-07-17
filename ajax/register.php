<?php

// Allow  the config
define('__CONFIG__', true);
require_once "../inc/config.php";



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header('Content-Type: application/json');
    $return = [];
    //user does not exitst

    //user can be added

    //return info to redirect
    $return['redirect'] = 'index.php?this-was-a-redirect';
    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;
}else{
    exit('test');
}




?>