<!DOCTYPE HTML> 
    <head>    
        <{block name="head"}>
      	  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/nav/nav.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/footer/footer.css"> 
        <{/block}>     
    </head> 
    <body>
        <{include file="../widget/nav/nav.tpl"}>
        <div class="banner">
            <img src="/manage/static/images/banner.jpg">
        </div>
        <div class="w980">
            <{block name="content"}><{/block}> 
        </div>
        <{include file="../widget/footer/footer.tpl"}>
    </body> 
</html> 