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
					'searchDataUrl': './tableSearch.php'
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
			<a href="./add.php">新增</a>
			<div id="table">loading</div>
		</div>
	<{/block}>