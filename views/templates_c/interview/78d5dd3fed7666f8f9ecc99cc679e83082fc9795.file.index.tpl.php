<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-06 05:59:49
         compiled from "D:\Program Files (x86)\wamp\www\manage\views\templates\interview\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21507559a1955baa921-43361385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78d5dd3fed7666f8f9ecc99cc679e83082fc9795' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\interview\\index.tpl',
      1 => 1436162366,
      2 => 'file',
    ),
    '77044ada4a03501ffed34185a264886245a6ba49' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\layout.tpl',
      1 => 1436162062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21507559a1955baa921-43361385',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_559a1955c76c77_18034268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559a1955c76c77_18034268')) {function content_559a1955c76c77_18034268($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      	  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
          <link rel="stylesheet" type="text/css" href="/manage/static/css/index.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/nav/nav.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/footer/footer.css"> 
        
		<title>招聘试题</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/common.css">
	     
    </head> 
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/nav/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="banner">
            <img src="/manage/static/images/banner.jpg">
        </div>
        <div class="w980">
            
		<a href="./add.php" title="新增文档">新增</a>	    
	    <div class="document">
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
" title="<?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>
</a> 
					<a class="edit-bt" href="./update.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
" title="编辑">编辑</a>
				</li> 
				<?php } ?>
			</ul>	    	
	    </div>
		
       
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/footer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body> 
</html> <?php }} ?>
