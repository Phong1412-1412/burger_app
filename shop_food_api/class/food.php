<?php 
	class Foods{
    private $conn;
    public $db_table="foods";
    //model
    public $Food_ID;
    public $Food_Name;
    public $Food_Img;
    public $Food_Price;
    public $Food_Category;
    public $Food_Detail;

    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery="SELECT * FROM foods";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }

    

    public function get()
    {
    	if(isset($_GET['Food_ID'])){
    		$item = $_GET['Food_ID'];
    		$sqlQuery="SELECT * FROM foods WHERE Food_ID = '$item'";
       		$result = $this->conn->query($sqlQuery);
       		$itemCount = $result->num_rows;
       		if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->Food_ID = $row["Food_ID"];
       			$this->Food_Name = $row["Food_Name"];
                $this->Food_Img = $row["Food_Img"];
                $this->Food_Price = $row["Food_Price"];
                $this->Food_Category = $row["Food_Categori"];
                $this->Food_Detail = $row["food_deatail"];
                }
       	    }
    	}
    	else
    	{
    		echo "Không tìm thấy bản ghi";
    	}
        
    }

    public function getAll_foodHealthy()
    {
        $sqlQuery="SELECT * FROM foods where Food_Categori = 1";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }

    public function getAll_foodDrink()
    {
        $sqlQuery="SELECT * FROM foods where Food_Categori = 5";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }
}
?>