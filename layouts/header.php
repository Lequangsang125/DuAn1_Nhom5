<?php
	session_start();
	require_once('utils/utility.php');
	require_once('database/dbhelper.php');

	$sql = "select * from Category";
	$menuItems = executeResult($sql);
	$user = getUserToken();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ - Shop Thời Trang</title>
	<link rel="shortcut icon" href="https://img.freepik.com/premium-vector/fashion-logo-template-design_278222-5475.jpg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<style type="text/css">
		.nav li {
			text-transform: uppercase;
			color: #28a745;
			margin-top: 20px;
		}
		.nav li a {
			color: #28a745;
			font-weight: bold;
		}

		.carousel-inner img {
			height: 420px;
			width: 100%;
		}

		.product-item:hover {
			background-color: #f5f6f7;
			cursor: pointer;
			margin-bottom: 10px;
		}

		footer {
			padding-top: 20px;
		}

		footer ul {
			list-style-type: none;
			padding: 0px;
			margin: 0px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.cart_icon {
			position: fixed;
			z-index: 999999;
			right: 0px;
			top: 45%;
		}

		.cart_icon img {
			width: 45px;
		}

		.cart_icon .cart_count {
			background-color: red;
			color: white;
			font-size: 16px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 10px;
			padding-right: 10px;
			font-weight: bold;
			border-radius: 12px;
			position: fixed;
			right: 40px;
		}
	</style>
</head>
<body>

<!-- Menu START -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="index.php">
      <img src="https://img.freepik.com/premium-vector/fashion-logo-template-design_278222-5475.jpg" style="height: 80px;">
    </a>

    <!-- Toggle button for mobile view -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <!-- Categories from Database -->
        <?php foreach($menuItems as $item): ?>
          <li class="nav-item">
            <a class="nav-link" href="category.php?id=<?= $item['id']; ?>"><?= $item['name']; ?></a>
          </li>
        <?php endforeach; ?>

        <li class="nav-item">
          <a class="nav-link" href="contact.php">Liên Hệ</a>
        </li>

        <!-- User-specific Links -->
        <?php if ($user != null): ?>
          <!-- Hiển thị trạng thái đơn hàng nếu đã đăng nhập -->
          <li class="nav-item">
            <a class="nav-link" href="../../webbanhang1/status.php">Trạng thái đơn hàng</a>
          </li>
          <!-- Hiển thị nút Đăng xuất -->
          <li class="nav-item">
            <a class="nav-link" href="../../webbanhang1/admin/authen/logout.php">Đăng xuất</a>
          </li>
        <?php else: ?>
          <!-- Hiển thị nút Đăng nhập nếu chưa đăng nhập -->
          <li class="nav-item">
            <a class="nav-link" href="../../webbanhang1/admin/authen/login.php">Đăng nhập</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Menu Stop -->
