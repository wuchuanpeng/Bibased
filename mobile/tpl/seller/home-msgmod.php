<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title>我的账户</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
	</head>

	<body>
        <header class="mui-bar mui-bar-nav" style="background-color: rgba(255,255,255,0.9);text-align: center;">
            <a href="admin.php?controller=sellerhome&method=index" class="mui-icon mui-icon-left-nav mui-pull-left" id="backpage" style="color: #000000"></a>
            <h1 class="mui-title">我的账户</h1>
        </header>
		<div class="msgmod-content" style="padding-top: 44px;">
			<ul class="mui-table-view msgmod-list">
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="#" style="padding: 3px 15px; line-height: 37px;">
                        <form method="post" name="newHeadPic" action="admin.php?controller=sellerhome&method=save_NewImage" enctype="multipart/form-data">
                            <span class="list-image">头像</span>
                            <input type="file" value="" id="upload-seller" name="upload-seller"/>
                            <span class="user-image"><img src="{$sellerImg}"/></span>
                        </form>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="admin.php?controller=sellerhome&method=modName&flag=1">
                    	<span class="list-name">用户名</span>
                    	<span class="user-name">{$sellerName}</span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="admin.php?controller=sellerhome&method=modPassword&flag=2">
                    	<span class="list-password">账号密码</span>
                    	<span class="user-password">修改</span>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="">
                    	<span class="list-tel">手机号</span>
                    	<span class="user-tel">{$sellerTel}</span>
                    </a>
                </li>
            </ul>
            <input type="button" value="退出登录" onclick="loginOut()" id="login-out"/>
		</div>
	</body>
		<script src="buyerstyle/js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init()
			function loginOut(){
				window.location.href="admin.php?controller=sellerhome&method=seller_loginOut";
			}
			document.getElementById('upload-seller').addEventListener('change',function () {
                document.newHeadPic.submit();
            });
		</script>
</html>