<?php
class NguoiDung{
    private $conn;
    private $db_table="nguoidung";
    //model
    public $NguoiDung_ID;
    public $NguoiDung_Name;
    public $NguoiDung_PassWord;
    public $NguoiDung_Email;
    public $NguoiDung_Point;
    public $NguoiDung_Rank;
    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery="SELECT NguoiDung_ID, NguoiDung_Name, NguoiDung_PassWord, NguoiDung_Email, NguoiDung_Point, hang_nguoidung.Ten_Hang  from nguoidung, hang_nguoidung WHERE nguoidung.NguoiDung_Rank = hang_nguoidung.Hang_ID";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }

    public function get()
    {
    	if(isset($_GET['NguoiDung_ID'])){
    		$item = $_GET['NguoiDung_ID'];
    		$sqlQuery="SELECT NguoiDung_ID, NguoiDung_Name, NguoiDung_PassWord, NguoiDung_Email, NguoiDung_Point, hang_nguoidung.Ten_Hang  from nguoidung, hang_nguoidung WHERE NguoiDung_ID =  ".$item ." AND nguoidung.NguoiDung_Rank = hang_nguoidung.Hang_ID";
       		$result = $this->conn->query($sqlQuery);
       		$itemCount = $result->num_rows;
       		if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->NguoiDung_ID = $row["NguoiDung_ID"];
       			$this->NguoiDung_Name = $row["NguoiDung_Name"];
       			$this->NguoiDung_PassWord = $row["NguoiDung_PassWord"];
       			$this->NguoiDung_Email = $row["NguoiDung_Email"];
       			$this->NguoiDung_Point = $row["NguoiDung_Point"];
       			$this->NguoiDung_Rank = $row["Ten_Hang"];
       		}
       	}
    	}
    	else
    	{
    		echo "Không tìm thấy bản ghi";
    	}
        
    }
}
?>