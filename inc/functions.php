<?php
function forceLogin(){
    if(isset($_SESSION['user_id'])){
        //OK
    }else{
        header('Location: /login.php'); exit;
    }
}


function forceDashboard(){
    if(isset($_SESSION['user_id'])){
        header('Location: /dashboard.php'); exit;
    }else{
        //OK
    }
}

?>