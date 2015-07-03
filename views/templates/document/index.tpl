<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>文档管理</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/document/index.css">
	<{/block}>
	<{block name="content"}>
		<a href="./add.php" title="新增文档">新增文档</a>
		<div class="document">
			<ul> 
				<{foreach from=$list key=key item=doc}>
				<li>
					<a href="./detail.php?id=<{$doc.id}>" title="<{$doc.title}>"><{$doc.title}></a> 
			    	<a class="edit-bt" href="./update.php?id=<{$doc.id}>" title="编辑">编辑</a></li> 
				<{/foreach}>
			</ul>
		</div>			
	<{/block}>