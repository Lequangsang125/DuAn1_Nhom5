<?php
$fullname = $email = $msg  =  ''; //msg message errors

if(!empty($_POST)){
    $email = getPost('email');
    $pwd = getPost('password');
    $pwd = getSecurityMD5($pwd);

    $sql = ("select * from User where email = '$email' and password = '$pwd' "); // truy van email va mat khau tu db 
    $userExist = executeResult($sql,true);

    if($userExist ==null ){
        $msg = 'Sai email hoặc mật khẩu';
    }else{
        //login thanh cong
        $token = getSecurityMD5($userExist['email'].time()); //- generate token (duy nhất: cho tài khoản + tài thời điểm login)
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/'); 

        $created_at = date('Y-m-d H:i:s'); // nam thang ngay gio phut giay

        // luu thong tin vao session
        $_SESSION['user'] = $userExist;

        $userId = $userExist['id'];
        $sql = "insert into Tokens (user_id, token , created_at) values ('$userId', '$token ', '$created_at')";
        execute($sql); // chen du lieu vào trong hệ thống
        header('Location:../');
        die();
    }
}