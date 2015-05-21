<?php
session_start();
header("content-Type: text/html; charset=Utf-8");
$folder_name = 'manage';
//网站目录名称
include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

$tpl -> display("task.tpl");
?>