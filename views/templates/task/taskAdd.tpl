<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title><{$title}></title>
		<link rel="stylesheet" type="text/css" href="../../static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/css/add.css">
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script> 
		<script type="text/javascript" src="../../static/js/codemirror.js"></script> 
		<script type="text/javascript" src="../../static/js/marked.js"></script> 
		<script type="text/javascript" src="../../static/js/jquery.DatePicker.js"></script> 
		<script type="text/javascript" src="../../static/js/add.js"></script> 
	<{/block}>
	<{block name="content"}>
	<div class="clearfix">
		<div class="side-right">
			<form action="taskAdd.php" method="post">
				<label>标题</label>：<input type="text" name="title" />
				<br/>
				<label>类型</label>：
				<select name="type">
				 <option value="requirement" selected="selected">需求</option>
				 <option value="bug">BUG</option>
				</select>	
				<br/>
				<label>完成时间</label>：
				<input type="text" name="end_time" id="picker_endtime" />
				<br/>
				<label>等级</label>：
				<select name="priority">
					 <option value="P0">P0</option>
					 <option value="P1">P1</option>
					 <option value="P2" selected="selected">P2</option>
					 <option value="P3">P3</option>
				</select>	
				<br/>
				<label>人时</label>：<input type="text" name="hour" />
				<br/>
				<label>详情</label>：<textarea name="content" id="content"></textarea>
				<br/>
				<input type="hidden" name="project_id" value="<{$smarty.get.project_id}>" />
				<input type="submit" value="提交" />
			</form>
		</div>
		<div class="side-right">
			<iframe src="" id="preview" frameborder="0" height="360"></iframe>
		</div>
	 </div>
	<{/block}>