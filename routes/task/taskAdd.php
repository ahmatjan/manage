<?php
session_start();
$folder_name = '/manage';//网站目录名称

include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
date_default_timezone_set('Asia/Shanghai'); 

$tpl->assign("title", "任务管理");
$tpl->assign("description", "任务管理系统");
$tpl->display("taskAdd.tpl");


//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['username'])){
    header("Location:http://".$_SERVER['HTTP_HOST'].$folder_name.'/routes/task/login.php');
    exit();
}

if(isset($_POST['title'])){
    $db = new DB();
    $data['id'] = "";
	$data['title'] = $_POST['title'];
	$data['type'] = $_POST['type'];
	$data['content'] = $_POST['content'];
    $data['owner'] = $_SESSION['username'];
	$data['priority'] = $_POST['priority'];
	$data['hour'] = $_POST['hour'];
	$data['owner'] = $_SESSION['username'];
	$data['add_time'] = date("Y-m-d H:i:s");
	$data['project_id'] = $_POST['project_id'];
  $db->insert('task_task',$data);

  //跟新项目人时
  if($_POST['hour'] > 0){
	$db -> query('update `task_project` set `hour` = `hour`+'.$_POST['hour'].' WHERE `id` = '.$_POST['project_id']);
  }

  $url = "http://".$_SERVER['HTTP_HOST'].$folder_name."/routes/task/"; 

  //header("Location: ".$url); 
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href='$url'"; 
	echo "</script>";
}

?>