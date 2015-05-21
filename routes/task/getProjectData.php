<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
$folder_name = 'manage';
//网站目录名称
include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

$data = array();
$db = new DB();

$list = $db -> query('SELECT * FROM `task_project`');

$tbody = array();
$fieldarr = array();
while ($field = mysql_fetch_field($list)) {
	$fieldarr[] = $field -> name;
}

while ($row = mysql_fetch_row($list)) {
	//array_combine() 函数通过合并两个数组来创建一个新数组，其中的一个数组是键名，另一个数组的值为键值。
	$temp = array_combine($fieldarr, $row);
	$value = $temp['title'];
	$url = './projectDetail.php?id=' . $temp['id'];
	$temp['title'] = array('type' => 'link', 'value' => $value, 'url' => $url);

	$tbody[] = array('data' => $temp, 'attribute' => array('links' => array('title' => "task/19")));
}

$data['tbody'] = $tbody;
//print_r($data);
//$str = json_encode($data);//将数组进行json编码
//echo $str;

$tbody_str = json_encode($tbody);
//将数组进行json编码
echo $tbody_str;
?>