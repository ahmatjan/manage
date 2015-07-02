<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>文档管理</title>
	<{/block}>
	<{block name="content"}>
			<div class="add-btn enter-btn">
				<a href="./project.php" title="新增频道/分类">新增频道/分类</a>
				<a href="./add.php" title="新增文档">新增文档</a>
			</div>
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
	<{/block}>