<?php
session_start();
header("Content-type: text/html; charset=utf-8"); 
$folder_name = '/manage';//网站目录名称
include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
$db = new DB();
$list = $db->query('SELECT * FROM `document_project`');
$result = array();

while($row = mysql_fetch_array($list)) {
	$list_category = $db->query("SELECT * FROM `document_category` where project_id =" .$row['id']);
	while($row_category = mysql_fetch_array($list_category)) {
		$temp = array();
		$temp['id'] = $row_category['id'];
		$temp['name'] = $row_category['name'];
		$row['category'][] = $temp;
	}
	$result[] = $row;
}
$tpl->assign("list", $result);
$tpl->display("project.tpl");
?>