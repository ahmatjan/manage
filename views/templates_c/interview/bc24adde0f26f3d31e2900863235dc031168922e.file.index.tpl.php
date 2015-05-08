<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 09:28:01
         compiled from "D:\wamp\www\manage\views\templates\interview\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2959155473ba1ae4bf4-96885272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc24adde0f26f3d31e2900863235dc031168922e' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\interview\\index.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
    'dbd5ba5bbfd2f2a63541372a2da6c74e93d4f6cb' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\interview\\layout.tpl',
      1 => 1425535549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2959155473ba1ae4bf4-96885272',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55473ba1bd39f6_79062607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55473ba1bd39f6_79062607')) {function content_55473ba1bd39f6_79062607($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8"> 
			
        
		<title>试题库-首页</title>
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/layout.css">
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/index.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/interview/js/jquery.min.js"><?php echo '</script'; ?>
> 
	     
    </head> 
    <body> 
         
        <div class="header">
			<div class="header-inner">
				<p class="identity">
					hello, <em>XXX</em>
				</p>
				<p class="search">
					<input type="text">
					<input type="button" value="search">
				</p>
			</div>
			
		</div>


        
		<div class="mainboard">
			<div class="board-inner">
				<div class="board-left">
					<p class="title-index">面试试题库_pc</p>
					<p class="add-btn"><a href="./add.php">新 增</a></p>
				</div>
				<div class="board-right">
					<i class="fa fa-home fa-bdr"></i>
					<!--<em class="board-illustrate"></em>-->
				</div>
			</div>
		</div>

		<div class="boardbelow">
			<div class="boardbelow-inner">
				<i class="fa fa-magic fa-lg fa-bdb"></i>
				<em>现有试题</em>
			</div>
		</div>

		<div class="content-index">
			<div class="content-index-inner">
				<ul> 
					<?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['question']->key;
?>
					<li><a class="question" href="./detail.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>
</a> 
					<a class="q-edit" href="./update.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">编辑</a></li> 
					<?php } ?>
				</ul>
			</div>
		</div>
 
    </body> 
</html> <?php }} ?>
