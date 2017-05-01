<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/shop-interface.css"/>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
    		<h1 class="mui-title">我的收藏</h1>
		</header>
		<div class="collection-content" style="padding-top: 45px;">
			<ul id="collect-list">
				<li class="mui-table-view aaaa">
					<div class=" mui-table-view-cell">
						<div class="mui-slider-right mui-disabled">
							<a class="mui-btn mui-btn-red">取消收藏</a>
						</div>
						<div class="mui-slider-handle">
							<a class="aaaa-content" style="padding-right:15px;">
								<img class="mui-media-object mui-pull-left shop-img" src="buyerstyle/img/headimg.jpeg">
								<div class="mui-media-body">
									<div class="clearfloat">
										<span class="shop-name">兰州拉面</span>
										<span class="shop-distance">2.6km</span>
									</div>
									<div class="clearfloat">
										<span class="shop-con">月售350单</span>
										<!-- <span class="shop-spendtime">43分钟</span> -->
									</div>
									<div class="shop-star clearfloat">
		                    			<span class="star-word">评分:</span>
		                    			<span class="star-active"></span>
		                    			<span class="star-active"></span>
		                    			<span class="star-active"></span>
		                    			<span class="star-unactive"></span>
		                    			<span class="star-unactive"></span>
		                    		</div>
								</div>
								<div class="shop-discount">
									<p class="discount-item">满10减3</p>
									<p class="discount-item">新用户立减10元</p>
								</div>
							</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script type="text/javascript">
		mui.init()
		(function($) {
			//拖拽后显示操作图标，点击操作图标删除元素；
			$('#collect-list').on('tap', '.mui-btn', function(event) {
				var elem = this;
				var li = elem.parentNode.parentNode;
				mui.confirm('取消收藏该商家？', ' ', btnArray, function(e) {
					if (e.index == 0) {
						li.parentNode.removeChild(li);
					} else {
						setTimeout(function() {
							$.swipeoutClose(li);
						}, 0);
					}
				});
			});
			var btnArray = ['干掉它', '舍不得'];
		});
		mui("#collect-list").on('tap','.aaaa-content',function(){
			window.location.href="restaurant.php"
		});
	</script>
</html>