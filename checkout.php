<?php 
require_once('layouts/header.php');
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <form method="post" onsubmit="return completeCheckout();">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="usr" name="fullname" placeholder="Nhập họ * tên">
                    <span id="fullnameError" style="color: red; display: none;">Vui lòng nhập họ tên.</span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                    <span id="emailError" style="color: red; display: none;">Vui lòng nhập email.</span>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập sđt">
                    <span id="phoneError" style="color: red; display: none;">Vui lòng nhập số điện thoại.</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                    <span id="addressError" style="color: red; display: none;">Vui lòng nhập địa chỉ.</span>
                </div>
                <div class="form-group">
                    <label for="pwd">Nội dung:</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Tiêu Đề</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá</th>
                    </tr>
                    <?php
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $index = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        if (!isset($item['title']) || !isset($item['discount']) || !isset($item['num']) || !isset($item['id'])) {
                            continue; // Bỏ qua sản phẩm nếu thiếu dữ liệu
                        }
                        echo '<tr>
                                <td>' . (++$index) . '</td>
                                <td>' . $item['title'] . '</td>
                                <td>' . number_format($item['discount']) . ' VND</td>
                                <td>' . $item['num'] . '</td>
                                <td>' . number_format($item['discount'] * $item['num']) . ' VND</td>
                            </tr>';
                    }
                    ?>
                </table>
                <div class="checkout-container">
                    <?php if ($user != null) { ?>
                        <a href="checkout.php">
                            <button class="btn btn-success" style="border-radius: 0px; font-size: 26px; width: 100%;">THANH TOÁN</button>
                        </a>
                    <?php } else { ?>
                        <a class="btn btn-success" style="border-radius: 0px; font-size: 26px; width: 100%;" href="../../webbanhang1/admin/authen/login.php">Đăng nhập để mua hàng</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    function completeCheckout() {
        var isValid = true;

        var fullname = document.getElementById('usr').value.trim();
        var email = document.getElementById('email').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var address = document.getElementById('address').value.trim();

        // Reset error messages
        document.getElementById('fullnameError').style.display = 'none';
        document.getElementById('emailError').style.display = 'none';
        document.getElementById('phoneError').style.display = 'none';
        document.getElementById('addressError').style.display = 'none';

        // Validate fullname
        if (fullname === '') {
            document.getElementById('fullnameError').style.display = 'block';
            isValid = false;
        }

        // Validate email
        if (email === '') {
            document.getElementById('emailError').style.display = 'block';
            isValid = false;
        }

        // Validate phone
        if (phone === '') {
            document.getElementById('phoneError').style.display = 'block';
            isValid = false;
        }

        // Validate address
        if (address === '') {
            document.getElementById('addressError').style.display = 'block';
            isValid = false;
        }

        if (!isValid) return false;

        // Proceed to checkout if validation passes
        $.post('api/ajax_request.php', {
            'action': 'checkout',
            'fullname': $('[name=fullname]').val(),
            'email': $('[name=email]').val(),
            'phone_number': $('[name=phone]').val(),
            'address': $('[name=address]').val(),
            'note': $('[name=note]').val()
        }, function() {
            window.open('complete.php', '_self');
        });

        return false;
    }
</script>

<?php
require_once('layouts/footer.php');
?>
