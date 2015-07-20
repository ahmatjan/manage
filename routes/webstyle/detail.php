<?php
session_start();
$folder_name = '/manage';//网站目录名称
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
include  './config.inc.php';

$tpl->assign("title", "招聘试题");
$tpl->assign("description", "招聘试题管理系统");

  	$db = new DB();
  	$id = $_GET['id'];
  	$sql = "SELECT * FROM `interview_question` where id = ".$id;
  	$result = $db->get_one($sql);

  	$tpl->assign("list", $result);
  	$tpl->display("detail.tpl");
?>