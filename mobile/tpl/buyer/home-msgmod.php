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
			<a class="mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000" href="admin.php?controller=userhome&method=index"></a>
    		<h1 class="mui-title">用户信息修改</h1>
		</header>
		<div class="msgmod-content" style="padding-top:44px;">
			<ul class="mui-table-view msgmod-list" style="margin-top: 6px;">
                <li class="mui-table-view-cell mui-collapse-content">
                    <form name="uploadForm" action="admin.php?controller=userhome&method=uploadUserImg" method="post" enctype="multipart/form-data">
                        <a class="mui-navigate-right" href="#msgmod-name" style=" line-height: 21px;width:100%;height: 100%;">
                            <span class="list-image">头像</span>
                            <input name="upload-img" id="upload-img" type="file" value="">
                            <span class="user-image"><img src="{$userImg}" style="margin-top: -8px;"/></span>
                        </a>
                    </form>
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

	</body>
		<script src="buyerstyle/js/mui.min.js"></script>
		<script type="text/javascript">
            document.getElementById('upload-img').addEventListener('change',function () {
                document.uploadForm.submit();
            });

			mui.init()
			function loginOut(){
				window.location.href="admin.php?controller=userhome&method=user_loginOut";
			}
		</script>
</html>