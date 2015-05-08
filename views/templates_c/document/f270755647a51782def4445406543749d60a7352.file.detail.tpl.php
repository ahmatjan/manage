<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 04:32:44
         compiled from "D:\wamp\www\manage\views\templates\document\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72105546f66c2f5ed6-55992624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f270755647a51782def4445406543749d60a7352' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\document\\detail.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
    '2ebe41572a2de3948abf9f5cc1b8577777d4cfc7' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\document\\layout.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72105546f66c2f5ed6-55992624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5546f66c3dcde0_00254659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5546f66c3dcde0_00254659')) {function content_5546f66c3dcde0_00254659($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
        
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link rel="stylesheet" type="text/css" href="../../static/document/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/document/markdown.css">
		<link rel="stylesheet" type="text/css" href="../../static/document/detail.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/jquery.min.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/codemirror.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/marked.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript">
			$(function() {
				  (function() {
				    $("#content").html(marked($("#content").html()));
				  })();
				  })
	  		<?php echo '</script'; ?>
>
		     
    </head> 
    <body> 
        
		<div class="wrap">
			<h1><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</h1>
			<div id="content"><?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>
</div>
		</div>
	 
    </body> 
</html> <?php }} ?>
