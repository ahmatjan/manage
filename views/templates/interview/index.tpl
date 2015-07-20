<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>招聘试题</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/table/table.css">
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/button/button.css">
	<{/block}>
	
	<{block name="banner"}>
		<{include file="../widget/banner/banner.tpl"}>	
	<{/block}>

	<{block name="content"}>
		<a class="du-button du-button-primary" href="./add.php">新增试题</a>
		<div class="document">
			<table class="du-table du-table-striped">
				<thead>
                    <tr>
                        <th width="90%">标题</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
				<{foreach from=$list key=key item=question}>
			    	<tr>
			    		<td>
			    			<a href="./detail.php?id=<{$question.id}>" title="<{$question.title}>"><{$question.title}></a>
			    		</td>
			    		<td>
			    			<a href="./update.php?id=<{$question.id}>" title="编辑">编辑</a>
			    		</td>
			    	</tr>
				<{/foreach}>
				</tbody>
			</table>
		</div>
      <{/block}>
