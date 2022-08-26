<?php
//echo 'user model privada<br>';
class User {
    private $id;
    private $name;
    private$pass;
    private$email;

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $value){
        $this->$attr = $value;
    }
}   
?>  