<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}


class DB{
    protected static $con;
    require "credentials.php";

    //constructor function runs everytime new DB() called
    private function __construct(){
        try{
            self::$con ] new PDO("mysql:host=localhost;dbname=login;port=3306", $username, $password);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
        } catch(PDOException $e){
            echo "Could not connetct to database\r\n";
            exit;
        }
    }

    public statis function getConnection(){
        if(!self::$con){
            new DB();
        }

        return self::$con;
    }
}

?>