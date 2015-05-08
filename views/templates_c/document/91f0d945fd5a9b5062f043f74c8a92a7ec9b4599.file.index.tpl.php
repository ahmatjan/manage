<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 04:32:28
         compiled from "D:\wamp\www\manage\views\templates\document\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109645546f65c423259-10019985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91f0d945fd5a9b5062f043f74c8a92a7ec9b4599' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\document\\index.tpl',
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
  'nocache_hash' => '109645546f65c423259-10019985',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5546f65c5f4ba7_53524627',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5546f65c5f4ba7_53524627')) {function content_5546f65c5f4ba7_53524627($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
        
		<title>文档管理</title>
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/jquery.min.js"><?php echo '</script'; ?>
>
		<link rel="stylesheet" type="text/css" href="../../static/document/css/style.css"> 
		<link rel="stylesheet" type="text/css" href="../../static/document/css/document-index.css"> 
	     
    </head> 
    <body> 
        
		<div class="header">
			<div class="add-btn enter-btn">
				<a href="./project.php" title="新增频道/分类">新增频道/分类</a>
				<a href="./add.php" title="新增文档">新增文档</a>
			</div>
			<div class="enter-btn">
				<a href="./routes/task/login.php" title="登录">登录</a>
				<a href="./routes/user.php" title="注册">注册</a>
			</div>
		</div>
		<div class="docs">
			<ul> 
				<?php  $_smarty_tpl->tpl_vars['doc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['doc']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['doc']->key => $_smarty_tpl->tpl_vars['doc']->value) {
$_smarty_tpl->tpl_vars['doc']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['doc']->key;
?>
				<li>
					<div class="doc-cell">
						<a href="./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['doc']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['doc']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['doc']->value['title'];?>
</a> 
				    	<a href="./update.php?id=<?php echo $_smarty_tpl->tpl_vars['doc']->value['id'];?>
" title="编辑">编辑</a>
					</div>				     
				</li> 
				<?php } ?>
			</ul>
		</div>
	 
    </body> 
</html> <?php }} ?>
