<?php
session_start();
$folder_name = '/manage';//网站目录名称

include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
date_default_timezone_set('Asia/Shanghai'); 

$tpl->assign("title", "任务管理");
$tpl->assign("description", "任务管理系统");
$tpl->display("projectAdd.tpl");

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['username'])){
    header("Location:http://".$_SERVER['HTTP_HOST']."/manage/routes/task/login.php");
    exit();
}

if(isset($_POST['title'])){
    $db = new DB();
    $data['id'] = "";
  	$data['title'] = $_POST['title'];
    $data['owner'] = $_SESSION['username'];
    $data['priority'] = $_POST['priority'];
    $data['owner'] = $_SESSION['username'];
    $data['plan_end_time'] = $_POST['plan_end_time'];
  	$data['content'] = $_POST['content'];
    $db->insert('task_project',$data);

  $url = "http://".$_SERVER['HTTP_HOST']."/manage/routes/task/"; 

  //header("Location: ".$url); 
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href='$url'"; 
	echo "</script>";
}
?>