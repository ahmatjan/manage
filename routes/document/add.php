<?php
session_start();
$folder_name = '/manage';//网站目录名称
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
include  './config.inc.php';
$tpl->assign("title", "招聘试题");
$tpl->assign("description", "招聘试题管理系统");

if(isset($_POST['title'])){
	$db = new DB();
	$data['id'] = "";
	$data['title'] = $_POST['title'];
	$data['owner'] = $_SESSION['username'];
	$data['content'] = $_POST['content'];
	$data['category_id'] = $_POST['category_id'];
	$db->insert('document_doc',$data);
	$url = "http://".$_SERVER['HTTP_HOST'].$folder_name."/routes/document/"; 
	echo "<script language='javascript' type='text/javascript'>";  
	echo "window.location.href='$url'";  
	echo "</script>";  
}else{
	$db = new DB();
	$list = $db->query('SELECT * FROM `document_project`');
	$result = array();
	while($row = mysql_fetch_array($list)) {
		$list_category = $db->query("SELECT * FROM `document_category` where id =" .$row['id']);
		while($row_category = mysql_fetch_array($list_category)) {
			$row['category'] = $row_category;
		}
		$result[] = $row;
	}
  //print_r($result);
	$tpl->assign("categorys", $result);
	$tpl->display("add.tpl");
}

?>