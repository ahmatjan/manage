<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title>文档管理</title>
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../static/document/css/style.css"> 
		<link rel="stylesheet" type="text/css" href="../../static/document/css/document-index.css"> 
	<{/block}>
	<{block name="content"}>
		<div class="header">
			<div class="add-btn enter-btn">
				<a href="./project.php" title="新增频道/分类">新增频道/分类</a>
				<a href="./add.php" title="新增文档">新增文档</a>
			</div>
			<div class="enter-btn">
				<a href="./routes/task/login.php" title="登录">登录</a>
				<a href="./routes/user.php" title="注册">注册</a>
			</div>
		</div>
		<div class="docs">
			<ul> 
				<{foreach from=$list key=key item=doc}>
				<li>
					<div class="doc-cell">
						<a href="./detail.php?id=<{$doc.id}>" title="<{$doc.title}>"><{$doc.title}></a> 
				    	<a href="./update.php?id=<{$doc.id}>" title="编辑">编辑</a>
					</div>				     
				</li> 
				<{/foreach}>
			</ul>
		</div>
	<{/block}>