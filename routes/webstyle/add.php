<?php
session_start();
header("Content-type: text/html; charset=utf-8"); 
date_default_timezone_set("Asia/Shanghai");
$folder_name = '/manage';//网站目录名称
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/config.inc.php';
//引入文件操作类
require '../public/FileUtil.php';
//引入文件上传类
require '../public/fileUpload.class.php';

function createFile($title,$type,$content){
	//生成文件
	$File = new FileUtil();
	$File->writetofile(BASE_PATH.'upload/webstyle/public/'.$type.'/'.$title.'.'.$type,$content);
	return $codeFilePath = '/manage/upload/webstyle/public/'.$type.'/'.$title.'.'.$type;
}

if(isset($_POST['category']) && $_POST['category']  == 'code'){
	$up = new FileUpload();
	//设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
	$up -> set("path", "../../upload/webstyle/public/".$_POST['code_type']);
	$up -> set("maxsize", 2000000);
	$up -> set("allowtype", array("gif", "png", "jpg","jpeg",'css','js'));
	$up -> set("israndname", false);

	//使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
	if($up -> upload("file")) {
	    var_dump($up->getFileName());
	    $file_path_code = '/manage/upload/webstyle/public/'.$_POST['code_type'].'/'.$up->getFileName();
	} else {
	    echo '<pre>';
	    //获取上传失败以后的错误提示
	    var_dump($up->getErrorMsg());
	    echo '</pre>';
	}

    $db = new DB();
    $data['id'] = "";
	$data['title'] = $_POST['code_title'];
	//$data['content'] = $_POST['code_content'];
	$data['type'] = $_POST['code_type'];
	$data['file_path'] = $file_path_code;
	$data['is_public'] = 1;

    $db->insert('webstyle_code',$data);
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
/*
* JointHtml 处理组合htmlstr
*/
class  JointHtml {
   public $code; 
   public $cssFilePath; 
   public $jsFilePath; 
   public $head; 
   public $body; 
  public function __construct($code, $cssFilePath, $jsFilePath) {
    $this->head = array();
    $this->code = $code;
    $this->cssFilePath = $cssFilePath;
    $this->jsFilePath = $jsFilePath;
    $this->jointHead();
    $this->jointBody();
  }
  protected function jointLink() {
	return '<link rel="stylesheet" type="text/css" href="'.$this->cssFilePath.'">';
  }
  public function jointScript() {
	return '<script type="text/javascript" src="'.$this->jsFilePath.'"></script> ';
  }
  public function jointHead() {
	$this->head[] =  '<head>';
	$this->head[] =  '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> ';
    $this->head[] =  $this->jointLink();
    $this->head[] =  $this->jointScript();
	$this->head[] =  '</head>';
  }
  public function jointBody() {
	$this->body[] =  '<body>';
	$this->body[] =  $this->code;
	$this->body[] =  '</body>';
  }
  public function jointHtml(){
  	$html = array();
  	$html[] = '<!DOCTYPE HTML><html>';
  	$html[] = implode(" ", $this->head);
  	$html[] = implode(" ", $this->body);
  	$html[] = '</html>';
  	return implode(" ", $html);
  }
}
 //addslashes 转义函数

if(isset($_POST['action']) &&  $_POST['action']  == 'toModuleSave' &&  isset($_POST['htmlCode']) &&  isset($_POST['cssCode']) ){
	$moduleName = $_POST['title'];
	$db = new DB();
	$File = new FileUtil(); 

	$File->createDir(BASE_PATH.'upload/webstyle/module/'.date('Y-m-d-H-i-s').'/css/');
	$cssFilePath = '/upload/webstyle/module/'.date('Y-m-d-H-i-s').'/css/index.css';
	$File->writetofile(BASE_PATH.$cssFilePath,$_POST['cssCode']);
	$cssCodeId = $db->insert('webstyle_code',insertCode($moduleName.'_css',addslashes($_POST['cssCode']),'css','/manage'.$cssFilePath),true);

	if(isset($_POST['jsCode'])){
		$File->createDir(BASE_PATH.'upload/webstyle/module/'.date('Y-m-d-H-i-s').'/js/');
		$jsFilePath = '/upload/webstyle/module/'.date('Y-m-d-H-i-s').'/js/index.js';
		$File->writetofile(BASE_PATH.$jsFilePath,$_POST['jsCode']);
		$jsCodeId = $db->insert('webstyle_code',insertCode($moduleName.'_js',addslashes($_POST['jsCode']),'js','/manage'.$jsFilePath),true);
	}

	$File->createDir(BASE_PATH.'upload/webstyle/module/'.date('Y-m-d-H-i-s'));
	$htmlFilePath = '/upload/webstyle/module/'.date('Y-m-d-H-i-s').'/index.html';

	$jointHtml = new JointHtml($_POST['htmlCode'],'css/index.css','js/index.js');
	$htmlCode = $jointHtml->jointHtml();

	$File->writetofile(BASE_PATH.$htmlFilePath,$htmlCode);
    $htmlCodeId = $db->insert('webstyle_code',insertCode($moduleName.'_html',addslashes($_POST['htmlCode']),'html','/manage'.$htmlFilePath),true);

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