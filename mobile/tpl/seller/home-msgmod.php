<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title>我的账户</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/homepage.css"/>
	</head>

	<body>
		<div class="msgmod-content">
			<ul class="mui-table-view msgmod-list">
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="#msgmod-name" style="padding: 3px 15px; line-height: 37px;">
                    	<span class="list-image">头像</span>
                    	<span class="user-image"><img src="../img/headimg.jpeg"/></span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="msgmod-mod.php?flag=1">
                    	<span class="list-name">用户名</span>
                    	<span class="user-name">LILI</span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="msgmod-mod.php?flag=2">
                    	<span class="list-password">账号密码</span>
                    	<span class="user-password">修改</span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="">
                    	<span class="list-tel">手机号</span>
                    	<span class="user-tel">183****9257</span>
                    </a>
                </li>
            </ul>
            <input type="button" value="退出登录" onclick="loginOut()" id="login-out"/>
		</div>
		<div id="msgmod-name" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#">拍照</a>
				</li>
				<li class="mui-table-view-cell">
					<a href="#">从手机相册选择</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#msgmod-name"><b>取消</b></a>
				</li>
			</ul>
		</div>
	</body>
		<script src="../js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init()
			function loginOut(){
				mui.toast("登出");
			}
		</script>
</html>