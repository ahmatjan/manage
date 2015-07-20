<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>试题内容</title>
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/codemirror.css">
		<link rel="stylesheet" type="text/css" href="../../static/interview/css/detail.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script type="text/javascript" src="../../static/interview/js/jquery.min.js"></script> 
		<script type="text/javascript" src="../../static/interview/js/codemirror.js"></script> 
		<script type="text/javascript" src="../../static/interview/js/marked.js"></script> 
		<script type="text/javascript">
			$(function() {
				  //(function() {
				    $("#content").html(marked($("#content").html()));
				    $("#answer").html(marked($("#answer").html()));
				  //})();
				  })
	  	</script>
		<{/block}>
	<{block name="content" append}>
		<div class="title">
			<p><i class="fa fa-file-text"></i> 试题内容</p>
		</div>
		<div class="content">
			<div class="content-inner-detail">
				
					<div class="detail-item">标题</div>
					<label><{$list.title}></label>
					<div class="detail-item">TAG</div>
					<label><{$list.tag}></label>
					<div class="detail-item">详情</div>
					<label id="content"><{$list.content}></label>
					<div class="detail-item">答案</div>
					<label id="answer"> <{$list.answer}></label>
				
			</div>
		</div>

	<{/block}>