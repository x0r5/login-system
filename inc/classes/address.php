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
    public $main; // 0 or 1

    private function __construct()
    {
        //do nothing
    }

    //construct based on address id
    public static function withId($add_id){
        $instance = new self();
        $sql = "SELECT * FROM `addresses` WHERE id = ".$add_id." LIMIT 1";
        $reply = DB::query($sql);
        if($reply->rowCount() == 1){
            $data = $reply->fetch(PDO::FETCH_OBJ);
            $instance->street = $data->street;
            $instance->house = $data->house;
            $instance->country = $data->country;
            $instance->city = $data->city;
            $instance->zip = $data->zip;
            $instance->id = $data->id;
            $instance->name = $data->name;
            return $instance;
        }else{
            return null;
        }
    }

    //construct blank object and get new object's id
    public function newObj(){
        global $__user;
        $instance = new self();
        $sql = "INSERT INTO `addresses` (`id`, `user_id`, `name`, `country`, `city`, `zip`, `street`, `house`, `note`, `main`) VALUES (NULL, '".$__user->user_id."', '', '', '', '', '', '', '', '0');";
        $insert = DB::query($sql);
        $this->id = $insert->lastInserId();
        return $instance;


    }

    //displays the address
    public function displayForm(){

        ?>
        <div class="form-row mt-5">
            <div class="form-group">
                <label for="address_name">Elnevezés</label>
                <input type="text" class="form-control" id="address_name" value="<?php echo $this->name;?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="street">Utca</label>
                <input type="text" class="form-control" id="street" value="<?php echo $this->street;?>">
            </div>
            <div class="form-group col-md-4">
                <label for="house">Ház</label>
                <input type="text" class="form-control" id="house" value="<?php echo $this->house;?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="country">Ország</label>
                <input type="text" class="form-control" id="country" value="<?php echo $this->country;?>">
            </div>
            <div class="form-group col-md-4">
                <label for="city">Város</label>
                <input type="text" class="form-control" id="city" value="<?php echo $this->city;?>">
            </div>
            <div class="form-group col-md-2">
                <label for="zip">Irányítószám</label>
                <input type="text" class="form-control" id="zip" value="<?php echo $this->zip;?>">
            </div>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="checkbox" <?php if($this->main == 1) echo "checked"; ?>>
            <label class="form-check-label" for="checkbox">Alapértelmezett?</label>
        </div>
        <div class="alert alert-danger" role="alert" style="display: none"></div>
        <div class="alert alert-primary" role="alert" style="display: none"></div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-danger">Delete address</button>
    <?php
    }

    public static function setAllNotMain(){
        global $__user;
        $sql = "UPDATE `addresses` SET `main` = '0' WHERE `addresses`.`user_id` = ".$__user->user_id;
        DB::query($sql);
    }


}
