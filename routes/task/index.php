<?php
session_start();
$folder_name = 'manage';//网站目录名称

include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';

  $db = new DB();
  /*$list = $db->query('SELECT * FROM `task`');

	$result = array();
	while($row = mysql_fetch_array($list)) {
	    $result[] = $row;
	}
  //var_dump($result);
  $tpl->assign("list", $result);
  */

    $list = $db->query('SELECT * FROM `task_project`');

	$result = array();
	while($row = mysql_fetch_array($list)) {
	    $result[] = $row;
	}
   //var_dump($result);
    $tpl->assign("list", $result);

  $tpl->display("index.tpl");
?>