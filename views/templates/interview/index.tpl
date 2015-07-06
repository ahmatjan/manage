<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>招聘试题</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/common.css">
	<{/block}>
	<{block name="content"}>
		<a href="./add.php" title="新增文档">新增</a>	    
	    <div class="document">
	    	<ul> 
				<{foreach from=$list key=key item=question}>
				<li>
					<a href="./detail.php?id=<{$question.id}>" title="<{$question.title}>"><{$question.title}></a> 
					<a class="edit-bt" href="./update.php?id=<{$question.id}>" title="编辑">编辑</a>
				</li> 
				<{/foreach}>
			</ul>	    	
	    </div>
		
      <{/block}>
