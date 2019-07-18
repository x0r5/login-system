<?php

// Allow  the config
define('__CONFIG__', true);
require_once "../inc/config.php";



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header('Content-Type: application/json');
    $return = [];

    //get data from POST user input
    $email = $_POST['email'];
    $password = $_POST['password'];


    //user does not exist
    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();
    if($findUser->rowCount() == 1){
        //user exists, check password
        $user = $findUser->fetch(PDO::FETCH_ASSOC); //create array

        //DEBUG
        //echo "<script>console.log( 'Debug Objects: " . $user['user_id'] . "' );</script>";

        if(password_verify($password, $user['password'])){
            //user is signed in
            $return['redirect'] = '/dashboard.php';
            $user_id = (int)$user['user_id'];
            $_SESSION['user_id'] = $user_id;
            $return['is_logged_in'] = true;
        }
        else{
            $return['error'] = "Invalid username or password";
        }
    }else{
        //user does not exists -> error message
        $return['error']= 'You don`t have an account, go to register....';


    }
    //user can be added

    //return info to redirect
    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;
}else{
    exit('invalid access to the file');
}

?>