<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 09:28:03
         compiled from "D:\wamp\www\manage\views\templates\interview\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2828255473ba3893f38-49691089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90cc3a6424470e3ed00263f0f07946707df92e5f' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\interview\\add.tpl',
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
  'nocache_hash' => '2828255473ba3893f38-49691089',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55473ba3976c03_89861022',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55473ba3976c03_89861022')) {function content_55473ba3976c03_89861022($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8"> 
			
        
		<title>新增试题</title>
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/layout.css">
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/add.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/interview/js/jquery.min.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/interview/js/codemirror.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/interview/js/marked.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/interview/js/add.js"><?php echo '</script'; ?>
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


        
	<div class="title">
		<p><i class="fa fa-plus-square"></i> 新增试题</p>
	</div>
	<div class="content">
		<div class="content-inner">
			<div class="side-right">
				<form action="add.php" method="post">
					<label>标题：</label><input class="text-def" type="text" name="title" />
					<br/>
					<label>TAG ：</label><input class="text-def" type="text" name="tag" />
					<br/>
					<label>详情：</label><textarea name="content" id="content"></textarea>
					<br/>
					<label>答案：</label><textarea name="answer" id="answer"></textarea>
					<br/>
					<input class="btn-def" type="submit" value="提交" />
				</form>
			</div>
			<div class="side-right">
				<iframe src="" id="preview" frameborder="0" height="360"></iframe>

				<iframe src="" id="preview_answer" frameborder="0" height="360">></iframe>
			</div>
		</div>
	</div>
	 
    </body> 
</html> <?php }} ?>
