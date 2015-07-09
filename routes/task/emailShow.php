<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
$folder_name = 'manage';  //网站目录名称

include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

$db = new DB();
$list = $db -> query('SELECT * FROM `task_project` where id in ('.$_GET['ids'].')');
$result = array();
while ($row = mysql_fetch_array($list)) {
	 $resultArr = array();
     $listTask = $db -> query('SELECT * FROM `task_Task` where project_id = '.$row["id"]);
     while ($rowTask = mysql_fetch_array($listTask)) {
		$resultArr[] = $rowTask; 
     }
     $row['tasks'] = $resultArr;
	 $result[] = $row;
}
//print_r($result);
$tpl -> assign("list", $result);
$tpl -> display("emailShow.tpl");
?>