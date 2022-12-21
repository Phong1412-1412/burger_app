<?php 
	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
	require_once ('../../config/database.php');
	require_once ('../../class/category_food.php');

	$database = new Database();
	$db = $database->getConnection();
	$items = new Category($db);
	if(isset($_GET['Category_ID'])) 
	{
		$item = new Category($db);
		$item->Category_ID = $_GET['Category_ID'];
		$item->get();
		if(isset($item->Category_ID))
		{
			$rank_arr = array(
				"Category_ID" =>(int)$item->Category_ID,
				"Category_Name"=>$item->Category_Name,
				"Category_Icon"=>$item->Category_Icon,
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
			$category_arr = array();
			while ($row = $result->fetch_assoc())
            {
                extract($row);
                $e = array(
                	"Category_ID" =>(int)$row['Category_ID'],
					"Category_Name"=>$row['Category_Name'],
					"Category_Icon"=>$row['category_icons'],
                );
                array_push($category_arr,$e );
            }
            echo json_encode($category_arr);
            

        }
        else
        {
            http_response_code(404);
            echo json_encode(array("message"=>"Không tìm thấy bản ghi"));
        }
    }
		
?>