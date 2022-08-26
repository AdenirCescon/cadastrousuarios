<?php
//echo 'user service privada<br>';
class UserService{

    private $connection;
    private $user;

    public function __construct(ConnectionDb $connection, User $user){
        $this->connection = $connection->connectDb();
        $this->user = $user;
    }

    public function registerUser(){

    }

    public function readAllUsers(){
        $query = "select * from user";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}