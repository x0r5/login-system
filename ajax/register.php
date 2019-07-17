<?php

// Allow  the config
define('__CONFIG__', true);
require_once "../inc/config.php";

header('Content-Type: application/json');

$array = ['test', 'test2', 'test3', array('name' => 'Soma', 'firstname' => 'Sebestyen')];

echo json_encode($array, JSON_PRETTY_PRINT);

?>