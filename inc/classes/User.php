<?php

// Allow  the config
define('__CONFIG__', true);
require_once "../config.php";


class User
{
    private $con;

    public $user_id;
    public $email;
    public $reg_time;

    public function __construct($user_id) {
        $this->con = DB::getConnection();
        $user_id = Filter::Int( $user_id );
        $user = $this->con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
        $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $user->execute();
        if($user->rowCount() == 1) {
            $user = $user->fetch(PDO::FETCH_OBJ);
            $this->email 		= (string) $user->email;
            $this->user_id 		= (int) $user->user_id;
            $this->reg_time 	= (string) $user->reg_time;
        } else {
            // No user.
            // Redirect to to logout.
            header("Location: /logout.php"); exit;
        }
    }


}

?>