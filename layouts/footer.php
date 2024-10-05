<footer style="background-color: #81d742 !important;">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h4>GIỚI THIỆU</h4>
				<ul>
					<li>LIÊN HỆ CÔNG TY CỔ PHẦN ZICZAC GROUP</li>
					<li><i class="bi bi-mailbox2"></i> fpt.com@gmail.com</li>
					<li><i class="bi bi-telephone-fill"></i> 123456789</li>
					<li><i class="bi bi-map-fill"></i> Ha Noi, Viet Nam</li>
					<li>Chúng tôi luôn tiên phong trong lĩnh vực xậy dựng website cho các doanh nghiệp và của hàng. Chúng tôi luôn nỗ lực để tạo ra sản phẩm có chất lượng tốt nhất cho khách hàng.</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>SẢN PHẨM MỚI NHẤT</h4>
				<ul>
					<li>LIÊN HỆ CÔNG TY CỔ PHẦN THỜI TRANG TRẺ GROUP</li>
					<li>Email: fpt@gmail.com</li>
					<li>Phone: 123456789</li>
					<li>Chúng tôi luôn tiên phong trong lĩnh vực thời trang cho các doanh nghiệp và của hàng. Chúng tôi luôn nỗ lực để tạo ra sản phẩm có chất lượng tốt nhất cho khách hàng.</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>TIN TỨC MỚI NHẤT</h4>
				<ul>
				<li>LIÊN HỆ CÔNG TY CỔ PHẦN THỜI TRANG TRẺ GROUP</li>
					<li>Email: fpt@gmail.com</li>
					<li>Phone: 123456789</li>
					<li>Chúng tôi luôn tiên phong trong lĩnh vực thời trang cho các doanh nghiệp và của hàng. Chúng tôi luôn nỗ lực để tạo ra sản phẩm có chất lượng tốt nhất cho khách hàng.</li>
				</ul>
			</div>
		</div>
	</div>
	<div style="background-color: #3f9609; width: 100%; text-align: center; padding: 20px;">
		© 2018 Thời trang trẻ Group NHÓM 5
	</div>
</footer>
<?php


// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Thêm sản phẩm vào giỏ hàng khi có request
if (isset($_POST['action']) && $_POST['action'] == 'cart') {
    $productId = $_POST['id'];
    $num = $_POST['num'];
    
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId) {
            $item['num'] += $num; // Cộng thêm số lượng nếu đã tồn tại
            $exists = true;
            break;
        }
    }
    
    // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
    if (!$exists) {
        $_SESSION['cart'][] = [
            'id' => $productId,
            'num' => $num
        ];
    }

    // Hiển thị giỏ hàng sau khi thêm sản phẩm để kiểm tra
    var_dump($_SESSION['cart']);
    exit;
}

// Tính tổng số lượng sản phẩm trong giỏ hàng
$count = 0;
foreach ($_SESSION['cart'] as $item) {
    $count += $item['num'];
}
?>

<script type="text/javascript">
	function addCart(productId, num) {
    $.post('api/ajax_request.php', {
        'action': 'cart',
        'id': productId,
        'num': num
    }, function(data) {
        // Cập nhật số lượng giỏ hàng mà không cần reload trang
        var newCount = parseInt($('.cart_count').text()) + parseInt(num);
        $('.cart_count').text(newCount);

        console.log(data); // Kiểm tra dữ liệu trả về từ server
    });
}

</script>

<!-- Cart start -->
<span class="cart_icon">
	<span class="cart_count"><?=$count?></span>
	<a href="cart.php"><img src="https://gokisoft.com/img/cart.png"></a>
</span>
<!-- Cart stop -->
</body>
</html>