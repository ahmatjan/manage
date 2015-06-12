<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title></title>
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../lhz_table/require.js"></script>
		<script type="text/javascript" src="../../lhz_table/lhz_table.js"></script>
		<link rel="stylesheet" type="text/css" href="../../lhz_table/lhz_table.css" />
		<script>
		$(document).ready(function() {
				var tb = $("#table").lhz_table({
					'getDataUrl': './getData.php?project_id=<{$smarty.get.project_id}>',
					'updateDataUrl': './tableUPdate.php',
					"getFilterUrl": './data/taskFilter.json',
					'searchDataUrl': './taskSearch.php',
					"getTheadDate": [{
						"id": "id"
					}, {
						"title": "标题"
					}, {
						"type": "类型"
					}, {
						"priority": "等级"
					}, {
						"owner": "负责人"
					}, {
						"hour": "人时"
					}, {
						"used_hour": "已用人时"
					}, {
						"progress": "进度"
					}, {
						"status": "状态"
					}, {
						"add_time": "添加时间"
					}, {
						"plan_start_time": "计划开始时间"
					}, {
						"plan_end_time": "计划结束时间"
					}, {
						"start_time": "开始时间"
					}, {
						"end_time": "结束时间"
					}]
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
			<div id="table">loading</div>
		</div>
	<{/block}>