<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>试题库-首页</title>
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/layout.css">
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/index.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script type="text/javascript" src="../../static/interview/js/jquery.min.js"></script> 
	<{/block}>
	<{block name="content"}>
	    <a href="./add.php" title="新增文档">新增</a>
		<ul> 
			<{foreach from=$list key=key item=question}>
			<li><a href="./detail.php?id=<{$question.id}>"><{$question.title}></a> 
			<a href="./update.php?id=<{$question.id}>">编辑</a></li> 
			<{/foreach}>
		</ul>
      <{/block}>
