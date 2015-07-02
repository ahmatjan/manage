<?php
session_start();
$folder_name = '/manage';//网站目录名称
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
include  './config.inc.php';

$tpl->assign("title", "招聘试题");
$tpl->assign("description", "招聘试题管理系统");
$tpl->display("add.tpl");

if(isset($_POST['title'])){
    $db = new DB();
    $data['id'] = "";
	$data['title'] = $_POST['title'];
	$data['owner'] = $_SESSION['username'];
	if(isset($_POST['tag'])){
        $tagData['id'] = "";
        $tagData['name'] = $_POST['tag'];
		$db->insert('interview_tag',$tagData);
		$data['tag'] = $db->insert_id();
	}
	$data['content'] = $_POST['content'];
	$data['answer'] = $_POST['answer'];
  $db->insert('interview_question',$data);

 $url = "http://".$_SERVER['HTTP_HOST'].$folder_name."/routes/interview/"; 

echo "<script language='javascript' type='text/javascript'>";  
echo "window.location.href='$url'";  
echo "</script>";  

}

?>