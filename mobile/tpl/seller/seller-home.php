<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title>商家主页</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-home.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body> 
		<!--<header class="mui-bar mui-bar-nav" style="background: #535355;">-->
	   		<!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>-->
	        <!--<h1 class="mui-title" style="color: #fff;"></h1>
	 	 </header>  -->
	    <!-- 底部选项卡 --> 
        <nav class="mui-bar mui-bar-tab" id ="seller-item" style="height: 10%;">
            <a class="mui-tab-item" id="seller-commodity-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">商品管理</span>
            </a>
            <a class="mui-tab-item" id ="seller-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单管理</span>
            </a>
            <a class="mui-tab-item mui-active" href="#home-content" id="seller-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">商家主页</span>
            </a>
        </nav>   
        <div class="home-content mui-active" id="home-content">
			<div class="home-top">
           		 <!-- 头像和名字在页面的显示 -->
                <div class="home-top-usermsg">
                    <div class="usermsg-img">
                        <img src="{$sellerImg}" />
                    </div>
                    <a href="admin.php?controller=sellerhome&method=location_msgMod">{$sellerName} ></a>
                </div>
            </div>
            <ul class="home-orderManage mui-table-view" style="margin-bottom: 10px;"> 
           		<li class="mui-table-view-cell mui-collapse-content">
           			<a class="mui-navigate-right" href="admin.php?controller=sellerhome&method=location_orderForm">全部订单</a>
           		</li>  
           		<li class="" style="height: 43px;line-height: 43px;">
           			<ul class="order-detail">
           				<a href="admin.php?controller=sellerhome&method=location_orderForm" class="detail-item"><li>已完成</li></a>
           				<a href="admin.php?controller=sellerhome&method=location_orderForm" class="detail-item"><li>已发货</li></a>
           			</ul>
           		</li>
            </ul> 
            <div class="home-list">
                <ul class="mui-table-view list-myfunc">
                    <li class="mui-table-view-cell mui-collapse-content">
                        <a class="mui-navigate-right" href="admin.php?controller=sellerhome&method=location_myAccount">我的账户</a>
                    </li>
                    <li class="mui-table-view-cell mui-collapse-content">
                        <a class="mui-navigate-right" href="">认证信息</a>
                    </li>
                    <li class="mui-table-view-cell mui-collapse-content">
                        <a class="mui-navigate-right" href="store-set.php">其他设置</a>
                    </li>
                </ul>
            </div>	  	
        </div>
	</body>
	<script src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.init();
		//		选项卡跳转页面
		document.getElementById("seller-commodity-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellercommodity&method=index";
		});
		document.getElementById("seller-order-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellerorder&method=index";
		});
	</script>	
</html>