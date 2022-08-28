<?php

class UserService
{
    private $connection;
    private $user;

    public function __construct(ConnectionDb $connection, User $user)
    {
        $this->connection = $connection->connectDb();
        $this->user = $user;
    }

    public function readAllUsers()
    {
        $query = "select * from user";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function searchUsers()
    {
        $query = "select * from user where name like :search";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':search', "%" . $this->user->__get('name') . "%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function registerUser()
    {
        $query = "INSERT INTO user (name, email, pass) VALUES (:name, :email, :pass)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':name', $this->user->__get('name'));
        $stmt->bindValue(':email', $this->user->__get('email'));
        $stmt->bindValue(':pass', $this->user->__get('pass'));
        $stmt->execute();
    }
}
