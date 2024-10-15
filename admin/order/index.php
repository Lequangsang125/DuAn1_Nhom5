<?php
$title = 'Quản Lý Đơn Hàng';
$baseUrl = '../';
require_once('../layouts/header.php');

//pending, approved, cancel
$sql = "select * from Orders order by status asc, order_date desc";
$data = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3 class="text-center mb-4">Quản Lý Đơn Hàng</h3>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ & Tên</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Địa Chỉ</th>
					<th>Nội Dung</th>
					<th>Tổng Tiền</th>
					<th>Ngày Tạo</th>
					<th style="width: 120px"></th>
				</tr>
			</thead>
			<tbody>
            <?php 

$index = 1; // Khởi tạo biến $index ngoài vòng lặp
foreach ($data as $item) {
    echo '<tr>
        <th>' . ($index++) . '</th> <!-- Tăng giá trị $index sau mỗi lần hiển thị -->
        <td><a href="detail.php?id=' . $item['id'] . '">' . $item['fullname'] . '</a></td>
        <td><a href="detail.php?id=' . $item['id'] . '">' . $item['phone_number'] . '</a></td>
        <td><a href="detail.php?id=' . $item['id'] . '">' . $item['email'] . '</a></td>
        <td>' . $item['address'] . '</td>
        <td>' . $item['note'] . '</td>
        <td>' . $item['total_money'] . '</td>
        <td>' . $item['order_date'] . '</td>
        <td style="width: 150px">';

    // Tùy chọn trạng thái dựa vào giá trị status hiện tại
    echo '<select onchange="changeStatus(' . $item['id'] . ', this.value)" class="form-select">';

    if ($item['status'] == 0) { // Trạng thái ban đầu: có thể chọn Đang lấy hàng hoặc Hủy
        echo '<option value="0" selected>Chọn trạng thái</option>
              <option value="1">Đang lấy hàng</option>
              <option value="4">Hủy</option>';
    } elseif ($item['status'] == 1) { // Đang lấy hàng
        echo '<option value="1" selected>Đang lấy hàng</option>
              <option value="2">Đang giao hàng</option>';
    } elseif ($item['status'] == 2) { // Đang giao hàng
        echo '<option value="2" selected>Đang giao hàng</option>
              <option value="3">Đã giao hàng</option>';
    } elseif ($item['status'] == 3) { // Đã giao hàng
        echo '<option value="3" selected>Đã giao hàng</option>
              <option value="5">Đã thanh toán</option>';
    } elseif ($item['status'] == 4) { // Hủy
        echo '<option value="4" selected>Hủy</option>';
    } elseif ($item['status'] == 5) { // Đã thanh toán
        echo '<option value="5" selected>Đã thanh toán</option>';
    }

    echo '</select>';

    echo '</td></tr>';
}

?>




			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
    function changeStatus(id, status) {
        $.post('form_api.php', {
            'id': id,
            'status': status,
            'action': 'update_status'
        }, function(data) {
            location.reload();
        });
    }
</script>



<?php
require_once('../layouts/footer.php');
?>