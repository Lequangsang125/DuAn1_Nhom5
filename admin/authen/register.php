<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
require_once('process_form_register.php');
$user = getUserToken();
if($user!= null){
    header('Location:../');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://cdn-icons-png.freepik.com/512/8488/8488204.png">
</head>

<body class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
            <div class="w-full p-8">
                <h2 class="text-2xl font-bold text-center text-gray-800">Đăng ký tài khoản</h2>
                <h4 style="color: red; text-align: center;"><?=$msg?></h4>

                <form method="post" onsubmit="return validateForm()">
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="usr">Họ tên</label>
                        <input required name="fullname" type="text" id="usr" placeholder="Nhập đầy đủ họ và tên"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" value="<?=$fullname?>">
                    </div>
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input required name="email" type="email" id="email" placeholder="Nhập email của bạn"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" value="<?=$email?>">
                    </div>
                    <!-- Password Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mật khẩu</label>
                        <input minlength="6" required name="password" type="password" id="pwd" placeholder="Nhập mật khẩu"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <!-- Confirm Password Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Xác nhận mật khẩu</label>
                        <input required type="password" id="confirmation_pwd" placeholder="Nhập lại mật khẩu"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <!-- Terms and Conditions -->
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input required type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" >
                            <span class="ml-2 text-gray-700">Tôi đồng ý với các <a href="rule.php"
                                    class="text-blue-500 hover:underline">điều khoản và điều kiện.</a>.</span>
                        </label>
                    </div>
                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                            Đăng ký
                        </button>
                    </div>
                </form>
                <p class="text-center text-gray-500">Bạn đã có tài khoản? <a href="login.php"
                        class="text-blue-500 hover:underline">Đăng nhập</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Hàm kiểm tra mật khẩu
        function validateForm() {
            // Lấy giá trị từ ô nhập mật khẩu
            var pwd = document.getElementById('pwd').value; 
            // Lấy giá trị từ ô nhập xác nhận mật khẩu (thêm # để lấy ID)
            var confirmPwd = document.getElementById('confirmation_pwd').value; 
            // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp không
            if (pwd !== confirmPwd) {
                alert("Mật khẩu không khớp, vui lòng nhập lại");
                return false; // Ngăn không cho form gửi đi
            }
            return true; // Cho phép form gửi đi nếu mật khẩu khớp
        }
    </script>
</body>

</html>
