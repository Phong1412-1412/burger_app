<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
	require_once '../../config/database.php';
	include_once '../../class/nguoidung.php';
	$database = new Database();
	$db = $database->getConnection();
	$items = new NguoiDung($db);
	if(isset($_GET['NguoiDung_ID'])) 
	{
		$item = new NguoiDung($db);
		$item->NguoiDung_Email = $_GET['NguoiDung_ID'];
		$item->get();
		if(isset($item->NguoiDung_Name))
		{
			$rank_arr = array(
				"NguoiDung_ID" =>(int)$item->NguoiDung_ID,
				"NguoiDung_Name"=>$item->NguoiDung_Name,
				"NguoiDung_PassWord"=> (int)$item->NguoiDung_PassWord,
				"NguoiDung_Email"=>$item->NguoiDung_Email,
				"NguoiDung_Point"=>(int)$item->NguoiDung_Point,
				"NguoiDung_Rank"=>$item->NguoiDung_Rank
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
			$nguoidung_arr = array();
			while ($row = $result->fetch_assoc())
            {
                extract($row);
                $e = array(
                	"NguoiDung_ID" => (int)$row["NguoiDung_ID"],
       				"NguoiDung_Name" => $row["NguoiDung_Name"],
       				"NguoiDung_PassWord" => (int)$row["NguoiDung_PassWord"],
       			 	"NguoiDung_Email" => $row["NguoiDung_Email"],
       			 	"NguoiDung_Point"=> (int)$row["NguoiDung_Point"],
       				"NguoiDung_Rank" => $row["Ten_Hang"]
                );
                array_push($nguoidung_arr,$e );
            }
            echo json_encode($nguoidung_arr);
            

        }
        else
        {
            http_response_code(404);
            echo json_encode(array("message"=>"Không tìm thấy bản ghi"));
        }
		
	}
?>