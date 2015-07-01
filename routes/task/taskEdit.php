<?php
$folder_name = 'manage';
//网站目录名称
include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';
$tpl->assign("title", "招聘试题");
$tpl->assign("description", "招聘试题管理系统");

$db = new DB();
//展示页面
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM `task_task` where id = ".$id;
	$result = $db->get_one($sql);

	$tpl->assign("list", $result);
	$tpl->display("taskEdit.tpl");
}

//修改操作
if(isset($_POST['title'])){
	
	$data['id'] = "";
	$data['title'] = $_POST['title'];
	$data['content'] = $_POST['content'];
    $db->update('task_task',$data,'id=' . $_POST['id']);

    $url = "http://".$_SERVER['HTTP_HOST']. $folder_name . "/routes/task"; 
    //header("Location: ".$url); 
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href='$url'"; 
	echo "</script>";
}


?>