<?php
$folder_name = '/manage';//网站目录名称
include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';

$tpl->assign("title", "招聘试题");
$tpl->assign("description", "招聘试题管理系统");

$db = new DB();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM `interview_question` where id = ".$id;
	$result = $db->get_one($sql);

	$tagId = $result['tag'];
	echo $tagId;
	$tagSql = "SELECT * FROM `interview_tag` where id = ".$tagId;
	$tagRes = $db->get_one($tagSql);

	$result['tag'] = $tagRes['name'];

	$tpl->assign("list", $result);
	$tpl->display("update.tpl");
}


if(isset($_POST['title'])){
	$data['title'] = $_POST['title'];
	if(isset($_POST['tag'])){
        $tagData['id'] = "";
        $tagData['name'] = $_POST['tag'];
		$db->insert('interview_tag',$tagData);
		$data['tag'] = $db->insert_id();
	}

	$data['content'] = $_POST['content'];
	$data['answer'] = $_POST['answer'];

  $db->update('interview_question',$data,'id='.$_POST['id']);

   $url = "http://".$_SERVER['HTTP_HOST'].$folder_name."/routes/interview/";  
  //header("Location: ".$url); 
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href='$url'"; 
	echo "</script>";
}


?>