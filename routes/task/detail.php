<?php
session_start();
$folder_name = 'manage';
//网站目录名称

include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

$tpl -> assign("title", "招聘试题");
$tpl -> assign("description", "招聘试题管理系统");
$db = new DB();

//修改操作
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM `task_task` where id = " . $id;
	$result = $db -> get_one($sql);

	$list_comment = $db->query('SELECT * FROM `task_comment` where `task_id` = '.$id);

    $arr_comment = array();

	while($row = mysql_fetch_array($list_comment)){
        $arr_comment[] = $row;
	 }

	$tpl -> assign("list", $result);
	$tpl -> assign("list_comment", $arr_comment);
	$tpl -> display("detail.tpl");
}


//修改操作
if(isset($_POST['task_comment'])){
	if(!isset($_SESSION['username'])){
		$username = '游客';
	}else{
		$username = $_SESSION['username'];
	}
	$data['id'] = "";
	$data['task_id'] = $_POST['task_id'];
	$data['user_id'] = $username;
	$data['task_comment'] = $_POST['task_comment'] ;  
    $db->insert('task_comment',$data);

    $url = "http://".$_SERVER['HTTP_HOST']. $folder_name . "/routes/task/detail.php?id=".$_POST['task_id']; 
    //header("Location: ".$url); 
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href='$url'"; 
	echo "</script>";
}


?>