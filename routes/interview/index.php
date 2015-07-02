<?php
session_start();
$folder_name = '/manage';//网站目录名称

include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/common/common.php';

$db = new DB();
$list = $db->query('SELECT * FROM `interview_question`');

$result = array();
while($row = mysql_fetch_array($list)) {
	$result[] = $row;
}
  //var_dump($result);
$tpl->assign("list", $result);

if (ismobile()) {
    //设置默认默认主题为 mobile
	$tpl->display("mobile/index.tpl");
}else{
	$tpl->display("index.tpl");
}

?>