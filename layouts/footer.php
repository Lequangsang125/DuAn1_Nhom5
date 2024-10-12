<footer style="background-color: #333; color: #fff; padding: 60px 0;">
    <div class="container">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Về Chúng Tôi</h5>
                <p class="text-muted">Chúng tôi là thương hiệu thời trang mang đến những bộ sưu tập hợp xu hướng và chất lượng cao, giúp bạn tự tin tỏa sáng mỗi ngày.</p>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope"></i> Email: support@fashion.com</li>
                    <li><i class="bi bi-telephone-fill"></i> Điện thoại: +84 123 456 789</li>
                    <li><i class="bi bi-geo-alt-fill"></i> Địa chỉ: 123 Đường Thời Trang, Hà Nội</li>
                </ul>
            </div>

            <!-- New Products Section -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Sản Phẩm Mới</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted">BST Thu Đông 2024</a></li>
                    <li><a href="#" class="text-muted">Áo khoác dạ nữ</a></li>
                    <li><a href="#" class="text-muted">Giày da nam</a></li>
                    <li><a href="#" class="text-muted">Phụ kiện cao cấp</a></li>
                </ul>
            </div>

            <!-- Latest News Section -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Tin Tức Mới</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted">Khuyến mãi mùa đông</a></li>
                    <li><a href="#" class="text-muted">Xu hướng thời trang 2024</a></li>
                    <li><a href="#" class="text-muted">Sự kiện ra mắt BST mới</a></li>
                    <li><a href="#" class="text-muted">Cách phối đồ cho mùa thu</a></li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Theo Dõi Chúng Tôi</h5>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="text-light"><i class="bi bi-facebook" style="font-size: 24px;"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-light"><i class="bi bi-instagram" style="font-size: 24px;"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-light"><i class="bi bi-twitter" style="font-size: 24px;"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-light"><i class="bi bi-youtube" style="font-size: 24px;"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Bottom Section -->
    <div class="text-center py-3" style="background-color: #222;">
        <p class="mb-0">© 2024 Fashion Company. All rights reserved. Designed by Fashion Group.</p>
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