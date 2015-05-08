<{extends file="layout.tpl"}>
	<{block name="head" append}>
		<title>前端管理平台</title>
		<script>
		//$(document).ready(function(){

		//});
	 </script>
	<{/block}>

	<{block name="content"}>
	<ul>
		<li><a href="./routes/task/" target="_block">任务管理</a></li>
		 <li><a href="./routes/interview/" target="_block">招聘试题</a></li>
	 	 <li><a href="./routes/document/" target="_block">文档管理</a></li>
	  </ul>   
	<{/block}>