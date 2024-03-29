<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title><{$title}></title>
		<link rel="stylesheet" type="text/css" href="/manage/static/css/markdown.css">
		<script type="text/javascript" src="/manage/static/js/marked.js"></script> 
		<script type="text/javascript">
			$(function() {
				  (function() {
				    $("#content").html(marked($("#content").html()));
				  })();
				  })
	  		</script>
		<{/block}>
	<{block name="content"}>
			<h1><{$list.title}></h1>
			<div id="content"><{$list.content}></div>
	<{/block}>