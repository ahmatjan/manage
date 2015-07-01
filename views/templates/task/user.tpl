<{extends file="../layout.tpl"}>
	<{block name="head" append}>
		<title<{$title}></title>
		<link rel="stylesheet" type="text/css" href="../../static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/css/add.css">
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script> 
		<script type="text/javascript" src="../../static/js/codemirror.js"></script> 
		<script type="text/javascript" src="../../static/js/marked.js"></script> 
		<script type="text/javascript">
			$(function() {

				  })
	  		</script>
		<{/block}>
	<{block name="content"}>
		<div>
		<form action="user.php" method="post">
			<label>名字：</label><input type="text" name="name">
			<label>密码：</label><input type="text" name="password">
			<input type="submit" value="注册">
		</form>
		</div>
	<{/block}>