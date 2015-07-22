<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>招聘试题</title>
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/table/table.css">
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/button/button.css">
		<link rel="stylesheet" type="text/css" href="/manage/static/webstyle/css/index.css">
		<link rel="stylesheet" type="text/css" href="/manage/static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="/manage/static/css/eclipse.css">
		<script type="text/javascript" src="/manage/static/js/loadElement.js"></script>
		<script type="text/javascript" src="/manage/static/js/codemirror.js"></script> 
	    <script type="text/javascript" src="/manage/static/webstyle/js/index.js"></script>
	<{/block}>

	<{block name="banner"}>
		<{include file="../widget/banner/banner.tpl"}>	
	<{/block}>
	
	<{block name="content"}>
	<div class="w1200">
    	<div id="showbox">
			<{foreach from=$list key=key item=module}>
	    		<p><a href="./detail.php?id=<{$module.id}>" title="<{$module.title}>"><{$module.title}></a></p>
	    		<div class="clearfix">
		    		<div class="left-module">
				    	<{foreach from=$module.html key=key item=html}>
				    		<p>
				    			html:<a href="./detail.php?id=<{$html.id}>" title="<{$html.title}>"><{$html.title}></a>
				    			<textarea class="mirrorShow"><{$html.content}></textarea>
				    		</p>
						<{/foreach}>
				    	<{foreach from=$module.css key=key item=css}>
				    		<p>
				    			css:<a href="./detail.php?id=<{$css.id}>" title="<{$css.title}>"><{$css.title}></a>
				    			<textarea class="mirrorShow"><{$css.content}></textarea>
				    		</p>
						<{/foreach}>
	    			</div>
	    			<div class="left-module">
				    	<{foreach from=$module.js key=key item=js}>
				    		<p>
				    			js:<a href="./detail.php?id=<{$js.id}>" title="<{$js.title}>"><{$js.title}></a>
				    			<textarea class="mirrorShow"><{$js.content}></textarea>
				    		</p>
						<{/foreach}>
	    			</div>
    			</div>
			<{/foreach}>
    	</div>

	    <a class="du-button du-button-primary" id="show-module-form" href="javascript:;" data-type="html">新增模块</a>
		<a class="du-button du-button-primary show-code-form" href="javascript:;" data-type="css">新增公用css</a>
		<a class="du-button du-button-primary show-code-form" href="javascript:;" data-type="js">新增公用js</a>

		<div class="coding-box">

		</div>
		<div class="add-module-form" style="display:none;">
	        名称：<input type="text" name="module_title" value="" />
	        <br/>
	        <br/>
            描述: <textarea name="module_content" class="todo-content no-border" placeholder="描述" ></textarea>
            <ul class="f-left clearfix" id="public-file">
		    	<{foreach from=$listPublic key=key item=public}>
		    		<li>
    			<input type="checkbox" data_file_path="<{$public.file_path}>" data_type="<{$public.type}>" value="<{$public.id}>" /><{$public.type}>:<{$public.title}>
		    		</li>
				<{/foreach}>
			</ul>

			<div class="module-preview clearfix">
				<div class="left-module">
					html:<textarea id="module-html"></textarea>
					css:<textarea id="module-css"></textarea>
				</div>
				<div class="right-module">
					js:<textarea id="module-js"></textarea>
					<div class="preview-box">
						<iframe id="preview" src="" width="600px" frameborder="0"></iframe>
					</div>
				</div>
		    </div>
			<div class="buttons create-buttons">
				<br/>
		        <a href="javascript:;" class="du-button du-button-primary to-code-save" >保存</a>
	            <a href="javascript:;" class="du-button cancel">取消</a>
		    </div>
	    </div>

		<script type="text/template" id="tpl-code-form">
			<div class="add-code-form">
				<form action="add.php" method="post" enctype="multipart/form-data">
					<label>文件名称:</label> <input type="text" name="code_title" placeholder="必须英文" value="" />
					<br />
					<br />
					<label for="file">选择文件:</label> <input type="file" name="file" id="file" /> 
					<br />
					<br />
					<input type="hidden" name="category" value="code" />
					<input type="hidden" name="code_type" value="" />
					<input type="submit" name="submit" class="du-button du-button-primary" value="Submit" />
					<a href="javascript:;"  class="du-button cancel">取消</a>
				</form>
			</div>
		</script>
	  </div>
    <{/block}>
