<?php
function forceLogin(){
    if(isset($_SESSION['user_id'])){
        //OK the user is logged in
    }else{
        header('Location: /login.php'); exit;
    }
}


function forceDashboard(){
    if(isLoggedIn()){
        header('Location: /dashboard.php'); exit;
    }else{
        //OK
    }
}

function setActiveNav($item){
    if($_SERVER['REQUEST_URI'] == $item){
        echo "active";
    }
}

function setDisabledNav(){
    if(!isLoggedIn()){
        echo "disabled";
    }
}

function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }
    else{
        return false;
    }
}

function findUser($con, $email, $return_assoc = false){
    $email = (string) Filter::String($email);

    $findUser = $con->prepare("SELECT user_id, password FROM  users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if($return_assoc){
        return $findUser->fetch(PDO::FETCH_ASSOC);
    }

    $user_found = (boolean)$findUser->rowCount();
    return $user_found;
}

?>