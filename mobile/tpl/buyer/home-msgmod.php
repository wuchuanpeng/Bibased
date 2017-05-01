<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
    		<h1 class="mui-title">用户信息修改</h1>
		</header>
		<div class="msgmod-content" style="padding-top:44px;">
			<ul class="mui-table-view msgmod-list" style="margin-top: 6px;">
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="#msgmod-name" style="padding: 3px 15px; line-height: 37px;">
                    	<span class="list-image">头像</span>
                    	<span class="user-image"><img src="{$userImg}"/></span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="admin.php?controller=userhome&method=modName&flag=1">
                    	<span class="list-name">用户名</span>
                    	<span class="user-name">{$userName}</span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="admin.php?controller=userhome&method=modPassword&flag=2">
                    	<span class="list-password">账号密码</span>
                    	<span class="user-password">修改</span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="">
                    	<span class="list-tel">手机号</span>
                    	<span class="user-tel">{$userTel}</span>
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
		<script src="buyerstyle/js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init()
			function loginOut(){
				window.location.href="admin.php?controller=userhome&method=user_loginOut";
			}
		</script>
</html>