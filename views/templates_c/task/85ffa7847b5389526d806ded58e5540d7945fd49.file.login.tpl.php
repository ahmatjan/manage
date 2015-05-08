<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 05:43:50
         compiled from "D:\wamp\www\manage\views\templates\task\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2067055470716f1be20-13908373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85ffa7847b5389526d806ded58e5540d7945fd49' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\login.tpl',
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
  'nocache_hash' => '2067055470716f1be20-13908373',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554707170c8950_42580663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554707170c8950_42580663')) {function content_554707170c8950_42580663($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
        
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link rel="stylesheet" type="text/css" href="../../static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/css/add.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/jquery.min.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/codemirror.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/marked.js"><?php echo '</script'; ?>
> 
		     
    </head> 
    <body> 
        
		<div>
		<form action="login.php" method="post">
			<label>名字：</label><input type="text" name="user">
			<label>密码：</label><input type="text" name="password">
			<input type="submit" value="登陆">
		</form>
		</div>
	 
    </body> 
</html> <?php }} ?>
