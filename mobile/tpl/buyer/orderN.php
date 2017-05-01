<?php header("Content-type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" type="text/css" href="../css/mui.min.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	</head>
	
	<body>
		<!--头部-->
		<header class="mui-bar mui-bar-nav"id="bgwhite">
			<a class="mui-action-back mui-icon  mui-pull-left"></a>
		    <h1 class="mui-title">订单</h1>
		    <a href=""class="edit">编辑</a>
		</header>
		<!--底部-->
		<nav class="mui-bar mui-bar-tab" style="height: 10%;">
			<a class="mui-tab-item" id="user-shop-item">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">首页</span>
			</a>
			<a class="mui-tab-item mui-active" id ="user-order-item">
				<span class="mui-icon mui-icon-bars"></span>
				<span class="mui-tab-label">订单</span>
			</a>
			<a class="mui-tab-item" id="user-home-item">
				<span class="mui-icon mui-icon-person"></span>
				<span class="mui-tab-label">我的</span>
			</a>
		</nav>
		<!--底部导航栏结束-->
		<!--主体部分-->
		<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-segmented-control mui-segmented-control-inverted"style="background-color: #fff;">
							<div style="width:49%;display: inline-block;text-align: center;">
								<a class="mui-control-item mui-active" href="#item1mobile">
							全部订单
							</a>
							</div>
							<div style="width:49%;display: inline-block;text-align: center;">
								<a class="mui-control-item" href="#item2mobile" id="wait-access">
								待评价<span>(1)</span>
							</a>
							</div>	
				   </div>
				<!-- <div style="position: absolute;top: 40px;bottom: 0;width: 100%;">-->
					<div id="item1mobile" class="mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="mui-table-view"id="table">
									<li class="li-cell">
										<a class="shop-order restaurant"href="javascript:;">
					    					<img src="../image/shop-icon.jpg"class="shop-icon"style="width: 40px;height: 40px;"/>
				    						<h5>家常菜馆</h5>
					    					<img class="forward"src="../image/forward-icon.png"style="width: 15px;height: 19px;"/>
					    					<span>订单完成</span>
					    					<div class="hr"></div>
					    				</a>
					    				<a href="javascript:;"id="order-detail"class="order-detail detail">
					    					<p class="menu-bar">土豆烧鸡</p>
					    					<span class="menu-count">x1</span>
					    					<p class="menu-sum">共<span>1</span>件商品，实付<span class="menu-price">¥7</span></p>
					    				</a>
									    <div class="menu-btn">
									    	<button type="button"class="mui-btn mui-btn-warning menu-access"id="menu-access"style="display: none;float: right;">去评价</button>
									    	<button type="button"class="mui-btn mui-btn-primary menu-sure"id="menu-sure">确认收货</button>
									    </div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="item2mobile" class="mui-control-content">
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="mui-table-view">
									<li class="li-cell">
										<a class="shop-order restaurant"href="javascript:;"id="restaurant2">
					    					<img src="../image/shop-icon.jpg"class="shop-icon"style="width: 40px;height: 40px;"/>
				    						<h5>家常菜馆</h5>
					    					<img class="forward"src="../image/forward-icon.png"style="width: 15px;height: 19px;"/>
					    					<span>订单完成</span>
					    					<div class="hr"></div>
					    				</a>
					    				<a href="javascript:;"id="order-detail2"class="order-detail detail">
					    					<p class="menu-bar">土豆烧鸡</p>
					    					<span class="menu-count">x1</span>
					    					<p class="menu-sum">共<span>1</span>件商品，实付<span class="menu-price">¥7</span></p>
					    				</a>
									    <div class="menu-btn">
									    	<button type="button"class="mui-btn mui-btn-warning menu-access"id="menu-access2">去评价</button>
									    </div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				<!--</div>-->
			<!--顶部选项卡结束-->
		</div>
	</body>
	<script src="../js/mui.min.js"></script>
	<script src="../js/mui.pullToRefresh.js"></script>
		<script src="../js/mui.pullToRefresh.material.js"></script>
		<script>
		//		选项卡跳转页面
		document.getElementById("user-home-item").addEventListener("tap",function(){
			window.location.href="user-home.php";
		});
		document.getElementById("user-shop-item").addEventListener("tap",function(){
			window.location.href="user-shop.php";
		});
			
		//刷新和加载
			mui.init();
			(function($) {
				//阻尼系数
				var deceleration = mui.os.ios?0.003:0.0009;
				$('.mui-scroll-wrapper').scroll({
					bounce: false,
					indicators: true, //是否显示滚动条
					deceleration:deceleration
				});
				$.ready(function() {
					//循环初始化所有下拉刷新，上拉加载。
					$.each(document.querySelectorAll('.mui-control-content .mui-scroll'), function(index, pullRefreshEl) {
						$(pullRefreshEl).pullToRefresh({
							down: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										//下拉时执行的操作
										console.log('kddddd');
										mui.toast('okdown');
										self.endPullDownToRefresh();
									}, 1000);
								}
							},
							up: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										 //上拉时执行的操作
										 console.log('dkfjjjjjjjjjj')
                                         mui.toast('okup');
										self.endPullUpToRefresh();
									}, 1000);
								}
							}
						});
					});
				});
			})(mui);
			//刷新和加载结束
			//点击进入该店铺
			//所有为.li-cell的li里的为.restaurant的a都执行同一操作
			mui(".li-cell").on('tap','.restaurant',function(e){
				mui.openWindow({
					url:'restaurant.php',
					id:'restaurant'
				})
			});
			//点击了解订单详情
			mui(".li-cell").on('tap','.detail',function(){
				mui.openWindow({
					url:'order-detail.php',
					id:'orderdetail'
				})
			});
			//是否确认收货
			mui('.li-cell').on('tap','.menu-sure',function(){
				mui.confirm('确认已经收到您的订单？','确认收货',new Array('取消','确定'),function(e){
					if(e.index==1){
						document.getElementById('menu-sure').style.display='none';
					    document.getElementById('menu-access').style.display='block'; 
					}
				});
			});
			//评价界面
			mui('.li-cell').on('tap','.menu-access',function(){
				mui.openWindow({
					url:'menuaccess.php',
					id:'menuaccess',
//					show:{
//						aniShow:'slide-in-bottom'
//					}
				})
			});
			document.getElementById('menu-access2').addEventListener('tap',function(){
				mui.openWindow({
					url:'menuaccess.php',
					id:'menuaccess',
//					show:{
//						aniShow:'slide-in-bottom'
//					}
				})
			});
		</script>
</html>
