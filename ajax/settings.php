<?php
// Allow  the config
define('__CONFIG__', true);
require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    $return = [];
    $return['reply'] = "";

    //get data from POST user input
    $email = $_POST['email'];
    $name = $_POST['name'];
    $street = $_POST['street'];
    $house = $_POST['house'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $main = $_POST['main']?1:0;

    //check against stored data
    $con = DB::getConnection();
    if($email != $__user->email){
        $update = $con->prepare("UPDATE users SET email = :email WHERE user_id = :userid");
        $update->bindParam(':email', $email, PDO::PARAM_STR);
        $update->bindParam(':userid', $__user->user_id, PDO::PARAM_INT);
        $update->execute();
        $return['reply'] = " email";
    }
    if($name != $__user->name){
        $update = $con->prepare("UPDATE users SET name = :name WHERE user_id = :userid");
        $update->bindParam(':name', $name, PDO::PARAM_STR);
        $update->bindParam(':userid', $__user->user_id, PDO::PARAM_INT);
        $update->execute();
        $return['reply'] .= " name";
    }


    class Update
    {
        private $sql;
        function updateTable($var, $name)
        {
            global $__user;
            global $con;
            global $return;
            $this->sql = "UPDATE addresses SET `" . $name . "` = ";
            if ($var != $__user->address[$name]) {
                if (is_int($var)) {
                    $this->sql .= $var;
                } else {
                    $this->sql .= "`" . $var . "` ";
                }
                $this->sql .= " WHERE id = ". $


                $query = "UPDATE addresses SET " . $name . " = :var WHERE user_id = :userid";
                $update = $con->prepare($query);
                //$update->bindParam(':name', $name, PDO::PAR);
                $update->bindParam(':var', $var, PDO::PARAM_STR);
                $update->bindParam(':userid', $__user->user_id, PDO::PARAM_INT);
                $update->execute();
                $return['reply'] .= " " . $name;
            }
        }
    }

    updateTable($street, "street");
    updateTable($house, "house");
    updateTable($country, "country");
    updateTable($city, "city");
    updateTable($zip, "zip");






    if(strlen($return['reply']) == 0){
        $return['error'] = "error happened";
    }
    else{
        $return['reply'] .= " updated";
    }


    echo json_encode($return, JSON_PRETTY_PRINT);
    exit;

}else{
    exit('invalid access to the file');
}


