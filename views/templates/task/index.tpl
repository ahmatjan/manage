<{extends file="layout.tpl" }>
	<{block name="head" append}>
		<title>任务</title>
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../lhz_table/require.js"></script>
		<script type="text/javascript" src="../../lhz_table/lhz_table.js"></script>
		<link rel="stylesheet" type="text/css" href="../../lhz_table/lhz_table.css" />
		<script>
			$(document).ready(function() {
				var tb = $("#table").lhz_table({
					"getDataUrl": './getProjectData.php',
					"updateDataUrl": './tableUPdate.php',
					"getFilterUrl": './data/projectFilter.json',
					"searchDataUrl": './projectSearch.php',
					"getTheadDate": [{
						"id": "id"
					}, {
						"title": "标题"
					}, {
						"content": "内容"
					}, {
						"owner": "负责人"
					}, {
						"priorty": "优先级"
					}, {
						"status": "状态"
					}, {
						"hour": "人时"
					}, {
						"progress": "进度"
					}]
				});
			});
		</script>
		<{/block}>
			<{block name="content" }>
				<div class="w960">
					<ul>
						<{foreach from=$list key=key item=question}>
							<li>
								<a href="./detail.php?id=<{$question.id}>">
									<{$question.title}>
								</a> <a href="./update.php?id=<{$question.id}>">编辑</a> <a href="./task.php?project_id=<{$question.id}>">查看任务</a>
							</li>
							<{/foreach}>
					</ul>
					<a href="./projectAdd.php">新增项目</a>
					<div id="table">loading</div>
				</div>

				<{/block}>