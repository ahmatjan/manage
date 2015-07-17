<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-17 06:45:34
         compiled from "D:\Program Files (x86)\wamp\www\manage\views\templates\task\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52655a8a4531694e0-95313276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75b04eaee6a84ca5c7bd8c6b75efbe05d4dc707d' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\task\\index.tpl',
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
  'nocache_hash' => '52655a8a4531694e0-95313276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55a8a453200ae2_33938229',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a8a453200ae2_33938229')) {function content_55a8a453200ae2_33938229($_smarty_tpl) {?><!DOCTYPE HTML> 
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

                //跳转发送邮件页面
	            $('#sendMail').click(function(){
	              var parameterArr = new Array();
                   $('.lhz-tb :checkbox:checked').each(function(){
                   		parameterArr.push($(this).val());
                   });
                   var parameters = parameterArr.join(",");  
					console.log(parameters);
	            	window.open('./emailSHow.php?ids='+parameters);
	            });

			});
		<?php echo '</script'; ?>
>
		     
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
            
				<a href="./projectAdd.php">新增项目</a>
				<ul class="switch clearfix">
					<li style="font-size:20px"><a href="#" data-type="projectTable">项目列表</a></li>
					<li><a href="#" data-type="taskTable">任务列表</a></li>
					<li><a href="#" id="sendMail">发送邮件</a></li>
				</ul>
				<div>
					<div id="projectTable">loading</div>
					<div id="taskTable" style="display:none;">loading</div>
				</div>		
		 
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("../widget/footer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body> 
</html> <?php }} ?>
