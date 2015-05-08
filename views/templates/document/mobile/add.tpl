<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title><{$title}></title>
		<link rel="stylesheet" type="text/css" href="../../static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/document/add.css">
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script> 
		<script type="text/javascript" src="../../static/js/codemirror.js"></script> 
		<script type="text/javascript" src="../../static/js/marked.js"></script> 
		<script type="text/javascript" src="../../views/templates/document/js/add.js"></script> 
	<{/block}>
	<{block name="content"}>
		<div class="side-right">
			<form action="add.php" method="post">
				<label>标题</label>：<input type="text" name="title" />
				<br/>
				<label>请选择</label>：
				<select name="project_id" id="project_id">
					<option value="0"> 请选择</option>
					<{foreach from=$categorys key=key item=category}>
						<option value="<{$category.id}>"><{$category.name}></option>
					<{/foreach}>
				</select>
				<span id="cate_box"></span>
				<br/>
				<label>详情</label>：<textarea name="content" id="code"></textarea>
				<br/>
				<input type="submit" value="提交" />
			</form>
		</div>
		<div class="side-right">
			<iframe src="" id="preview" frameborder="0" height="360"></iframe>
		</div>
	<{/block}>