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
                        <input name="fullname" type="text" id="usr" placeholder="Nhập đầy đủ họ và tên"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" value="<?=$fullname?>">
                        <p id="nameError" class="text-red-500 text-xs mt-1 hidden">*Họ tên không được để trống</p>
                    </div>
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input name="email" type="email" id="email" placeholder="Nhập email của bạn"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" value="<?=$email?>">
                        <p id="emailError" class="text-red-500 text-xs mt-1 hidden">*Email không được để trống</p>
                    </div>
                    <!-- Password Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mật khẩu</label>
                        <input name="password" type="password" id="pwd" placeholder="Nhập mật khẩu"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                        <p id="passwordError" class="text-red-500 text-xs mt-1 hidden">*Mật khẩu không được để trống và ít nhất 6 ký tự</p>
                    </div>
                    <!-- Confirm Password Field -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Xác nhận mật khẩu</label>
                        <input type="password" id="confirmation_pwd" placeholder="Nhập lại mật khẩu"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                        <p id="confirmPasswordError" class="text-red-500 text-xs mt-1 hidden">*Bạn phải xác nhận mật khẩu và khớp với mật khẩu đã nhập</p>
                    </div>
                    <!-- Terms and Conditions -->
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="terms" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">Tôi đồng ý với các <a href="rule.php"
                                    class="text-blue-500 hover:underline">điều khoản và điều kiện.</a>.</span>
                        </label>
                        <p id="termsError" class="text-red-500 text-xs mt-1 hidden">*Bạn cần đồng ý với điều khoản</p>
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
        // Hàm kiểm tra biểu mẫu khi nhấn nút submit
        function validateForm() {
            // Biến kiểm soát
            let isValid = true;

            // Kiểm tra họ tên
            const fullname = document.getElementById('usr').value;
            const nameError = document.getElementById('nameError');
            if (fullname === "") {
                nameError.classList.remove('hidden');
                isValid = false;
            } else {
                nameError.classList.add('hidden');
            }

            // Kiểm tra email
            const email = document.getElementById('email').value;
            const emailError = document.getElementById('emailError');
            if (email === "") {
                emailError.classList.remove('hidden');
                isValid = false;
            } else {
                emailError.classList.add('hidden');
            }

            // Kiểm tra mật khẩu
            const password = document.getElementById('pwd').value;
            const passwordError = document.getElementById('passwordError');
            if (password.length < 6) {
                passwordError.classList.remove('hidden');
                isValid = false;
            } else {
                passwordError.classList.add('hidden');
            }

            // Kiểm tra xác nhận mật khẩu
            const confirmPassword = document.getElementById('confirmation_pwd').value;
            const confirmPasswordError = document.getElementById('confirmPasswordError');
            if (password !== confirmPassword) {
                confirmPasswordError.classList.remove('hidden');
                isValid = false;
            } else {
                confirmPasswordError.classList.add('hidden');
            }

            // Kiểm tra checkbox điều khoản
            const terms = document.getElementById('terms').checked;
            const termsError = document.getElementById('termsError');
            if (!terms) {
                termsError.classList.remove('hidden');
                isValid = false;
            } else {
                termsError.classList.add('hidden');
            }

            return isValid; // Chỉ gửi biểu mẫu nếu tất cả các điều kiện hợp lệ
        }
    </script>
</body>

</html>
