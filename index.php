<?php
session_start();
$folder_name = '/manage';//网站目录名称

include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/config/config.inc.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/db.php';
include  $_SERVER['DOCUMENT_ROOT'] .$folder_name.'/common/common.php';

if (ismobile()) {
    //设置默认默认主题为 mobile
    $tpl->display("mobile/index.tpl");
}else{
	$tpl->display("index.tpl");
}

?>