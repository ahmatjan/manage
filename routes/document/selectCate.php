<?php
$folder_name = '/manage';//网站目录名称
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
include  './config.inc.php';
$db = new DB();
$list = $db->query("SELECT * FROM `document_category` where project_id =" .$_GET['project_id']);
$result = array();
while($row = mysql_fetch_object($list)) {
	$result[] = $row;
}
echo $str=json_encode($result);
?>