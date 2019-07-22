<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}

require_once "credentials.php";

class DB{
    protected static $con;


    //constructor function runs everytime new DB() called
    private function __construct(){
        try{
            self::$con = new PDO("mysql:host=localhost;dbname=login;port=3306", Credentials::$username, Credentials::$password);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
        } catch(PDOException $e){
            echo "Could not connect to database: ".$e."\r\n";
            exit;
        }
    }

    public static function getConnection(){
        if(!self::$con){
            new DB();
        }

        return self::$con;
    }
}


?>