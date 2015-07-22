<{extends file="../layout.tpl"}>
	<{block name="head" append}>
		<title><{$title}></title>
		<link rel="stylesheet" type="text/css" href="/manage/static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="/manage/static/css/add.css">
		<script type="text/javascript" src="/manage/static/js/codemirror.js"></script> 
		<script type="text/javascript" src="/manage/static/js/marked.js"></script> 
		<script type="text/javascript" src="/manage/static/js/jquery.DatePicker.js"></script> 
		<script type="text/javascript" src="/manage/static/js/add.js"></script> 
	<{/block}>
	<{block name="content"}>
		<div class="clearfix">
			<div class="side-right">
				<form action="projectAdd.php" method="post">
					<label>标题</label>：<input type="text" name="title" />
					<br/>
					<label>等级</label>：
					<select name="priority">
					 <option value="P0">P0</option>
					 <option value="P1">P1</option>
					 <option value="P2" selected="selected">P2</option>
					 <option value="P3">P3</option>
					</select>
					<br/>
					<label>计划完成时间</label>：
					<input type="text" name="plan_end_time" id="plan_end_time" />
					<br/>
					<label>详情</label>：<textarea name="content" id="content"></textarea>
					<br/>
					<input type="submit" value="提交" />
				</form>
			</div>
			<div class="side-right">
				<iframe src="" id="preview" frameborder="0" height="360"></iframe>
			</div>
		</div>
	<{/block}>