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
						"field": "priorty",
						'name':'优先级',
						'ifCanEdit':false
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