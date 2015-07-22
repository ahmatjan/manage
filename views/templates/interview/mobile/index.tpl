<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title>试题库-首页</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/interview/css/layout.css">
		<link rel="stylesheet" type="text/css" href="/manage/static/interview/css/index.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<{/block}>

	<{block name="content" append}>
		<div class="mainboard">
			<div class="board-inner">
				<div class="board-left">
					<p class="title-index">面试试题库moblie</p>
					<p class="add-btn"><a href="./add.php">新 增</a></p>
				</div>
				<div class="board-right">
					<i class="fa fa-home fa-bdr"></i>
					<!--<em class="board-illustrate"></em>-->
				</div>
			</div>
		</div>

		<div class="boardbelow">
			<div class="boardbelow-inner">
				<i class="fa fa-magic fa-lg fa-bdb"></i>
				<em>现有试题</em>
			</div>
		</div>

		<div class="content-index">
			<div class="content-index-inner">
				<ul> 
					<{foreach from=$list key=key item=question}>
					<li><a class="question" href="./detail.php?id=<{$question.id}>"><{$question.title}></a> 
					<a class="q-edit" href="./update.php?id=<{$question.id}>">编辑</a></li> 
					<{/foreach}>
				</ul>
			</div>
		</div>
<{/block}>
