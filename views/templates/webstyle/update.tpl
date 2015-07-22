<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>编辑试题</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/interview/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="/manage/static/interview/css/add.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script type="text/javascript" src="/manage/static/interview/js/jquery.min.js"></script> 
		<script type="text/javascript" src="/manage/static/interview/js/codemirror.js"></script> 
		<script type="text/javascript" src="/manage/static/interview/js/marked.js"></script> 
		<script type="text/javascript" src="/manage/static/interview/js/add.js"></script> 
	<{/block}>
	<{block name="content" append}>
		<div class="clearfix">
			<div class="content-inner">
				<div class="side-right">
					<form action="update.php" method="post">
						<input type="hidden" name="id" value="<{$list.id}>" />
						<label>标题：</label><input class="text-def" type="text" name="title" value="<{$list.title}>" />
						<br/>
						<label>TAG ：</label><input class="text-def" type="text" name="tag" value="<{$list.tag}>" />
						<br/>
						<label>详情：</label><textarea name="content" id="content"><{$list.content}></textarea>
						<br/>
						<label>答案：</label><textarea name="answer" id="answer"><{$list.answer}></textarea>
						<br/>
						<input class="btn-def" type="submit" value="提交" />
					</form>
				</div>
				<div class="side-right">
					<iframe src="" id="preview" frameborder="0" height="360"></iframe>

					<iframe src="" id="preview_answer" frameborder="0" height="360">></iframe>
				</div>
			</div>
		</div>
	<{/block}>