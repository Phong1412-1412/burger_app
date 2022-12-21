<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
	include_once '../config/database.php';
	include_once '../class/rank.php';
	$database = new Database();
	$db = $database->getConnection();
	$items = new Rank($db);
	if(isset($_GET['Hang_ID'])) 
	{
		$item = new Rank($db);
		$item->Hang_ID = $_GET['Hang_ID'];
		$item->get();
		if(isset($item->Hang_Name))
		{
			$rank_arr = array(
				"Rank_ID" =>(int)$item->Hang_ID,
				"Rank_Name"=>$item->Hang_Name
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
			$rankArr = array();
			while ($row = $result->fetch_assoc())
            {
                extract($row);
                $e = array(
                 	"Rank_ID"  => (int)$row["Hang_ID"],
					"Rank_Name" => $row["Ten_Hang"]
                );
                array_push($rankArr,$e );
            }
            echo json_encode($rankArr);
            

        }
        else
        {
            http_response_code(404);
            echo json_encode(array("message"=>"Không tìm thấy bản ghi"));
        }
		
	}
?>