<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
require_once('process_form_login.php');
$user = getUserToken();
if($user!= null){
    header('Location: ../');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập </title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link  rel="icon" href="https://img.freepik.com/premium-vector/fashion-logo-template-design_278222-5475.jpg">
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
      <div class="w-full p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800">Đăng nhập tài khoản</h2> 
        <h4 style="color: red; text-align: center;"><?=$msg?></h4>       
       <form method="post" onsubmit="return validateLoginForm()">
         <!-- Email Field -->
         <div class="mb-4">
           <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
           <input name="email" type="email" id="email" placeholder="Nhập email của bạn"
             class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500" value="<?=$email?>">
           <p id="emailError" class="text-red-500 text-xs mt-1 hidden">* Email không được để trống</p>
           <p id="emailFormatError" class="text-red-500 text-xs mt-1 hidden">* Định dạng email không đúng</p>
         </div>
         <!-- Password Field -->
         <div class="mb-4">
           <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mật khẩu</label>
           <input name="password" type="password" id="pwd" placeholder="Nhập mật khẩu"
             class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
           <p id="passwordError" class="text-red-500 text-xs mt-1 hidden">* Mật khẩu phải có ít nhất 6 ký tự</p>
         </div>
         
         <!-- Terms and Conditions -->
         <div class="mb-4">
           <label class="inline-flex items-center">
             <input type="checkbox" id="terms" class="form-checkbox h-5 w-5 text-blue-600">
             <span class="ml-2 text-gray-700">Tôi đồng ý với các <a href="rule.php" class="text-blue-500 hover:underline">điều khoản và điều kiện</a>.</span>
           </label>
           <p id="termsError" class="text-red-500 text-xs mt-1 hidden">* Bạn cần đồng ý với điều khoản</p>
         </div>
         
         <!-- Submit Button -->
         <div class="mb-4">
           <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
             Đăng nhập
           </button>
         </div>
       </form>
       <p class="text-center text-gray-500">Bạn chưa có tài khoản? <a href="register.php" class="text-blue-500 hover:underline">Đăng ký</a></p>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    // Hàm kiểm tra biểu mẫu
    function validateLoginForm() {
        let isValid = true;

        // Kiểm tra email
        const email = document.getElementById('email').value;
        const emailError = document.getElementById('emailError');
        const emailFormatError = document.getElementById('emailFormatError');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Kiểm tra định dạng email

        if (email === "") {
            emailError.classList.remove('hidden');
            emailFormatError.classList.add('hidden');
            isValid = false;
        } else if (!emailRegex.test(email)) {
            emailFormatError.classList.remove('hidden');
            emailError.classList.add('hidden');
            isValid = false;
        } else {
            emailError.classList.add('hidden');
            emailFormatError.classList.add('hidden');
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

        // Kiểm tra checkbox điều khoản
        const terms = document.getElementById('terms').checked;
        const termsError = document.getElementById('termsError');
        if (!terms) {
            termsError.classList.remove('hidden');
            isValid = false;
        } else {
            termsError.classList.add('hidden');
        }

        return isValid; // Chỉ gửi biểu mẫu nếu tất cả các điều kiện đều hợp lệ
    }
  </script>
</body>
</html>
