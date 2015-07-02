<?php
session_start();
header("content-Type: text/html; charset=Utf-8");
$folder_name = 'manage';
//网站目录名称
include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

if (isset($_POST['id'])) {
	$db = new DB();
	$id = $_POST['id'];

	$data[$_POST['field']] = $_POST['value'];
	$flag = $db -> update('task_project', $data, 'id=' . $_POST['id']);
	if ($flag) {
		echo 0;
	}
}
?>
