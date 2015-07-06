<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-06 05:56:36
         compiled from "D:\Program Files (x86)\wamp\www\manage\views\templates\task\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2412559a1894b91499-40702912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75b04eaee6a84ca5c7bd8c6b75efbe05d4dc707d' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\task\\index.tpl',
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
  'nocache_hash' => '2412559a1894b91499-40702912',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_559a1894cb26b7_73048079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559a1894cb26b7_73048079')) {function content_559a1894cb26b7_73048079($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      	  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
          <link rel="stylesheet" type="text/css" href="/manage/static/css/index.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/nav/nav.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/footer/footer.css"> 
        
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
		<link rel="stylesheet" type="text/css" href="../../static/task/index.css" />
		<?php echo '<script'; ?>
>
			$(document).ready(function() {
				var project = $("#projectTable").lhz_table({
					"getDataUrl": './getProjectData.php',
					"updateDataUrl": './projectUpdate.php',
					"getFilterUrl": './data/projectFilter.json',
					"searchDataUrl": './projectSearch.php',
					"getTheadDate": [{
						"field": "id",
						'name':'id',
						'ifCanEdit':false
					}, {
						"field": "title",
						'name':'标题',
						'ifCanEdit':true
					}, {
						"field": "content",
						'name':'内容',
						'ifCanEdit':true
					}, {
						"field": "owner",
						'name':'负责人',
						'ifCanEdit':true
					}, {
						"field": "priority",
						'name':'优先级',
						'ifCanEdit':true
					}, {
						"field": "status",
						'name':'状态',
						'ifCanEdit':false
					}, {
						"field": "hour",
						'name':'人时',
						'ifCanEdit':false
					}, {
						"field": "progress",
						'name':'进度',
						'ifCanEdit':false
					}],
					"callbackOperation": function(type,id){
						if(type == 'tbody'){
							return '<td><a href="./projectEdit.php?id='+id+'">编辑</a> <a href="./task.php?project_id='+id+'">查看任务</a></td>';
						}else{
							return '<td>操作</td>';
						}
					}
				});

				var task = $("#taskTable").lhz_table({
					"getDataUrl": './getData.php',
					'updateDataUrl': './tableUpdate.php',
					"getFilterUrl": './data/taskFilter.json',
					'searchDataUrl': './taskSearch.php',
					"getTheadDate": [{
						"field": "id",
						'name':'id',
						'ifCanEdit':false
					}, {
						"field": "title",
						'name':'标题',
						'ifCanEdit':true
					}, {
						"field": "type",
						'name':'类型',
						'ifCanEdit':true
					}, {
						"field": "priority",
						'name':'等级',
						'ifCanEdit':true
					}, {
						"field": "owner",
						'name':'负责人',
						'ifCanEdit':true
					}, {
						"field": "hour",
						'name':'人时',
						'ifCanEdit':true
					}, {
						"field": "used_hour",
						'name':'已用人时',
						'ifCanEdit':false
					},{
						"field": "progress",
						'name':'进度',
						'ifCanEdit':true
					}, {
						"field": "status",
						'name':'任务状态',
						'ifCanEdit':false
					}, {
						"field": "plan_start_time",
						'name':'计划开始时间',
						'ifCanEdit':true
					}, {
						"field": "plan_end_time",
						'name':'计划结束时间',
						'ifCanEdit':true
					}],
					"callbackOperation": function(type,id){
						if(type == 'tbody'){
							return '<td><a href="./taskEdit.php?id='+id+'">编辑</a> </td>';
						}else{
							return '<td>操作</td>';
						}
					}
				});

                //切换项目、任务表格显示
	            $('.switch a').click(function(){
	            	var t = $(this);
	            	var key = t.attr('data-type');
	            	$("#"+key).show().siblings().hide();
	            });

			});
		<?php echo '</script'; ?>
>
		     
    </head> 
    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/nav/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="banner">
            <img src="/manage/static/images/banner.jpg">
        </div>
        <div class="w980">
            
				<a href="./projectAdd.php">新增项目</a>

				<ul class="switch clearfix">
					<li><a href="#" data-type="projectTable">项目列表</a></li>
					<li><a href="#" data-type="taskTable">任务列表</a></li>
				</ul>
				<div>
					<div id="projectTable">loading</div>
					<div id="taskTable" style="display:none;">loading</div>
				</div>		
		 
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/footer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body> 
</html> <?php }} ?>
