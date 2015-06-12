<?php
header("content-Type: text/html; charset=Utf-8");
$folder_name = 'manage';
//网站目录名称
include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';
//判断是否有Get参数
//if (is_array($_GET) && count($_GET) > 0) {
	$db = new DB();
	//$list = $db -> query('SELECT * FROM `task_task` where `.$_POST["field"].` = '. $_POST["value"]);
	$data = array();
	$tbody = array();

	//echo $_SERVER["QUERY_STRING"];
	//print_r($_GET);
	$condition = '';

	foreach ($_GET as $key => $value) {
		$condition .= "and " . $key . " = '" . $value . "'";
	}
	//拼装sql语句，要注意，value必须是字符串，即SELECT * FROM `task_task` WHERE 1 = 1 and priority = 'p1' and type = 'requirement' p1和requirement 要加引号

	$list = $db -> query("SELECT * FROM `task_project` WHERE 1 = 1 $condition");

	while ($field = mysql_fetch_field($list)) {
		$fieldarr[] = $field -> name;
	}

	while ($row = mysql_fetch_row($list)) {
		$temp = array_combine($fieldarr, $row);
		$tbody[] = array('data' => $temp, 'attribute' => array('links' => array('title' => "task/19")));
	}

	$data['tbody'] = $tbody;
	$json = json_encode($tbody);
	//将数组进行json编码
	echo $json;
//}
?>