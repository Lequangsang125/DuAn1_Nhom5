<?php 
require_once('layouts/header.php');
?>
<?php
	// session_start();
	require_once('utils/utility.php');
	require_once('database/dbhelper.php');

	$sql = "SELECT * FROM Orders;";
    $check = executeResult($sql);

?>
<?php
    
    if($check){
        
    }
    else{
        echo "<p>Đơn hàng thất bại</p>";
    }
?>

<?php
require_once('layouts/footer.php');
?>