<?php
require_once('layouts/header.php');
$title = 'Thông Tin Chi Tiết Đơn Hàng';
$baseUrl = '../';
$orderId = getGet('id');
$sql = "select Order_Details.*, Product.title, Product.thumbnail from Order_Details left join Product on Product.id = Order_Details.product_id where Order_Details.order_id = $orderId";
$data = executeResult($sql);

$sql = "select * from Orders where id = $orderId";
$orderItem = executeResult($sql, true);
?>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Chi Tiết Đơn Hàng</h3>
        </div>
    </div>

	    <!-- Customer Information -->
		<div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover mt-3">
                <tr>
                    <th>Họ & Tên:</th>
                    <td><?=$orderItem['fullname']?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?=$orderItem['email']?></td>
                </tr>
                <tr>
                    <th>Địa Chỉ:</th>
                    <td><?=$orderItem['address']?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?=$orderItem['phone_number']?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

    <!-- Order Details Table -->
    <div class=" container">
        <div class="">
            <table class="table table-bordered table-hover mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Thumbnail</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 0;
                    foreach ($data as $item) {
                        echo '<tr>
                            <td>'.(++$index).'</td>
                            <td><img src="'.($item['thumbnail']).'" class="img-fluid" style="height: 80px;"/></td>
                            <td>'.$item['title'].'</td>
                            <td>'.$item['price'].'</td>
                            <td>'.$item['num'].'</td>
                            <td>'.$item['total_money'].'</td>
                        </tr>';
                        
                    }
                    ?>
                    <tr>
                        <td colspan="4"></td>
                        <th>Tổng Tiền</th>
                        <th><?=$orderItem['total_money']?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
require_once('layouts/footer.php');
?> 
