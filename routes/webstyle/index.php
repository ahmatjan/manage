<?php
session_start();
$folder_name = '/manage';//网站目录名称
$project = 'webstyle';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/config.inc.php';
include  BASE_PATH.'/common/common.php';

$db = new DB();
$list = $db->query('SELECT * FROM `webstyle_module`');

$result = array();
while($row = mysql_fetch_array($list)) {
    $htmlArr = array();
    $listHtml = $db->query('SELECT * FROM `webstyle_code` where id ='.$row['html']);
    while($rowHtml= mysql_fetch_array($listHtml)) {
		$htmlArr[] = $rowHtml;
	}
	$row['html'] =  $htmlArr;

    $cssArr = array();
    $listCss = $db->query('SELECT * FROM `webstyle_code` where id ='.$row['css']);
    while($rowCss = mysql_fetch_array($listCss)) {
		$cssArr[] = $rowCss;
	}
	$row['css'] =  $cssArr;
	
    $jsArr = array();
    $listJs = $db->query('SELECT * FROM `webstyle_code` where id ='.$row['js']);
    while($rowJs = mysql_fetch_array($listJs)) {
		$jsArr[] = $rowJs;
	}
	$row['js'] =  $jsArr;

	$result[] = $row;
}

$listPublic = $db->query('SELECT * FROM `webstyle_code` where is_public = 1');
$resultPublic = array();

while($row = mysql_fetch_array($listPublic)) {
	$resultPublic[] = $row;
}

// print_r($result);
$tpl->assign("list", $result);
$tpl->assign("listPublic", $resultPublic);

if (ismobile()) {
    //设置默认默认主题为 mobile
	$tpl->display($project."mobile/index.tpl");
}else{
	$tpl->display($project."/index.tpl");
}

?>