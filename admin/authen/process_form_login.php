<?php
$fullname = $email = $msg = ''; // Biến lưu trữ thông tin và lỗi

if (!empty($_POST)) {
    $email = getPost('email');
    $pwd = getPost('password');
    $pwd = getSecurityMD5($pwd); // Mã hóa mật khẩu

    // Truy vấn kiểm tra email và mật khẩu từ cơ sở dữ liệu
    $sql = "SELECT * FROM User WHERE email = '$email' AND password = '$pwd'";
    $userExist = executeResult($sql, true);

    if ($userExist == null) {
        $msg = 'Sai email hoặc mật khẩu';
    } else {
        // Đăng nhập thành công
        $token = getSecurityMD5($userExist['email'] . time()); // Tạo token duy nhất
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/'); // Lưu token vào cookie

        $created_at = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại

        // Lưu thông tin vào session
        $_SESSION['user'] = $userExist;

        // Lưu token vào bảng Tokens
        $userId = $userExist['id'];
        $sql = "INSERT INTO Tokens (user_id, token, created_at) VALUES ('$userId', '$token', '$created_at')";
        execute($sql);

        // Kiểm tra role_id để chuyển hướng
        if ($userExist['role_id'] == 1) {
            // Nếu là admin, chuyển hướng tới trang admin
            header('Location: ../../../../../webbanhang1/admin');
        } elseif ($userExist['role_id'] == 2) {
            // Nếu là người dùng thông thường, chuyển hướng tới trang index
            header('Location: ../../../../../webbanhang1/index.php');
        } else {
            // Trường hợp role không xác định
            header('Location: ../unknown_role.php');
        }
        die();
    }
}
?>
