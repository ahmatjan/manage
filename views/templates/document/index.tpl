<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<title>文档管理</title>
		<link rel="stylesheet" type="text/css" href="/manage/static/css/index.css">
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/table/table.css">
		<link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/button/button.css">
		<link rel="stylesheet" type="text/css" href="/manage/static/document/index.css">
	<{/block}>
	<{block name="content"}>
		<a class="du-button du-button-primary" href="./add.php">新增文档</a>
		<div class="document">
			<table class="du-table du-table-striped">
				<thead>
                    <tr>
                        <th width="90%">标题</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
				<{foreach from=$list key=key item=doc}>
			    	<tr>
			    		<td>
			    			<a href="./detail.php?id=<{$doc.id}>" title="<{$doc.title}>"><{$doc.title}></a>
			    		</td>
			    		<td>
			    			<a href="./update.php?id=<{$doc.id}>" title="编辑">编辑</a>
			    		</td>
			    	</tr>
				<{/foreach}>
				</tbody>
			</table>
		</div>			
	<{/block}>