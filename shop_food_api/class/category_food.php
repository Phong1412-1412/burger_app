<?php 
	class Category{
    private $conn;
    public $db_table="category_foods";
    //model
    public $Category_ID;
    public $Category_Name;

    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery="SELECT * FROM category_foods";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }

    public function get()
    {
    	if(isset($_GET['Category_ID'])){
    		$item = $_GET['Category_ID'];
    		$sqlQuery="SELECT * FROM '$db2_table' WHERE Category_ID = '$item'";
       		$result = $this->conn->query($sqlQuery);
       		$itemCount = $result->num_rows;
       		if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->Category_ID = $row["Category_ID"];
       			$this->Category_Name = $row["Category_Name"];
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