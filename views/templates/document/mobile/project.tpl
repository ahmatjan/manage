<{extends file="layout.tpl"}>
<{block name="head" append}>
<title>文档管理</title>
<script type="text/javascript" src="../../static/js/jquery.min.js"></script> 
<script type="text/javascript" src="../../views/templates/document/js/project.js"></script> 
<{/block}>
<{block name="content"}>
<p><a href="./routes/task/login.php">登陆</a>&nbsp;<a href="./routes/user.php">注册</a></p>
<br/>
<a href="./add.php">新增文档</a>
<div class="docs">
	<ul> 
		<{foreach from=$list key=key item=project name=foo}>
		<{if $smarty.foreach.foo.index % 2 == 0}>
		<li>
			<a href="./detail.php?id=<{$project.id}>"><{$project.name}></a> 
			<a href="./update.php?id=<{$project.id}>">添加分类</a> 
			
			<{if $project.category|@count neq 0}>
			<ul>
				<{foreach from=$project.category key=key item=category}>
				<li>
					<a href="./detail.php?id=<{$category.id}>"><{$category.name}></a> 
				</li> 
				<{/foreach}>
			</ul>
			<{/if}>
		</li> 
		<{/if}>
		<{/foreach}>
	</ul>
</div>
<{/block}>