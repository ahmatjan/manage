<!DOCTYPE HTML> 
    <head>    
        <{block name="head"}>
      	  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
          <link rel="stylesheet" type="text/css" href="/manage/static/css/index.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/common.css">
          <link rel="stylesheet" type="text/css" href="/manage/static/css/banner.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/nav/nav.css">
          <link rel="stylesheet" type="text/css" href="/manage/views/templates/widget/footer/footer.css"> 
          <script type="text/javascript" src="/manage/static/js/jquery-1.9.1.js"></script>
          <script type="text/javascript" src="/manage/static/js/banner.js"></script>
        <{/block}>     
    </head> 
    <body>
        <{include file="../widget/nav/nav.tpl"}>
        <{block name="banner"}><{/block}> 
        <div class="w980">
            <{block name="content"}><{/block}> 
        </div>
        <{include file="../widget/footer/footer.tpl"}>
    </body> 
</html> 