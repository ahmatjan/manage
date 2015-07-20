<?php
session_start();
date_default_timezone_set("Asia/Shanghai");
$folder_name = '/manage';//网站目录名称
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/config.inc.php';
//引入文件操作类
require '../public/FileUtil.php';

//$tpl->display("webstyle/add.tpl");

function createFile($title,$type,$content){
	//生成文件
	$File = new FileUtil();
	$File->writetofile(BASE_PATH.'upload/webstyle/'.$type.'/'.$title.'.'.$type,$content);
}

if(isset($_POST['category']) && $_POST['category']  == 'code'){
    $db = new DB();
    $data['id'] = "";
	$data['title'] = $_POST['title'];
	$data['content'] = $_POST['content'];
	$data['type'] = $_POST['type'];

   $db->insert('webstyle_code',$data);

   createFile($_POST['title'],$_POST['type'],$_POST['content']); 
}

if(isset($_POST['action']) &&  $_POST['action']  == 'tempSaveFile'){
 	//生成文件
	$File = new FileUtil();
	$File->writetofile(BASE_PATH.'views/templates/webstyle/temp/'.time().'.js',$_POST['content']);
    echo '../../views/templates/webstyle/temp/'.time().'.js';
}

//组合code插入参数
function insertCode($title,$content,$type,$file_path){
    $data['id'] = "";
	$data['title'] = $title;
	$data['content'] = $content;
	$data['type'] = $type;
	$data['file_path'] = $file_path;
    return $data;
}

function groupHtmlStr(){
	
 return  $htmlCode;
}

if(isset($_POST['action']) &&  $_POST['action']  == 'toModuleSave' &&  isset($_POST['htmlCode']) &&  isset($_POST['cssCode']) ){
	$moduleName = $_POST['title'];
	$db = new DB();
	$File = new FileUtil(); 

	$File->createDir(BASE_PATH.'upload/webstyle/module/'.date('Y-m-d-H-i-s').'/css/');
	$csslFilePath = 'upload/webstyle/module/'.date('Y-m-d-H-i-s').'/css/index.css';
	$File->writetofile(BASE_PATH.$csslFilePath,$_POST['cssCode']);
	$cssCodeId = $db->insert('webstyle_code',insertCode($moduleName.'_css',$_POST['cssCode'],'css',$csslFilePath),true);

	if(isset($_POST['jsCode'])){
		$File->createDir(BASE_PATH.'upload/webstyle/module/'.date('Y-m-d-H-i-s').'/js/');
		$jsFilePath = 'upload/webstyle/module/'.date('Y-m-d-H-i-s').'/js/index.js';
		$File->writetofile(BASE_PATH.$jsFilePath,$_POST['jsCode']);
		$jsCodeId = $db->insert('webstyle_code',insertCode($moduleName.'_js',$_POST['jsCode'],'js',$jsFilePath),true);
	}

	$File->createDir(BASE_PATH.'upload/webstyle/module/'.date('Y-m-d-H-i-s'));
	$htmlFilePath = 'upload/webstyle/module/'.date('Y-m-d-H-i-s').'/index.html';
	$htmlCode = '<!DOCTYPE HTML><html><body>'.$_POST['htmlCode'].'</body></html>';
	$File->writetofile(BASE_PATH.$htmlFilePath,$htmlCode);
    $htmlCodeId = $db->insert('webstyle_code',insertCode($moduleName.'_html',$_POST['htmlCode'],'html',$htmlFilePath),true);

    $data['id'] = "";
	$data['title'] = $moduleName;
	$data['content'] = $_POST['content'];
	$data['html'] = $htmlCodeId;
	$data['css'] = $cssCodeId;
	$data['js'] = $jsCodeId;

    $db->insert('webstyle_module',$data);
	echo 0;
}


?>