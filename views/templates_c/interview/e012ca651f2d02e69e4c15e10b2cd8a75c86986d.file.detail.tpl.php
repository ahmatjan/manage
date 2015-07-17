<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-17 06:45:37
         compiled from "D:\Program Files (x86)\wamp\www\manage\views\templates\interview\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50055a46c9e1dd3c8-89132696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e012ca651f2d02e69e4c15e10b2cd8a75c86986d' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\interview\\detail.tpl',
      1 => 1436778424,
      2 => 'file',
    ),
    '77044ada4a03501ffed34185a264886245a6ba49' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\layout.tpl',
      1 => 1437115505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50055a46c9e1dd3c8-89132696',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55a46c9e296116_67487882',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a46c9e296116_67487882')) {function content_55a46c9e296116_67487882($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      	  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
          <link rel="stylesheet" type="text/css" href="/manage/static/css/banner.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/nav/nav.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/footer/footer.css"> 
          <?php echo '<script'; ?>
 type="text/javascript" src="/manage/static/js/jquery-1.9.1.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 type="text/javascript" src="/manage/static/js/banner.js"><?php echo '</script'; ?>
>
        
		<title>试题内容</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/interview/css/detail.css">
	     
    </head> 
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/nav/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="slide-main" id="touchMain">
          <a class="prev" href="javascript:;" stat="prev1001"><img src="/manage/static/images/l-btn.png" /></a>
          <div class="slide-box" id="slideContent">
            <div class="slide" id="bgstylec">
              <div class="obj-e"><img src="/manage/static/images/earth-wenzi.png" /></div>
              <div class="obj-f"><img src="/manage/static/images/earth.png" /></div>
            </div>
            <div class="slide" id="bgstylea">
              <div class="obj-a"><img src="/manage/static/images/banner1.jpg" /></div>
            </div>
            <div class="slide" id="bgstyleb">
              <div class="obj-b"><img src="/manage/static/images/fly.png" /></div>
            </div>
          </div>
          <a class="next" href="javascript:;" stat="next1002"><img src="/manage/static/images/r-btn.png" /></a>
          <div class="item">
            <a class="cur" stat="item1001" href="javascript:;"></a>
            <a href="javascript:;" stat="item1002"></a>
            <a href="javascript:;" stat="item1003"></a>
          </div>
        </div>
        <div class="w980">
            
		<div class="examination">
			<div class="document-title">
				<h1><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</h1>
			</div> 

			<div class="examination-questions">
				<h2>试题内容(<?php echo $_smarty_tpl->tpl_vars['list']->value['tag'];?>
)：</h2>
				<?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>

			</div>
			
			<div class="question-answer">
				<h2>试题答案：</h2>
				<?php echo $_smarty_tpl->tpl_vars['list']->value['answer'];?>

			</div>
		</div>			
	 
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/footer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body> 
</html> <?php }} ?>
