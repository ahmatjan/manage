<?php
session_start();
$folder_name = 'manage';
//网站目录名称

include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

$tpl -> assign("title", "任务管理");
$tpl -> assign("description", "任务管理系统");
$tpl -> display("login.tpl");

if (isset($_POST['user'])) {
	$db = new DB();
	$sql = "SELECT * FROM `user` where user = '" . $_POST['user'] . "' and  password = " . $_POST['password'];
	$result = $db -> query($sql);

	$count = mysql_num_rows($result);
	if ($count == 0) {
		echo '登陆错误！';
	} else {
		echo '登陆成功！';
		$_SESSION['username'] = $_POST['user'];
		//sleep(5);
		$url = "http://" . $_SERVER['HTTP_HOST'] . $folder_name . "/routes/task/taskAdd.php";
		header("Location: " . $url);
	}
}

if (isset($_GET['action']) && $_GET['action'] == "logout") {
	unset($_SESSION['username']);
	exit ;
}
?>
