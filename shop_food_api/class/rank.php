<?php
class Rank{
    private $conn;
    private $db_table="hang_nguoidung";
    //model
    public $Hang_ID;
    public $Hang_Name;
    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery="SELECT Hang_ID,Ten_Hang from hang_nguoidung";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }

    public function get()
    {
    	$item = $_GET['Hang_ID'];
        $sqlQuery="SELECT Hang_ID,Ten_Hang from hang_nguoidung WHERE Hang_ID = ". $item;
       	$result = $this->conn->query($sqlQuery);
       	$itemCount = $result->num_rows;
       	if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->Hang_ID = $row["Hang_ID"];
       			$this->Hang_Name = $row["Ten_Hang"];
       		}
       	}

       
    }
}
?>