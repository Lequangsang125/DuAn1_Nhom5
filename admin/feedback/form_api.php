<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if($user == null) {
	die();
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'mark':
			readFeedback();
			break;

			case 'delete':
				deleteProduct(); // Xóa phản hồi
				break;

	}
	
}

function readFeedback() {
	$id = getPost('id');
	$updated_at = date("Y-m-d H:i:s");
	$sql = "update Feedback set status = 1, updated_at = '$updated_at' where id = $id";
	execute($sql);
}


function deleteProduct() {
	$id = getPost('id');
	$updated_at = date("Y-m-d H:i:s");
	$sql = "DELETE FROM Feedback WHERE id = $id";
	execute($sql);
}