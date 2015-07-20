<?php
//define('ROOT_PATH',dirname(__FILE__)); 
//echo  $_SERVER['DOCUMENT_ROOT'];
//定义网站根目录
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");

//配置smarty模板
include BASE_PATH.'/smarty/libs/Smarty.class.php';
define('SMARTY_ROOT', BASE_PATH.'/views');
$tpl = new Smarty();
	$tpl->template_dir = SMARTY_ROOT."/templates/";
	$tpl->compile_dir = SMARTY_ROOT."/templates_c/";
	$tpl->config_dir = SMARTY_ROOT."/configs/";
	$tpl->cache_dir = SMARTY_ROOT."/cache/";
	$tpl->caching = 0;
	$tpl->cache_lifetime=60*60*24;
	$tpl->left_delimiter = '<{';
	$tpl->right_delimiter = '}>';

include  BASE_PATH.'/db.php';
?>