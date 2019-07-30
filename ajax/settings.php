<?php
// Allow  the config
define('__CONFIG__', true);
require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    $return = [];

    //get data from POST user input
    $email = $_POST['email'];
    $name = $_POST['name'];
    $street = $_POST['street'];
    $house = $_POST['house'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    //check against stored data
    $con = DB::getConnection();
    if($email != $__user->email || $name != $__user->name){
        $update = $con->prepare("UPDATE users SET email = :email, name = :name WHERE user_id = :userid");
        $update->bindParam(':email', $email, PDO::PARAM_STR);
        $update->bindParam(':name', $name, PDO::PARAM_STR);
        $update->bindParam(':userid', $__user->user_id, PDO::PARAM_INT);
        $update->execute();
    }
    $return['reply'] = "email or username updated";


    $return['error'] = "error happened";
    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;

}else{
    exit('invalid access to the file');
}


