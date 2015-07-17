<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-17 06:51:13
         compiled from "D:\Program Files (x86)\wamp\www\manage\views\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1900855a46c98ae2b79-29441101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e27638570ab368c794bad3c3c0539d0eb3d08050' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\index.tpl',
      1 => 1437115870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1900855a46c98ae2b79-29441101',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55a46c98b4eeb2_10614924',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a46c98b4eeb2_10614924')) {function content_55a46c98b4eeb2_10614924($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
        <title>前端管理平台</title>
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	    <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	    	<link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
            <link rel="stylesheet" type="text/css" href="/manage/static/css/index.css">
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
             
    </head> 
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("./widget/nav/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
            	<div class="doc_list">
					<div class="doc_cell cell_first">
						<div class="cell_cont clearfix">
							<h1>任务管理</h1>
							<p>项目、任务拆分管理，进度跟踪，问题发现记录，整理出项目总结，整理生成周报。</p>
							<a href="./routes/task/" title="立即查看">立即查看</a>
						</div>
					</div>
					<div class="doc_cell cell_second">
						<div class="cell_cont clearfix">
							<h1>招聘试题</h1>
							<p>收集能检验出候选人技术水平的面试试题，按照难易程度分等级，便于运用于一面、二面。</p>
							<a href="./routes/interview/" title="立即查看">立即查看</a>
						</div>
					</div>
					<div class="doc_cell cell_third">
						<div class="cell_cont clearfix">
							<h1>文档管理</h1>
							<p>业务接口整理记录，功能逻辑思路记录。</p>
							<a href="./routes/document/" title="立即查看">立即查看</a>
						</div>
					</div>
				</div>
        </div>
         <?php echo $_smarty_tpl->getSubTemplate ("./widget/footer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body> 
</html> 
<?php }} ?>
