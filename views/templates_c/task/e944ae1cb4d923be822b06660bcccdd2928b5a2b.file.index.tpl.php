<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-21 03:08:05
         compiled from "D:\wamp\www\manage\views\templates\task\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10128554c589cc99318-50866058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e944ae1cb4d923be822b06660bcccdd2928b5a2b' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\index.tpl',
      1 => 1432176611,
      2 => 'file',
    ),
    'ad904dd1c3664a1417fac7a013d4109ecc60d0b3' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\layout.tpl',
      1 => 1432176261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10128554c589cc99318-50866058',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554c589d017370_86393870',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554c589d017370_86393870')) {function content_554c589d017370_86393870($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
      		<link rel="stylesheet" href="../../static/css/reset.css" />
      		<link rel="stylesheet" href="../../static/css/common.css" />
        
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
        
			<div class="w960">
				<ul>
					<?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['question']->key;
?>
						<li>
							<a href="./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>

							</a> <a href="./update.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">编辑</a> <a href="./task.php?project_id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">查看任务</a>
						</li>
						<?php } ?>
				</ul>
				<a href="./projectAdd.php">新增项目</a>
				<div id="table">loading</div>
			</div>

		 
    </body> 
</html> <?php }} ?>
