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
					"getDataUrl": './getData.php',
					"updateDataUrl": './tableUPdate.php',
					"searchDataUrl": './tableSearch.php',
				});
				//tb.refresh();
			});
		</script>
		<{/block}>

			<{block name="content" }>
				<ul>
					<{foreach from=$list key=key item=question}>
						<li>
							<a href="./routes/detail.php?id=<{$question.id}>">
								<{$question.title}>
							</a> <a href="./routes/update.php?id=<{$question.id}>">编辑</a> <a href="./routes/task.php?id=<{$question.id}>">查看任务</a>
						</li>
						<{/foreach}>
				</ul>
				<a href="./add.php">新增</a>
				<div id="table">loading</div>

				<{/block}>