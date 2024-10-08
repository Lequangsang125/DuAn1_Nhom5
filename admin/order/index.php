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
$index = 0;
foreach ($data as $item) {
    echo '<tr>
        <th>' . (++$index) . '</th>
        <td><a href="detail.php?id=' . $item['id'] . '">' . $item['fullname'] . '</a></td>
        <td><a href="detail.php?id=' . $item['id'] . '">' . $item['phone_number'] . '</a></td>
        <td><a href="detail.php?id=' . $item['id'] . '">' . $item['email'] . '</a></td>
        <td>' . $item['address'] . '</td>
        <td>' . $item['note'] . '</td>
        <td>' . $item['total_money'] . '</td>
        <td>' . $item['order_date'] . '</td>
        <td style="width: 150px">';

    // Dropdown menu thay đổi trạng thái
    echo '<select onchange="changeStatus(' . $item['id'] . ', this.value)" class="form-select">
            <option value="1" ' . ($item['status'] == 1 ? 'selected' : '') . '>Chờ lấy hàng</option>
            <option value="2" ' . ($item['status'] == 2 ? 'selected' : '') . '>Chờ giao hàng</option>
            <option value="3" ' . ($item['status'] == 3 ? 'selected' : '') . '>Đã giao hàng</option>
            <option value="4" ' . ($item['status'] == 4 ? 'selected' : '') . '>Hủy</option>
          </select>';

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