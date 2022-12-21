<?php 
	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
	require_once ('../../config/database.php');
	require_once ('../../class/food.php');

	$database = new Database();
	$db = $database->getConnection();
	$items = new Foods($db);
	if(isset($_GET['Food_ID'])) 
	{
		$item = new Foods($db);
		$item->Food_ID = $_GET['Food_ID'];
		$item->get();
		if(isset($item->Food_ID))
		{
			$rank_arr = array(
				"Food_ID" =>(int)$item->Food_ID,
				"Food_Name" =>$item->Food_Name,
				"Food_Img" =>$item->Food_Img,
				"Food_Price" =>(int)$item->Food_Price,
				"Food_Category" =>(int)$item->Food_Category,
				"Food_Detail" =>(int)$item->Food_Detail,
			);
			http_response_code(200);
			echo json_encode($rank_arr);
		}
		 else
        {
            http_response_code(404);
            echo json_encode(array("message"=>"Không tìm thấy bản ghi"));
        }

	}
	else
	{
		$result = $items->getAll();
		$itemCount = $result->num_rows;
		if($itemCount > 0) {
			$food_arr = array();
			while ($row = $result->fetch_assoc())
            {
                extract($row);
                $e = array(
					"Food_ID" =>(int)$row['Food_ID'],
					"Food_Name" =>$row['Food_Name'],
					"Food_Img" =>$row['Food_Img'],
					"Food_Price" =>(int)$row['Food_Price'],
					"Food_Category" =>(int)$row['Food_Categori'],
					"Food_Detail"=>$row['food_detail'],
                );
                array_push($food_arr,$e );
            }
            echo json_encode($food_arr);
            

        }
        else
        {
            http_response_code(404);
            echo json_encode(array("message"=>"Không tìm thấy bản ghi"));
        }
    }
		
?>