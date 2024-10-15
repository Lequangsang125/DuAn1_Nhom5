<?php 
$fullname = $email = $msg  =  ''; //msg message errors
if(!empty($_POST)){ //kiem tra xem co du lieu day len hay k
    $fullname = getPost('fullname');
    $email = getPost('email');
    $pwd = getPost('password');

    //validate
    if(empty($fullname)||empty($email) ||empty($pwd)||strlen($pwd)<6){
        $msg = 'Vui lòng điền đầy đủ thông tin và đảm bảo mật khẩu có ít nhất 6 ký tự';
    }else{
        //validate thanh cong
        $useExist = executeResult("select * from User where email = '$email'",true); // lay email tu db 
        // so sanh neu email khac rong
        if($useExist != null){
            $msg = 'Email đã tồn tại trên hệ thống';
        } else { // neu email chua ton tai thi chen vao db
            $created_at = $updated_at = date('Y-m-d H:i:s'); // nam thang ngay gio phut giay
            //ma hoa mat khau trong db cho no uy tin (su dung ma hoa md5 custom thêm trong file cònig)
            $pwd = getSecurityMD5($pwd);
            $sql = "insert into User (fullname,email,password,role_id,created_at,updated_at,deleted) values ('$fullname','$email','$pwd',2,'$created_at','$updated_at',0)";
            execute($sql); // chen du lieu vào trong hệ thống
            //chèn thành công cho nhảy sang login
            header('Location: login.php');
            //hệ thống dừng sử lý nhảy sang login
            die();
        }
    }
}