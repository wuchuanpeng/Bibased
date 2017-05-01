<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/orderpage.css"/>
	</head>
	<body>
		<!-- 底部选项卡 -->
        <nav class="mui-bar mui-bar-tab" id ="user-item" style="height: 10%;">
            <a class="mui-tab-item" href="#user-shop" id="user-shop-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item mui-active" href="#user-order" id ="user-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单</span>
            </a>
            <a class="mui-tab-item" id="user-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">我的</span>
            </a>
        </nav>
        
        <!-- 订单页面详细内容 -->
		<div id="user-order" class="mui-control-content mui-active">
			<header class="mui-bar mui-bar-nav" style="height: 8%;">
        		<h1 class="mui-title">订单</h1>
    		</header>
    		<div id="user-order-content">
                1111111111111
    		</div>
        </div>
		<script src="../js/mui.min.js"></script>
		<script type="text/javascript">
			mui.ready(function(){
				document.getElementById("user-shop-item").addEventListener("tap",function(){
					window.location.href="user-shop.php";
				});
				document.getElementById("user-home-item").addEventListener("tap",function(){
					window.location.href="user-home.php";
				});
			});
		</script>
	</body>

</html>