<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>新增试题</title>

		<link rel="stylesheet" type="text/css" href="/manage/static/interview/css/add.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/manage/static/css/codemirror.css">
		<script type="text/javascript" src="/manage/static/js/codemirror.js"></script> 
		<script type="text/javascript" src="../../static/interview/js/add.js"></script> 


		<link rel="stylesheet" type="text/css" href="/manage/static/css/markdown.css">
		<script type="text/javascript" src="/manage/static/js/marked.js"></script> 

	<{/block}>
	<{block name="content" append}>
	<div class="title">
		<p><i class="fa fa-plus-square"></i> 新增试题</p>
	</div>
	<div class="clearfix">
		<div class="content-inner">
			<div class="side-right">
				<form action="add.php" method="post">
					<label>标题：</label><input class="text-def" type="text" name="title" />
					<br/>
					<label>TAG ：</label><input class="text-def" type="text" name="tag" />
					<br/>
					<label>详情：</label><textarea name="content" id="content"></textarea>
					<br/>
					<label>答案：</label><textarea name="answer" id="answer"></textarea>
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