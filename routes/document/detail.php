<?php
session_start();
$folder_name = '/manage';//网站目录名称
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
include  './config.inc.php';

$tpl->assign("title", "文档显示");
$tpl->assign("description", "文档显示");

  	$db = new DB();
  	$id = $_GET['id'];
  	$sql = "SELECT * FROM `document_doc` where id = ".$id;
  	$result = $db->get_one($sql);

  	$tpl->assign("list", $result);
  	$tpl->display("detail.tpl");
?>