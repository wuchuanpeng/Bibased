<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html class="ui-page-login">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>注册</title>
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<style>
			.area {
				margin: 20px auto 0px auto;
			}
			.mui-input-group:first-child {
				margin-top: 20px;
			}
			.mui-input-group label {
				font-size: 15px;
				width: 30%;
			}
			.mui-input-row label~input,
			.mui-input-row label~select,
			.mui-input-row label~textarea {
				font-size: 15px;
				width: 70%;
			}
			.mui-checkbox input[type=checkbox],
			.mui-radio input[type=radio] {
				top: 6px;
			}
			.mui-content-padded {
				margin-top: 25px;
			}
			.mui-btn {
				padding: 10px;
			}
			
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">用户注册</h1>
		</header>
		<div class="mui-content">
			<form class="mui-input-group">
				<div class="mui-input-row">
					<label>昵称</label>
					<input id='bname' type="text" name="bname" class="mui-input-clear mui-input" placeholder="请输入昵称" value="">
				</div>
				<div class="mui-input-row">
					<label>性别</label>
					<input id="bsex" type="text" name="bsex" class="mui-input-clear mui-input" placeholder="请输入性别"/>
				</div>
				<div class="mui-input-row">
					<label>密码<span style="color: #f00;width: 10px;">*</span></label>
					<input id='bpassword' name="bpassword" type="password" class="mui-input-clear mui-input" placeholder="请输入密码,6-16位,首位为字母" value="">
				</div>
				<div class="mui-input-row">
					<label>确认密码<span style="color: #f00;width: 10px;">*</span></label>
					<input id='bpassword_confirm' name="bpassword_confirm" type="password" class="mui-input-clear mui-input" placeholder="请确认密码" value="">
				</div>
				<div class="mui-input-row">
					<label>手机号码<span style="color: #f00;width: 10px;">*</span></label>
					<input id='btel' type="text" name="btel" class="mui-input-clear mui-input" placeholder="请输入手机号码" value="">
				</div>
				<div class="mui-input-row">
					<input id='code' type="text"  class="mui-input-clear mui-input" style="width: 60%;float:left;" placeholder="请输入验证码">
					<img id="code_image" src="buyerstyle/getcode.php?code_type=3&width=100&height=35&code_num=4"/>
				</div>
			</form>
			<div class="mui-content-padded">
				<button id='reg' type="button" class="mui-btn mui-btn-block mui-btn-primary">注册</button>
			</div>
		</div>

		<!-- 性别选择操作表 -->
		<div id="sheet1" class="mui-popover mui-popover-bottom mui-popover-action ">
		    <!-- 可选择菜单 -->
		    <ul class="mui-table-view" id="select_sex">
		      <li class="mui-table-view-cell" val="男">
		        <a href="#">男</a>
		      </li>
		      <li class="mui-table-view-cell" val='女'>
		        <a href="#">女</a>
		      </li>
		    </ul>
		    <!-- 取消菜单 -->
		    <ul class="mui-table-view">
		      <li class="mui-table-view-cell">
		        <a href="#sheet1"><b>取消</b></a>
		      </li>
		    </ul>
		</div>
		<script src="buyerstyle/js/mui.min.js"></script>
		<script src="buyerstyle/js/jquery.js"></script>
		<script src="buyerstyle/js/func.js"></script>
		<script type="text/javascript">
		document.getElementById("bsex").addEventListener("tap",function(){
			//传入toggle参数，用户无需关心当前是显示还是隐藏状态，mui会自动识别处理；
			mui('#sheet1').popover('toggle');
		});
		mui("#select_sex").on("tap",".mui-table-view-cell",function(){
			$("#bsex").val(this.getAttribute("val"));
			mui('#sheet1').popover('toggle');
		});
		</script>
		<script type="text/javascript">
			mui.ready(function(){
				//传参数生成随机验证码
				document.getElementById("code_image").addEventListener("tap",function(){
					this.src="buyerstyle/getcode.php?code_type=3&width=100&height=35&code_num=4";
				});
				
				//点击注册进行验证码判断
				document.getElementById("reg").addEventListener("tap",reg);
			});
		</script>
	</body>

</html>