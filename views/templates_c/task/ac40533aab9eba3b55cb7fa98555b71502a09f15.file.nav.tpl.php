<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-06 05:56:36
         compiled from "D:\Program Files (x86)\wamp\www\manage\views\templates\widget\nav\nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8507559a1894cdf380-56113336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac40533aab9eba3b55cb7fa98555b71502a09f15' => 
    array (
      0 => 'D:\\Program Files (x86)\\wamp\\www\\manage\\views\\templates\\widget\\nav\\nav.tpl',
      1 => 1436162062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8507559a1894cdf380-56113336',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_559a1894d42fb0_05326667',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559a1894d42fb0_05326667')) {function content_559a1894d42fb0_05326667($_smarty_tpl) {?><div class="top_login">
    <div class="link_login">
        <?php if (count($_SESSION)!=0&&$_SESSION['username']!='') {?>
    <p>欢迎：
      <?php echo $_SESSION['username'];?>
 <a href="/manage/routes/user/login.php?action=logout">退出</a>
    </p>
    <?php } else { ?>
         <ul>
            <li><a href="/manage/routes/user/user.php" title="免费注册">免费注册</a></li>
            <li>|</li>          
            <li><a href="/manage/routes/user/login.php" title="用户登录">用户登录</a></li>
        </ul>
    <?php }?>
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
<?php }} ?>
