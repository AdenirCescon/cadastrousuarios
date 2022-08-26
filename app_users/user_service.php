<?php
//echo 'user service privada<br>';
class UserService
{

    private $connection;
    private $user;

    public function __construct(ConnectionDb $connection, User $user)
    {
        $this->connection = $connection->connectDb();
        $this->user = $user;
    }

    public function registerUser()
    {
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
}
