<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
$folder_name = 'manage';//网站目录名称
include  './config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';

/*
   if(isset($_GET['type']) && $_GET['type'] == 'thead'){
	  $result = array("id"=>"ID","title"=>"名称","status"=>"状态","content"=>"内容","owner"=>"负责人","add_time"=>"添加时间","add_time"=>"添加时间",
	  	"end_time"=>"结束时间","add_time"=>"添加时间","start_time"=>"开始时间","priority"=>"等级","percent"=>"百分比","depend"=>"依赖任务");
	  $str = json_encode($result);//将数组进行json编码
	  //var_dump($str);
	  echo $str;
	}

    if(isset($_GET['type']) && $_GET['type'] == 'tbody'){
  	    $db = new DB();
	  	$list = $db->query('SELECT * FROM `task`');
	  
		$result = array();
		$fieldarr  = array();
		while($field = mysql_fetch_field($list)){
			$fieldarr[] = $field->name;
		}

		while($row = mysql_fetch_row($list)) {
			$temp = array_combine($fieldarr,$row); 
		    $result[] =  array('data'=>$temp,'attribute'=>array('links' =>array('title' => "task/19")));
		}

		//var_dump($result);
	  $str = json_encode($result);//将数组进行json编码
	  echo $str;
	}
	*/

    $data = array();

	$thead = array("id"=>"ID","title"=>"名称","status"=>"状态","content"=>"内容","owner"=>"负责人","add_time"=>"添加时间","add_time"=>"添加时间",
	  	"end_time"=>"结束时间","add_time"=>"添加时间","start_time"=>"开始时间","priority"=>"等级","percent"=>"百分比","depend"=>"依赖任务");

 	$data['thead'] =  $thead;

    $db = new DB();

    if(isset($_GET['project_id'])){  	
    	$list = $db->query('SELECT * FROM `task_task` where `project_id` = '.$_GET['project_id']);
	}else{  	
		$list = $db->query('SELECT * FROM `task_task`');
	}
  
	$tbody = array();
	$fieldarr  = array();
	while($field = mysql_fetch_field($list)){
		$fieldarr[] = $field->name;
	}

	while($row = mysql_fetch_row($list)) {
		//array_combine() 函数通过合并两个数组来创建一个新数组，其中的一个数组是键名，另一个数组的值为键值。
		$temp = array_combine($fieldarr,$row); 
		$value = $temp['title'];
		$url = './detail.php?id='.$temp['id'];
		$temp['title'] = array('type' => 'link', 'value' => $value,'url'=>$url);
		
	    $type_value = $temp['type'];
		$type_name = '需求';
		if($type_value == 'bug'){
			$type_name = '缺陷';
		}
		$temp['type'] = array('type' => 'text', 'value' => $type_value,'name' => $type_name);
		
		$priority_value = $temp['priority'];
		//strtoupper 将字符串转换为大写形式
		$temp['priority'] = array('type' => 'select', 'value' => $priority_value,'name' => strtoupper($priority_value));
		
		//$percent_value = $temp['percent'];
		//$temp['percent'] = array('type' => 'percent', 'value' => $percent_value);

	    $tbody[] =  array('data'=>$temp,'attribute'=>array('links' =>array('title' => "task/19")));
	}

	$data['tbody'] =  $tbody;
	//print_r($data);
    //$str = json_encode($data);//将数组进行json编码
    //echo $str;
	
	$tbody_str = json_encode($tbody);//将数组进行json编码
    echo $tbody_str;
?>