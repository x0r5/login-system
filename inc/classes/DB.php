<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}

require_once "credentials.php";
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

class DB{
    protected static $con;


    //constructor function runs everytime new DB() called
    private function __construct(){
        try{
            self::$con = new PDO("mysql:host=localhost;dbname=login;port=3306", Credentials::$username, Credentials::$password);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
            self::$con->query("SET NAMES utf8"); // needed for special characters: é á ű
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


    public static function query($sql){
        $con = self::getConnection();
        $reply = $con->prepare($sql);
        $reply->execute();
        return $reply;
    }
}
/*
class MongoDB
{
    protected static $db;

    private function __construct()
    {
        try {

            // connect to mongodb
            $client = new MongoDB\Client("mongodb://localhost:27017");

            echo "Connection to database successfully";
            // select a database
            self::$db = $client->test;

            echo "Database test selected";
        }catch( MongoConnectionException $e){
            echo "No connection to mongodDB is the mongo process running? ".$e ;
        }
    }

    public static function getDatabase(){
        if(!self::$db){
            new MongoDB();
        }

        return self::$db;
    }
}
*/
?>