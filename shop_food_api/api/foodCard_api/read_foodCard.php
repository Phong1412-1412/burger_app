<?php 
	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
	require_once ('../../config/database.php');
	require_once ('../../class/card.php');
	$database = new Database();
	$db = $database->getConnection();
	$items = new Card($db);
		$result = $items->getAll();
		$itemCount = $result->num_rows;
		if($itemCount > 0) {
			$card_arr = array();
			while ($row = $result->fetch_assoc())
            {
                extract($row);
                $e = array(
					"Card_ID" =>(int)$row['card_id'],
					"Food_Name" =>$row['Food_Name'],
					"Food_Img" =>$row['Food_Img'],
					"Food_Price" =>(int)$row['Food_Price'],
                );
                array_push($card_arr,$e );
            }
            echo json_encode($card_arr);
    	}	
?>