<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Content-Type: text/json; charset=UTF-8");
    header('Content-Type: text/html; charset=UTF-8');
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../../config/database.php';
    include_once '../../class/nguoidung.php';
    $database = new Database();
    $db = $database->getConnection();
    
    if(isset($_POST['name'])) {
         //Lấy dữ liệu từ file signup_user.dart
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $point = $_POST['point'];
        $rank = $_POST['rank'];


         //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if ($username == "" || $password == "" || $email == "" || $rank == "" || $point == "")
        {
            echo json_encode("Vui lòng nhập đầy đủ thông tin: '$username': '$email': '$password': '$point' : '$rank'");
            exit;
        }
        // Mã khóa mật khẩu
        // $password = md5($password);
        //Kiểm tra tên đăng nhập này đã có người dùng chưa
        $sqlQuery = "SELECT * FROM nguoidung WHERE NguoiDung_Email = '$email'";
        $res = mysqli_query($db,$sqlQuery);
        $count =mysqli_num_rows($res);
        if($count >= 1){
            echo json_encode("account already exists");
            exit;
        }

        //Lưu thông tin thành viên vào bảng
        //INSERT INTO nguoidung VALUES(null,"test",1,"test",0,1)
        $sqlQuery = ("
            INSERT INTO nguoidung 
            VALUES (
                null,
                '$username',
                '$password',
                '$email',
                '$point',
                '$rank'
            )
        ");

        $addmemberSuccess = mysqli_query($db,$sqlQuery);

        //Thông báo quá trình lưu
        if($addmemberSuccess)
        {
             echo json_encode("success");
        }
        else
        {
            echo json_encode("error");
        }

    }
    else
    {
        echo json_encode("chua nhan post");
    }
   
?>