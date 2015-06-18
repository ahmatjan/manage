<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title></title>
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../lhz_table/require.js"></script>
		<script type="text/javascript" src="../../lhz_table/lhz_table.js"></script>
		<link rel="stylesheet" type="text/css" href="../../lhz_table/lhz_table.css" />
		<script>
		$(document).ready(function() {
				var tb = $("#myTask").lhz_table({
					'getDataUrl': './getData.php?project_id=<{$smarty.get.project_id}>',
					'updateDataUrl': './tableUPdate.php',
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
						'ifCanEdit':true
					},{
						"field": "progress",
						'name':'进度',
						'ifCanEdit':true
					}, {
						"field": "status",
						'name':'任务状态',
						'ifCanEdit':false
					},  {
						"field": "plan_start_time",
						'name':'计划开始时间',
						'ifCanEdit':true
					}, {
						"field": "plan_end_time",
						'name':'计划结束时间',
						'ifCanEdit':true
					}, {
						"field": "start_time",
						'name':'开始时间',
						'ifCanEdit':true
					}, {
						"field": "end_time",
						'name':'结束时间',
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
		});
		</script>
	<{/block}>
	<{block name="content"}>
		<div class="w960">
			<{if $smarty.session|@count neq 0 && $smarty.session.username neq '' }>
				<p>欢迎：
					<{$smarty.session.username}> <a href="./login.php?action=logout">退出</a>
				</p>
				<{else}>
					<p><a href="./login.php">登陆</a>&nbsp;<a href="./user.php">注册</a>
					</p>
			<{/if}>
			<a href="./taskAdd.php?project_id=<{$smarty.get.project_id}>">新增</a>
			<div id="myTask">loading</div>
		</div>
	<{/block}>