<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-06 13:56:46
         compiled from "D:\Program Files (x86)\wamp\www\manage\views\templates\task\projectAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13745559a189e25deb1-83684817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '807c446d94e01532c3ad4b3ebaa631426e590d8d' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\task\\projectAdd.tpl',
      1 => 1436162062,
      2 => 'file',
    ),
    '77044ada4a03501ffed34185a264886245a6ba49' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\layout.tpl',
      1 => 1436162062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13745559a189e25deb1-83684817',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_559a189e306f77_44943173',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559a189e306f77_44943173')) {function content_559a189e306f77_44943173($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      	  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
          <link rel="stylesheet" type="text/css" href="/manage/static/css/index.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/nav/nav.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/footer/footer.css"> 
        
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
 type="text/javascript" src="../../static/js/jquery.DatePicker.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/add.js"><?php echo '</script'; ?>
> 
	     
    </head> 
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/nav/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="banner">
            <img src="/manage/static/images/banner.jpg">
        </div>
        <div class="w980">
            
		<div class="clearfix">
			<div class="side-right">
				<form action="projectAdd.php" method="post">
					<label>标题</label>：<input type="text" name="title" />
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
		</div>
	 
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/footer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body> 
</html> <?php }} ?>
