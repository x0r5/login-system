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

    public function __construct(int $user_id) {
        $this->con = DB::getConnection();
        //find the user based on user_id
        $user = $this->con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
        $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $user->execute();
        if($user->rowCount() == 1) {
            $user = $user->fetch(PDO::FETCH_OBJ);
            $this->email 		= (string) $user->email;
            $this->user_id 		= (int) $user->user_id;
            $this->reg_time 	= (string) $user->reg_time;
            $this->name         = (string) $user->name;
        } else {
            // No user.
            // Redirect to to logout.
            header("Location: /logout.php"); exit;
        }
    }

    //password check and CONSTRUCTOR also if pssw is correct
    public static function checkPassword($email, $password){
        $user = User::find($email, true);
        if(password_verify($password, $user['password'])){
            //password is ok, create new user object
            $instance = new self($user['user_id']);
            return $instance;
        }
        else{
            return null;
        }
    }

    //search user by email
    //@param $retrun_assoc: true if user data is also wanted
    public static function find($email, $return_assoc = false){
        $email = (string) Filter::String($email);

        $findUser = $con->prepare("SELECT * FROM  users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($return_assoc){
            return $findUser->fetch(PDO::FETCH_ASSOC); //creates an array
        }

        $user_found = (boolean)$findUser->rowCount(); //1 or 0
        return $user_found;
    }


}

?>