<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title><{$title}></title>
		<link rel="stylesheet" type="text/css" href="../../static/document/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/document/markdown.css">
		<link rel="stylesheet" type="text/css" href="../../static/document/detail.css">
		<script type="text/javascript" src="../../static/js/jquery.min.js"></script> 
		<script type="text/javascript" src="../../static/js/codemirror.js"></script> 
		<script type="text/javascript" src="../../static/js/marked.js"></script> 
		<script type="text/javascript">
			$(function() {
				  (function() {
				    $("#content").html(marked($("#content").html()));
				  })();
				  })
	  		</script>
		<{/block}>
	<{block name="content"}>
		<div class="wrap">
			<h1><{$list.title}></h1>
			<div id="content"><{$list.content}></div>
		</div>
	<{/block}>