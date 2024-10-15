<?php
$title = 'Quản Lý Danh Mục Sản Phẩm';
$baseUrl = '../';
require_once('../layouts/header.php');

require_once('form_save.php');
$id = $name = '';
if (isset($_GET['id'])) {
    $id = getGet('id');
    $sql = "SELECT * FROM Category WHERE id = $id";
    $data = executeResult($sql, true);

    if ($data != null) {
        $name = $data['name'];
    }
}

$sql = "SELECT * FROM Category";
$data = executeResult($sql);
?>

<div class="">
    <h3 class="text-center mb-4">Quản Lý Danh Mục Sản Phẩm</h3>

    <div class="row mb-4">
        <div class="col-md-12">
            <form method="post" action="index.php" onsubmit="return validateForm();">
                <div class="form-group">
                    <label for="usr" style="font-weight: bold;">Tên Danh Mục:</label>
                    <input required type="text" class="form-control" id="usr" name="name" value="<?=$name?>">
                    <input type="hidden" name="id" value="<?=$id?>">
                </div>
                <button class="btn btn-success">Lưu</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    <th style="width: 50px"></th>
                    <th style="width: 50px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
$index = 0;
foreach ($data as $item) {
    echo '<tr>
                <th>' . (++$index) . '</th>
                <td>' . $item['name'] . '</td>
                <td style="width: 50px">
                    <a href="?id=' . $item['id'] . '"><button class="btn btn-warning">Sửa</button></a>
                </td>
                <td style="width: 50px">
                    <button onclick="deleteCategory(' . $item['id'] . ')" class="btn btn-danger">Xoá</button>
                </td>
            </tr>';
}
?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
function deleteCategory(id) {
    const option = confirm('Bạn có chắc chắn muốn xoá danh mục sản phẩm này không?');
    if (!option) return;

    $.post('form_api.php', {
        'id': id,
        'action': 'delete'
    }, function(data) {
        if (data != null && data != '') {
            alert(data);
            return;
        }
        location.reload();
    });
}
</script>

<?php
require_once('../layouts/footer.php');
?>