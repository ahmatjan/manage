<!DOCTYPE HTML> 
    <head>    
        <{block name="head"}>
          <meta http-equiv="Content-type" content="text/html; charset=utf-8">  
          <link rel="stylesheet" href="../../static/css/reset.css" />
          <link rel="stylesheet" href="../../static/css/common.css" />
        <{/block}>
    </head> 
    <body>   
    <div class="header">
        <{if $smarty.session|@count neq 0 && $smarty.session.username neq '' }>
        <p>欢迎：
          <{$smarty.session.username}> <a href="./login.php?action=logout">退出</a>
        </p>
        <{else}>
          <p><a href="./login.php">登陆</a>&nbsp;<a href="./user.php">注册</a>
          </p>
      <{/if}>
    </div>

    <div class="w980">
        <{block name="content"}> Default Content<{/block}> 
    </div>
    </body> 
</html> 