<!DOCTYPE HTML> 
    <head>    
        <{block name="head"}>
        <title>前端管理平台</title>
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	    <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
            <link rel="stylesheet" type="text/css" href="/manage/static/css/index.css">
	      <link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
            <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/nav/nav.css">
            <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/footer/footer.css"> 
        <{/block}>     
    </head> 
    <body>
        <{include file="./widget/nav/nav.tpl"}>
        <div class="banner">
            <img src="/manage/static/images/banner.jpg">
        </div>
        <div class="w980">
            	<div class="doc_list">
					<div class="doc_cell cell_first">
						<div class="cell_cont clearfix">
							<h1>任务管理</h1>
							<p>项目、任务拆分管理，进度跟踪，问题发现记录，整理出项目总结，整理生成周报。</p>
							<a href="./routes/task/" title="立即查看">立即查看</a>
						</div>
					</div>
					<div class="doc_cell cell_second">
						<div class="cell_cont clearfix">
							<h1>招聘试题</h1>
							<p>收集能检验出候选人技术水平的面试试题，安装难易程度分等级，便于运用于一面、二面。</p>
							<a href="./routes/interview/" title="立即查看">立即查看</a>
						</div>
					</div>
					<div class="doc_cell cell_third">
						<div class="cell_cont clearfix">
							<h1>文档管理</h1>
							<p>业务接口整理记录，功能逻辑思路记录。</p>
							<a href="./routes/document/" title="立即查看">立即查看</a>
						</div>
					</div>
				</div>
        </div>
         <{include file="./widget/footer/footer.tpl"}>
    </body> 
</html> 
