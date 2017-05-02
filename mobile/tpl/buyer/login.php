<!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>登录</title>
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
        <script>
        </script>
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
					<input id='account' name="account" type="text" class="mui-input-clear mui-input" placeholder="请输入手机号码" value="{$loginuser}">
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
		<script src="buyerstyle/js/mui.min.js"></script>  
		<script src="buyerstyle/js/jquery.js"></script>
		<script src="buyerstyle/js/func.js"></script>
	</body>
	<script type="text/javascript">
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
	</script>
</html>