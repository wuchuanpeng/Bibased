<?php
/* Smarty version 3.1.31, created on 2017-04-25 09:40:05
  from "D:\wamp\www\Bibased\mobile\tpl\buyer\login.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ff19755a1367_03329370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbacf8f08c56257a09120a07faa5e2b6f397212a' => 
    array (
      0 => 'D:\\wamp\\www\\Bibased\\mobile\\tpl\\buyer\\login.php',
      1 => 1492668112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ff19755a1367_03329370 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>登录</title>
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />

		<style>
			/*.area {
				margin: 20px auto 0px auto;
			}*/
			.mui-input-group {
				margin-top: 10px;
			}
			.mui-input-group:first-child {
				margin-top: 20px;
			}
			.mui-input-group label {
				width: 22%;
			}
			.mui-input-row label~input,
			.mui-input-row label~select,
			.mui-input-row label~textarea {
				width: 78%;
			}
			.mui-content-padded {
				margin-top: 25px;
			}
			.mui-btn {
				padding: 10px;
			}
			.link-area {
				display: block;
				margin-top: 25px;
				text-align:right;
			}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">用户登录</h1>
		</header>
		<div class="mui-content">
			<form id='login-form' action="admin.php" method="post" class="mui-input-group">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account' name="account" type="text" class="mui-input-clear mui-input" placeholder="请输入手机号码" value="<?php echo $_smarty_tpl->tpl_vars['loginuser']->value;?>
">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='login_password' name="login_password" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
				</div>
				<div class="mui-input-row mui-checkbox">
					<label style="width:100%;">我是商家</label>
					<input name="is_seller" value="0" type="checkbox" id="is_seller">
				</div>
			</form>
			<div class="mui-content-padded">
				<button id='login' name="submit" type="button" class="mui-btn mui-btn-block mui-btn-primary">登录</button>
				<div class="link-area"><a id='breg'>注册账号</a></div>
			</div>
		</div>
		<?php echo '<script'; ?>
 src="buyerstyle/js/mui.min.js"><?php echo '</script'; ?>
>  
		<?php echo '<script'; ?>
 src="buyerstyle/js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="buyerstyle/js/func.js"><?php echo '</script'; ?>
>
	</body>
	<?php echo '<script'; ?>
 type="text/javascript">
		mui.ready(function(){
			//点击注册进行页面跳转,跳转到用户注册页面
			document.getElementById("breg").addEventListener("tap",function(){
				 window.location.href="admin.php?controller=index&method=regApply";
			});
			

			//为登录按钮设置监听事件
			document.getElementById("login").addEventListener("tap",function(){
				var checkSeller=document.getElementById('is_seller');
				if(checkSeller.checked){
					sellerlogin();
				}else{
					userlogin();
				}
				
			});
		});
	<?php echo '</script'; ?>
>
</html><?php }
}
