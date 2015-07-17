<!DOCTYPE HTML> 
    <head>    
        <{block name="head"}>
      	  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
      	  <link rel="stylesheet" type="text/css" href="/manage/static/css/base.css">
	        <link rel="stylesheet" type="text/css" href="/manage/static/css/reset.css"> 
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
        <div class="slide-main" id="touchMain">
          <a class="prev" href="javascript:;" stat="prev1001"><img src="/manage/static/images/l-btn.png" /></a>
          <div class="slide-box" id="slideContent">
            <div class="slide" id="bgstylec">
              <div class="obj-e"><img src="/manage/static/images/earth-wenzi.png" /></div>
              <div class="obj-f"><img src="/manage/static/images/earth.png" /></div>
            </div>
            <div class="slide" id="bgstylea">
              <div class="obj-a"><img src="/manage/static/images/banner1.jpg" /></div>
            </div>
            <div class="slide" id="bgstyleb">
              <div class="obj-b"><img src="/manage/static/images/fly.png" /></div>
            </div>
          </div>
          <a class="next" href="javascript:;" stat="next1002"><img src="/manage/static/images/r-btn.png" /></a>
          <div class="item">
            <a class="cur" stat="item1001" href="javascript:;"></a>
            <a href="javascript:;" stat="item1002"></a>
            <a href="javascript:;" stat="item1003"></a>
          </div>
        </div>
        <div class="w980">
            <{block name="content"}><{/block}> 
        </div>
        <{include file="../widget/footer/footer.tpl"}>
    </body> 
</html> 