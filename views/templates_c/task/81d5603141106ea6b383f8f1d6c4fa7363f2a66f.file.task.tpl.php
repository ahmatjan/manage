<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-21 03:39:11
         compiled from "D:\wamp\www\manage\views\templates\task\task.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3769555aa76960e316-41006648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81d5603141106ea6b383f8f1d6c4fa7363f2a66f' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\task.tpl',
      1 => 1432178704,
      2 => 'file',
    ),
    'ad904dd1c3664a1417fac7a013d4109ecc60d0b3' => 
    array (
      0 => 'D:\\wamp\\www\\manage\\views\\templates\\task\\layout.tpl',
      1 => 1432176261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3769555aa76960e316-41006648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_555aa76981c1b9_02204755',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555aa76981c1b9_02204755')) {function content_555aa76981c1b9_02204755($_smarty_tpl) {?><!DOCTYPE HTML> 
    <head>    
        
      		<meta http-equiv="Content-type" content="text/html; charset=utf-8">  
      		<link rel="stylesheet" href="../../static/css/reset.css" />
      		<link rel="stylesheet" href="../../static/css/common.css" />
        
		<title></title>
		<?php echo '<script'; ?>
 type="text/javascript" src="../../static/js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../../lhz_table/require.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../../lhz_table/lhz_table.js"><?php echo '</script'; ?>
>
		<link rel="stylesheet" type="text/css" href="../../lhz_table/lhz_table.css" />
		<?php echo '<script'; ?>
>
		$(document).ready(function() {
				var tb = $("#table").lhz_table({
					'getDataUrl': './getData.php?project_id=<?php echo $_GET['project_id'];?>
',
					'updateDataUrl': './tableUPdate.php',
					'searchDataUrl': './tableSearch.php'
				});
		});
		<?php echo '</script'; ?>
>
	     
    </head> 
    <body> 
        
		<div class="w960">
			<?php if (count($_SESSION)!=0&&$_SESSION['username']!='') {?>
				<p>欢迎：
					<?php echo $_SESSION['username'];?>
 <a href="./login.php?action=logout">退出</a>
				</p>
				<?php } else { ?>
					<p><a href="./login.php">登陆</a>&nbsp;<a href="./user.php">注册</a>
					</p>
			<?php }?>
			<a href="./add.php">新增</a>
			<div id="table">loading</div>
		</div>
	 
    </body> 
</html> <?php }} ?>
