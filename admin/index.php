<?php

$title = 'Dashboard Page';
$baseUrl='';
require_once('layouts/header.php');

// Kết nối cơ sở dữ liệu và định nghĩa hàm executeResult
require_once('../database/dbhelper.php');

// Truy vấn để đếm số lượng feedback
$sql = "SELECT COUNT(*) as total FROM Feedback"; 
$result = executeResult($sql, true); // Thực hiện truy vấn
$totalFeedback = $result['total']; // Lấy số lượng feedback


$sql = "SELECT COUNT(*) as total FROM Orders"; 
$result = executeResult($sql, true); // Thực hiện truy vấn
$totalOrders = $result['total']; // Lấy số lượng feedback

$sql = "SELECT COUNT(*) as total FROM User"; 
$result = executeResult($sql, true); // Thực hiện truy vấn
$totalUser = $result['total']; // Lấy số lượng feedback

$sql = "SELECT SUM(total_money) AS totalRevenue FROM Orders";
$result = executeResult($sql,true);
$totalMoney = $result['totalRevenue'];

$sql = "select * from Orders order by status asc, order_date desc";
$data = executeResult($sql);



?>
	<div class="col-md-12">
<!-- ======================= Cards ================== -->
<div class="cardBox">

<a href="../admin/user/index.php">
    <div class="card">
        <div>
            <div class="numbers"><?=$totalUser?></div>
            <div class="cardName">Người dùng</div>
        </div>

        <div class="iconBx">
            <ion-icon name="person-outline"></ion-icon>
        </div>
    </div>
    </a>

    <a href="../admin/order/index.php">
    <div class="card">
        <div>
        <div class="numbers"><?= $totalOrders ?></div>
            <div class="cardName">Đơn hàng</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
    </div>
    </a>

    <a href="../admin/feedback/index.php">
    <div class="card">
        <div>
            <div class="numbers"><?= $totalFeedback ?></div>
                <!-- Đường dẫn đến trang danh sách feedback -->
                <div class="cardName">Phản hồi</div>
        </div>
        <div class="iconBx">
            <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
    </div>
    </a>

    <div class="card">
        <div>
            <div class="numbers"><?=$totalMoney?>đ</div>
            <div class="cardName">Tổng tiền</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
        </div>
    </div>
</div>

<!-- ================ Order Details List ================= -->

    <script type="text/javascript">
	function changeStatus(id, status) {
		$.post('form_api.php', {
			'id': id,
			'status': status,
			'action': 'update_status'
		}, function(data) {
			location.reload()
		})
	}
</script>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>

<?php
require_once('layouts/footer.php')
?>