<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 03:36:17
         compiled from "D:\wamp\www\web-manage\views\templates\task\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93765546e931368743-54753781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc42778c36f3c2049bc4e1283427e4a586e31d31' => 
    array (
      0 => 'D:\\wamp\\www\\web-manage\\views\\templates\\task\\index.tpl',
      1 => 1429862722,
      2 => 'file',
    ),
    'afd0dd5b4580336abcee2b2406549ebc84a81eae' => 
    array (
      0 => 'D:\\wamp\\www\\web-manage\\views\\templates\\task\\layout.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93765546e931368743-54753781',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5546e931540e34_05040721',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5546e931540e34_05040721')) {function content_5546e931540e34_05040721($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
        
		<title>任务</title>
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../../lhz_table/require.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../../lhz_table/lhz_table.js"><?php echo '</script'; ?>
>
		<link rel="stylesheet" type="text/css" href="../../lhz_table/lhz_table.css" />
		<?php echo '<script'; ?>
>
			$(document).ready(function() {
				var tb = $("#table").lhz_table({
					"getDataUrl": './getData.php',
					"updateDataUrl": './tableUPdate.php',
					"searchDataUrl": './tableSearch.php',
				});
				//tb.refresh();
			});
		<?php echo '</script'; ?>
>
		     
    </head> 
    <body> 
        
				<a href="./add.php">新增</a>
				<div id="table">loading</div>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['question']->key;
?>
						<li>
							<a href="./routes/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>

							</a> <a href="./routes/update.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">编辑</a> <a href="./routes/task.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">查看任务</a>
						</li>
						<?php } ?>
				</ul>
				 
    </body> 
</html> <?php }} ?>
