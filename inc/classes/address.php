<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}

class Address{
    public $street;
    public $house;
    public $country;
    public $city;
    public $zip;
    public $id;
    public $name;

    public function __construct($add_id){
        $sql = "SELECT * FROM `addresses` WHERE id = ".$add_id." LIMIT 1";
        $reply = DB::query($sql);
        if($reply->rowCount() == 1){
            $data = $reply->fetch(PDO::FETCH_OBJ);
            $this->street = $data->street;
            $this->house = $data->house;
            $this->country = $data->country;
            $this->city = $data->city;
            $this->zip = $data->zip;
            $this->id = $data->id;
            $this->name = $data->name;
        }


    }


}
