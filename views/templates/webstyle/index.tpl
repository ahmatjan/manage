<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>招聘试题</title>
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/table/table.css">
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/button/button.css">
		<link rel="stylesheet" type="text/css" href="../../static/webstyle/css/index.css">
		<link rel="stylesheet" type="text/css" href="../../static/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/css/eclipse.css">
		
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../static/js/loadElement.js"></script>
		<script type="text/javascript" src="../../static/js/codemirror.js"></script> 
	    <script type="text/javascript" src="/manage/static/webstyle/js/index.js"></script>
	<{/block}>

	<{block name="banner"}>
		<{include file="../widget/banner/banner.tpl"}>	
	<{/block}>
	
	<{block name="content"}>
    	<ul>
			<{foreach from=$list key=key item=module}>
	    		<li>
	    			<a href="./detail.php?id=<{$module.id}>" title="<{$module.title}>"><{$module.title}></a>
	    		</li>

		    	<{foreach from=$module.html key=key item=html}>
		    		<p>
		    			html:<a href="./detail.php?id=<{$html.id}>" title="<{$html.title}>"><{$html.title}></a>
		    			<textarea><{$html.content}></textarea>
		    		</p>
				<{/foreach}>

		    	<{foreach from=$module.css key=key item=css}>
		    		<p>
		    			css:<a href="./detail.php?id=<{$css.id}>" title="<{$css.title}>"><{$css.title}></a>
		    			<textarea><{$css.content}></textarea>
		    		</p>
				<{/foreach}>

		    	<{foreach from=$module.js key=key item=js}>
		    		<p>
		    			js:<a href="./detail.php?id=<{$js.id}>" title="<{$js.title}>"><{$js.title}></a>
		    			<textarea><{$js.content}></textarea>
		    		</p>
				<{/foreach}>
			<{/foreach}>
    	</ul>

	    <a class="du-button du-button-primary" id="show-module-form" href="javascript:;" data-type="html">新增模块</a>
		<a class="du-button du-button-primary show-code-form" href="javascript:;" data-type="css">新增公用css</a>
		<a class="du-button du-button-primary show-code-form" href="javascript:;" data-type="js">新增公用js</a>

		<div class="coding-box">

		</div>

		<div class="add-module-form" style="display:block;">
	        名称：<input type="text" name="module_title" value="" />
	        <br/>
	        <textarea name="module_content" class="todo-content no-border" placeholder="描述" ></textarea>

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
		        <a class="du-button du-button-primary to-code-save" href="javascript:;">保存</a>
	            <a href="javascript:;"  class="cancel" class="btn-cancel-todo">取消</a>
		    </div>
	    </div>

		<script type="text/template" id="tpl-code-form">
			<div class="add-code-form">
		        <div class="form-body">
		            名称：<input type="text" name="code_title" value="" />
		            <br/>
		            <textarea name="code_content" class="todo-content no-border" placeholder="输入代码" ></textarea>
		        </div>
		        <div class="buttons create-buttons">
    		        <input type="hidden" name="code_type" value="" />
		            <a href="javascript:;"  class="submit" class="btn-cancel-todo">提交</a>
		            <a href="javascript:;"  class="create_file" class="btn-cancel-todo">生成文件</a>
		            <a href="javascript:;"  class="cancel" class="btn-cancel-todo">取消</a>
		        </div>
			</div>
		</script>

      <{/block}>
