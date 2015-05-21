<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-21 02:47:58
         compiled from "D:\wamp\www\manage\views\templates\task\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27380555aa7857043a4-02255767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce336dc55c5e7b61003bf6db77052923342581c1' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\detail.tpl',
      1 => 1432176475,
      2 => 'file',
    ),
    'ad904dd1c3664a1417fac7a013d4109ecc60d0b3' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\layout.tpl',
      1 => 1432176261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27380555aa7857043a4-02255767',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_555aa785859b17_69151319',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555aa785859b17_69151319')) {function content_555aa785859b17_69151319($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
      		<link rel="stylesheet" href="../../static/css/reset.css" />
      		<link rel="stylesheet" href="../../static/css/common.css" />
        
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
        
		<div class="w960">
			<h1><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</h1>
			<div id="content"><?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>
</div>
		</div>
	 
    </body> 
</html> <?php }} ?>
