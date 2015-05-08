<?php
session_start();
include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] ."/task/db.php";

  $db = new DB();
  $list = $db->query('SELECT * FROM `task_task`');

	$result = array();
	while($row = mysql_fetch_array($list)) {
	    $result[] = $row;
	}
  //var_dump($result);
  $tpl->assign("list", $result);

  $tpl->display("task.tpl");
?>