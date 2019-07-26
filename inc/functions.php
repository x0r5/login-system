<?php
function forceLogin(){
    if(isset($_SESSION['user_id'])){
        //OK the user is logged in
    }else{
        header('Location: /index.php'); exit;
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
    else if($item == "/index.php" and $_SERVER['REQUEST_URI'] == "/"){
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



?>