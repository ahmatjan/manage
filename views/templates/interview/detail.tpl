<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>试题内容</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/interview/css/detail.css">
	<{/block}>
	<{block name="content"}>
		<div class="examination">
			<div class="document-title">
				<h1><{$list.title}></h1>
			</div>
			<div class="examination-questions">
				<h2>试题内容(<{$list.tag}>)：</h2>
				<{$list.content}>
			</div>
			<div class="question-answer">
				<h2>试题答案：</h2>
				<{$list.answer}>
			</div>
		</div>			
	<{/block}>