<?php 
//echo 'connection privada<br>';
class ConnectionDB{
    private $db_name = 'db_users';
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';

    public function connectDb(){

        try{

            $connectionDb = new PDO(
                "mysql:host=$this->db_host;dbname=$this->db_name",
                "$this->db_user",
                "$this->db_pass"
            );
            return $connectionDb;

        } catch(PDOException $e){
            
            //echo '<p>'.$e->getMessege().'</p>';
        }
    }
}
?>