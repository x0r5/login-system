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
    if(User::find($email)){
        //user exists, check password



        $user = User::checkPassword($email, $password);
        //DEBUG
        //echo "<script>console.log( 'Debug Objects: " . $user['user_id'] . "' );</script>";

        if($user != null){
            //user is signed in
            $return['redirect'] = '/dashboard.php';
            $_SESSION['user_id'] = $user->user_id;
        }
        else{
            $return['error'] = "Invalid username or password";
            $return['is_logged_in']= false;
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