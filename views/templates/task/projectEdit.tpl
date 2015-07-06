<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title><{$title}></title>
		<link rel="stylesheet" type="text/css" href="../../static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/css/add.css">
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script> 
		<script type="text/javascript" src="../../static/js/codemirror.js"></script> 
		<script type="text/javascript" src="../../static/js/marked.js"></script> 
		<script type="text/javascript" src="../../static/js/add.js"></script> 
	<{/block}>
	<{block name="content"}>
		<div class="w960">
			<div class="side-right">
				<form action="projectEdit.php" method="post">
					<input type="hidden" name="id" value="<{$list.id}>" />
					<label>标题</label>：<input type="text" name="title" value="<{$list.title}>" />
					<br/>
					<br/>
					<label>详情</label>：<textarea name="content" id="content"><{$list.content}></textarea>
					<br/>
					<input type="submit" value="提交" />
				</form>
			</div>
			<div class="side-right">
				<iframe src="" id="preview" frameborder="0" height="360"></iframe>
			</div>
		</div>
	<{/block}>