<?php 
	require_once("../../config/database.php");
	$database = new Database();
	$db = $database->getConnection();
	if(isset($_POST['email'])&&isset($_POST['pass']))
	{
		$email = $_POST['email'];
    	$pass = $_POST['pass'];

   		$sqlQuery = "SELECT * FROM nguoidung WHERE NguoiDung_Email = '".$email."' AND NguoiDung_PassWord='".$pass."'";
    	$res = mysqli_query($db,$sqlQuery);
    	$count =mysqli_num_rows($res);
    	if($count >= 1){
    		while($row = mysqli_fetch_assoc($res)) {
    			echo json_encode($row['NguoiDung_ID']);
    		}
    	}
    	else
    	{
    		echo json_encode("error");
    	}
    }
?>