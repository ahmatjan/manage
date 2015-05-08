<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 05:40:39
         compiled from "D:\wamp\www\manage\views\templates\task\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:270255547065791ebe8-71803521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce336dc55c5e7b61003bf6db77052923342581c1' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\detail.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
    'ad904dd1c3664a1417fac7a013d4109ecc60d0b3' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\layout.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270255547065791ebe8-71803521',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55470657a53802_76816932',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55470657a53802_76816932')) {function content_55470657a53802_76816932($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
        
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link rel="stylesheet" type="text/css" href="../css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../css/add.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/jquery.min.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/codemirror.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/marked.js"><?php echo '</script'; ?>
> 
		<link rel="stylesheet" type="text/css" href="../css/detail.css">
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
