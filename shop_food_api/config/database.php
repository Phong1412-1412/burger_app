<?php
class Database{
    private $host="localhost";
    private $database_name="foods_shop";
    private $username="root";
    private $password="";
    public $conn;
    public function getConnection()
    {
       $conn = new mysqli($this->host, $this->username, $this->password, $this->database_name);
       if($conn->connect_error)
       {
       		die("Connection failed: " . $conn->connect_error);
       }
      
       return $conn;
    }
}
   
?>