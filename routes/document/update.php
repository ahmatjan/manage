<?php
$folder_name = '/manage';//网站目录名称
include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';

$tpl->assign("title", "文档修改");
$tpl->assign("description", "文档修改");

$db = new DB();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM `document_doc` where id = ".$id;
	$result = $db->get_one($sql);

	//$tagId = $result['project_id'];
	//echo $tagId;
	//$tagSql = "SELECT * FROM `document_category` where id = ".$tagId;
	//$tagRes = $db->get_one($tagSql);
	//$result['tag'] = $tagRes['name'];
	$tpl->assign("list", $result);
	$tpl->display("update.tpl");
}

if(isset($_POST['title'])){
	$data['title'] = $_POST['title'];
	$data['content'] = $_POST['content'];
    $db->update('document_doc',$data,'id='.$_POST['id']);

    $url = "http://".$_SERVER['HTTP_HOST'].$folder_name."/routes/document/";  
  //header("Location: ".$url); 
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href='$url'"; 
	echo "</script>";
}


?>