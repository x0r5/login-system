<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}

class User
{
    private $con;

    public $user_id;
    public $email;
    public $reg_time;
    public $name;
    public $address; //current address
    public $addresses; //new feature

    //construct based on database data
    public function __construct($user_id) {
        //set the connection
        $this->con = DB::getConnection();
        //find the user based on user_id
        $user = $this->con->prepare("SELECT user_id, email, reg_time, name FROM users WHERE user_id = :user_id LIMIT 1");
        $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $user->execute();
        if($user->rowCount() == 1) {
            $user = $user->fetch(PDO::FETCH_OBJ);
            $this->email 		= (string) $user->email;
            $this->user_id 		= (int) $user->user_id;
            $this->reg_time 	= (string) $user->reg_time;
            $this->name         = (string) $user->name;
            //get the address
            $reply = DB::query("SELECT * FROM `addresses` WHERE user_id = ".$this->user_id);
            // get addresses from database constuct objects
            while($row = $reply->fetch(PDO::FETCH_ASSOC)){
                //$this->addresses[$row['name']] = new Address($row['id']);
                $this->addresses[$row['id']] = Address::withId($row['id']);
            }

            /*
            $address = $this->con->prepare("SELECT country, city, zip, house, street FROM addresses WHERE user_id = :userid LIMIT 1");
            $address->bindParam(':userid', $user_id, PDO::PARAM_INT);
            $address->execute();
            if($address->rowCount() == 1){
                $address = $address->fetch(PDO::FETCH_OBJ);
                $this->address['country']     = (string)$address->country;
                $this->address['city']        = (string)$address->city;
                $this->address['zip']         = (string)$address->zip;
                $this->address['street']      = (string)$address->street;
                $this->address['house']       = (string)$address->house;
            }
            */
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
    //there is no db connection yet, so neet to connect first
    //@param $retrun_assoc: true if user data is also wanted
    public static function find($email, $return_assoc = false){
        //$email = (string) Filter::String($email);
        $con = DB::getConnection();
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

