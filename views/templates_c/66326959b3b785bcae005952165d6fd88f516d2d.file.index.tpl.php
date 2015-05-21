<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-08 06:32:58
         compiled from "D:\wamp\www\manage\views\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20621554c589a973825-80261061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66326959b3b785bcae005952165d6fd88f516d2d' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\index.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
    '98a91d976cc44f8bf47cbe82d0304b8f812bf686' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\layout.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20621554c589a973825-80261061',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554c589ab6a158_09538067',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554c589ab6a158_09538067')) {function content_554c589ab6a158_09538067($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
        
		<title>前端管理平台</title>
		<?php echo '<script'; ?>
>
		//$(document).ready(function(){

		//});
	 <?php echo '</script'; ?>
>
	     
    </head> 
    <body> 
        
	<ul>
		<li><a href="./routes/task/" target="_block">任务管理</a></li>
		 <li><a href="./routes/interview/" target="_block">招聘试题</a></li>
	 	 <li><a href="./routes/document/" target="_block">文档管理</a></li>
	  </ul>   
	 
    </body> 
</html> <?php }} ?>
