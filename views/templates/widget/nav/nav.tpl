<div class="top_login">
    <div class="link_login">
        <{if $smarty.session|@count neq 0 && $smarty.session.username neq '' }>
    <p>欢迎：
      <{$smarty.session.username}> <a href="/manage/routes/user/login.php?action=logout">退出</a>
    </p>
    <{else}>
         <ul>
            <li><a href="/manage/routes/user/user.php" title="免费注册">免费注册</a></li>
            <li>|</li>          
            <li><a href="/manage/routes/user/login.php" title="用户登录">用户登录</a></li>
        </ul>
    <{/if}>
    </div>
</div>
<div class="top_menu">
    <div class="link_menu">
        <a href="/manage/" class="logo" title="前端管理系统"><img src="/manage/views/templates/widget/nav/images/logo.png"></a>          
        <div class="menu_list"><ul class="menu-ul">
            <li><a href="/manage/routes/task/" title="任务管理">任务管理</a></li>
            <li><a href="/manage/routes/document/" title="文档管理">文档管理</a></li>
            <li><a href="#" title="模块管理">模块管理</a></li>
            <li><a href="#" title="UI框架">UI框架</a></li>
            <li><a href="#" title="控件管理">控件管理</a></li>
            <li><a href="/manage/routes/interview/" title="招聘试题">招聘试题</a></li>
            <li><a href="#" title="个人中心" target="_blank">个人中心</a></li>
        </ul></div>         
    </div>
</div>
