<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title>商家商品管理页面</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-order.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body> 
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">订单管理</h1>
	 	 </header> 
	 	 <!--下拉刷新容器-->
		<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
				<!--数据列表-->
				<ul class="mui-table-view mui-table-view-chevron clearfloat order-manage">
					<li class="mui-table-view-cell new-orders">
						<img src="buyerstyle/image/shop-icon.jpg"/>
						<ul class="new-orders-list">
							<li class="list-name">名称家常菜馆</li>
							<li class="list-num">数量</li>
							<li class="list-price">价格</li>
						</ul>
					</li>
					<div class="order-taking clearfloat"><button type="button"class="mui-btn mui-btn-primary taking">确认接单</button></div>
					<li class="mui-table-view-cell new-orders">
						<img src="buyerstyle/image/shop-icon.jpg"/>
						<ul class="new-orders-list">
							<li class="list-name">名称家常菜馆</li>
							<li class="list-num">数量</li>
							<li class="list-price">价格</li>
						</ul>
					</li>
					<div class="order-taking clearfloat"><button type="button"class="mui-btn mui-btn-primary taking">确认接单</button></div>
				</ul>
			</div>
		</div>
	 	 
	    <!-- 底部选项卡 --> 
        <nav class="mui-bar mui-bar-tab" id ="seller-item" style="height: 10%;">
            <a class="mui-tab-item" id="seller-commodity-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">商品管理</span>
            </a>
            <a class="mui-tab-item mui-active" href="#order-content" id ="seller-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单管理</span>
            </a>
            <a class="mui-tab-item" id="seller-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">商家主页</span>
            </a>
        </nav>
        <div class="order-content mui-active" id="order-content">
        </div>
	</body>
	<script src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		//		选项卡跳转页面
		document.getElementById("seller-commodity-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellercommodity&method=index";
		});
		document.getElementById("seller-home-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellerhome&method=index";
		});
	</script>	
	<script type="text/javascript">
		mui.init({
				pullRefresh: {
					container: '#pullrefresh',
					down: {
						
						callback: pulldownRefresh
					},
					up: {
						
						contentrefresh: '正在加载...',
						callback: pullupRefresh
					}
				}
			});
			/**
			 * 下拉刷新具体业务实现
			 */
			function pulldownRefresh() {
				setTimeout(function() {
                     //下拉的时候要执行的操作
					mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
				}, 1500);
			}
			var count = 0;
			/**
			 * 上拉加载具体业务实现
			 */
			function pullupRefresh() {
				setTimeout(function() {
					mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
                   //上拉的时候要执行的操作
				}, 1500);
			}
	</script>
	<script type="text/javascript">
		//查看订单详情
		mui('.order-manage').on('tap','.new-orders',function(){
			window.location.href='admin.php?controller=sellerorder&method=location_orderDetail';
		});
		//接单
		mui('.order-taking').on('tap','.taking',function(){
			this.classList.remove('mui-btn-primary');
			this.classList.add('mui-btn-warning');
			this.innerText='已接单';
		});
	</script>
</html>