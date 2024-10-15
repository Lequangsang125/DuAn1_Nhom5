<?php 
require_once('layouts/header.php');

$sql = "select * from Orders order by status asc, order_date desc";
$data = executeResult($sql);

?>

<?php if ($user != null): ?>
<div class="details container">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2 class="text-center">Đơn hàng gần đây</h2>
        </div>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Ngày Tạo</th>
                    <th scope="col">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $index = 0;
                foreach ($data as $item) {
                    echo '<tr>
                    <th scope="row">' . (++$index) . '</th>
                    <td><a href="detail1.php?id=' . $item['id'] . '">' . $item['fullname'] . '</a></td>
                    <td><a href="detail1.php?id=' . $item['id'] . '">' . $item['email'] . '</a></td>
                    <td><a href="detail1.php?id=' . $item['id'] . '">' . number_format($item['total_money']) . ' VNĐ</a></td>
                    <td><a href="detail1.php?id=' . $item['id'] . '">' . date("d-m-Y", strtotime($item['order_date'])) . '</a></td>
                    <td>';
                    
                    if ($item['status'] == 0) {
                        echo '<span class="badge badge-warning">Chờ xác nhận</span>';
                    } else if ($item['status'] == 1) {
                        echo '<span class="badge badge-success">Đang lấy hàng</span>';
                    } else if ($item['status'] == 2) {
                        echo '<span class="badge badge-success">Đang giao hàng</span>';
                    } else if ($item['status'] == 3) {
                        echo '<span class="badge badge-success">Giao thành công</span>';
                    } else if ($item['status'] == 5) {
                        echo '<span class="badge badge-success">Đã thanh toán</span>';
                    } else {
                        echo '<span class="badge badge-danger">Đơn bị hủy</span>';
                    }
                    echo '</td>
                    </tr>';
                }
                
            ?>     
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>

<?php
require_once('layouts/footer.php');
?>
