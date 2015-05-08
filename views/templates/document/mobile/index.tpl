<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title>文档管理</title>
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script> 
	<{/block}>
	<{block name="content"}>
		    <p><a href="./routes/task/login.php">登陆</a>&nbsp;<a href="./routes/user.php">注册</a></p>
		    <a href="./project.php">新增频道/分类</a>
		    <br/>
			<a href="./add.php">新增文档</a>

			<div class="docs">
				<ul> 
					<{foreach from=$list key=key item=doc}>
					<li>
					    <a href="./detail.php?id=<{$doc.id}>"><{$doc.title}></a> 
					    <a href="./update.php?id=<{$doc.id}>">编辑</a> 
					</li> 
					<{/foreach}>
				</ul>
			</div>
	<{/block}>