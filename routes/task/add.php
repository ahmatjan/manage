<?php
session_start();
$folder_name = '/manage';//网站目录名称

include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';

$tpl->assign("title", "任务管理");
$tpl->assign("description", "任务管理系统");
$tpl->display("add.tpl");


//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['username'])){
    header("Location:http://".$_SERVER['HTTP_HOST'].$folder_name.'/routes/task/login.php');
    exit();
}


if(isset($_POST['title'])){
    $db = new DB();
    $data['id'] = "";
	$data['title'] = $_POST['title'];
	$data['content'] = $_POST['content'];
	$data['level'] = $_POST['level'];
	$data['owner'] = $_SESSION['username'];
	$data['add_time'] = date("Y-m-d H:i:s");
	$data['end_time'] = $_POST['end_time'];
  $db->insert('task_task',$data);

  $url = "http://".$_SERVER['HTTP_HOST'].$folder_name."/routes/task/"; 

  //header("Location: ".$url); 
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href='$url'"; 
	echo "</script>";
}

?>