<?php
header("content-Type: text/html; charset=Utf-8");
$folder_name = 'manage';
//网站目录名称
include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

if (isset($_POST['id'])) {
	$db = new DB();
	$data[$_POST['field']] = $_POST['value'];
	$flag = $db -> update('task_task', $data, 'id=' . $_POST['id']);
	if($flag){
		echo 0;
	}
}
?>