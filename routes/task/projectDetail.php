<?php
$folder_name = 'manage';
//网站目录名称

include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

$tpl -> assign("title", "招聘试题");
$tpl -> assign("description", "招聘试题管理系统");

$db = new DB();
$id = $_GET['id'];
$sql = "SELECT * FROM `task_project` where id = " . $id;
$result = $db -> get_one($sql);

$tpl -> assign("list", $result);
$tpl -> display("detail.tpl");
?>