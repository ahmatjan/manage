<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>任务</title>
		<script type="text/javascript" src="/manage/static/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../lhz_table/require.js"></script>
		<script type="text/javascript" src="../../lhz_table/lhz_table.js"></script>
		<link rel="stylesheet" type="text/css" href="../../lhz_table/lhz_table.css" />
		<link rel="stylesheet" type="text/css" href="/manage/static/task/index.css" />
		<script>
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
		</script>
		<{/block}>

		<{block name="banner" }>
 			<{include file="../widget/banner/banner.tpl"}>	
		<{/block}>

		<{block name="content" }>
				<a href="./projectAdd.php" class="du-button du-button-primary">新增项目</a>
				<ul class="switch clearfix">
					<li style="font-size:20px"><a href="#" data-type="projectTable">项目列表</a></li>
					<li><a href="#" data-type="taskTable">任务列表</a></li>
					<li><a href="#" id="sendMail">发送邮件</a></li>
				</ul>
				<div>
					<div id="projectTable">loading</div>
					<div id="taskTable" style="display:none;">loading</div>
				</div>		
		<{/block}>