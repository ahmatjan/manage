<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-19 02:16:12
         compiled from "D:\wamp\www\manage\views\templates\task\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10371555a9c92b9e971-47814056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '904f81e9c01ae1b4ab1a29ffaf578f471adee3ab' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\add.tpl',
      1 => 1432001762,
      2 => 'file',
    ),
    'ad904dd1c3664a1417fac7a013d4109ecc60d0b3' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\layout.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10371555a9c92b9e971-47814056',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_555a9c92ca2155_44480022',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555a9c92ca2155_44480022')) {function content_555a9c92ca2155_44480022($_smarty_tpl) {?><!DOCTYPE HTML> 
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
		<?php echo '<script'; ?>
 type="text/javascript" src=".../../static/js/jquery.DatePicker.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/add.js"><?php echo '</script'; ?>
> 
	     
    </head> 
    <body> 
        
		<div class="side-right">
			<form action="add.php" method="post">
				<label>标题</label>：<input type="text" name="title" />
				<br/>
				<label>完成时间</label>：
				<input type="text" name="end_time" id="picker_endtime" />
				<br/>
				<label>等级</label>：
				<select name="priority">
				 <option value="P0">P0</option>
				 <option value="P1">P1</option>
				 <option value="P2" selected="selected">P2</option>
				 <option value="P3">P3</option>
				</select>
				<br/>
				<label>详情</label>：<textarea name="content" id="content"></textarea>
				<br/>
				<input type="submit" value="提交" />
			</form>
		</div>
		<div class="side-right">
			<iframe src="" id="preview" frameborder="0" height="360"></iframe>
		</div>
	 
    </body> 
</html> <?php }} ?>