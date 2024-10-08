<?php
	$title = 'Quản Lý Phản Hồi';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	$sql = "select * from Feedback order by status asc, updated_at desc";
	$data = executeResult($sql);
?>

<div class="">
    <h3 class="text-center mb-4">Quản Lý Phản Hồi</h3>

    <table class="table table-bordered table-hover" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Họ</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Chủ Đề</th>
                <th>Nội Dung</th>
                <th>Ngày Tạo</th>
                <th style="width: 120px"></th>
            </tr>
        </thead>
        <tbody>
            <?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td>'.$item['firstname'].'</td>
					<td>'.$item['lastname'].'</td>
					<td>'.$item['phone_number'].'</td>
					<td>'.$item['email'].'</td>
					<td>'.$item['subject_name'].'</td>
					<td>'.$item['note'].'</td>
					<td>'.$item['updated_at'].'</td>
					<td style="width: 50px">';
		if($item['status'] == 0) {
			echo '<button onclick="markRead('.$item['id'].')" class="btn btn-success">Đã Đọc</button>';
		}	
		echo '</td>
        					<td style="width: 50px">
						<button onclick="deleteFeedback('.$item['id'].')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
	}
    
?>
        </tbody>
    </table>
</div>
</div>

<script type="text/javascript">
function markRead(id) {
    $.post('form_api.php', {
        'id': id,
        'action': 'mark'
    }, function(data) {
        location.reload()
    })
}
function deleteFeedback(id) {
		option = confirm('Bạn có chắc chắn muốn xoá phản hồi này không?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
	require_once('../layouts/footer.php');
?>