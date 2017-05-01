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
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000;;"></a>
			<h1 class="mui-title">我的收货地址</h1>
		</header>
		<div class="myaddr-content" style="padding-top: 45px;">
			<ul id="addr-list">
				<li class="mui-table-view" style="margin-bottom: 5px;">
					<div class=" mui-table-view-cell">
						<div class="mui-slider-right mui-disabled">
							<a class="mui-btn mui-btn-red">删除</a>
						</div>
						<div class="mui-slider-handle">
							<a class="addr-item">
								<div class="clearfloat" style="padding: 5px;">
									<span class="item-name">LILI</span>
									<span class="item-tel">1873218638</span>
								</div>
								<div style="padding: 5px;">
									<span class="item-addr">湖南省株洲市天元区栗雨街道中达路</span>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li class="mui-table-view">
					<div class=" mui-table-view-cell">
						<div class="mui-slider-right mui-disabled">
							<a class="mui-btn mui-btn-red">删除</a>
						</div>
						<div class="mui-slider-handle">
							<a class="addr-item">
								<div class="clearfloat" style="padding: 5px;">
									<span class="item-name">LILI</span>
									<span class="item-tel">1873218638</span>
								</div>
								<div style="padding: 5px;">
									<span class="item-addr">湖南省株洲市天元区栗雨街道中达路湖南工业大学河西校区</span>
								</div>
							</a>
						</div>
					</div>
				</li>
			</ul>
			<input type="button" value="添加新地址" onclick="window.location.href='admin.php?controller=userhome&method=location_myaddrAdd'" id="addr-newadd"/>
		</div>
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script type="text/javascript">
		mui.init()
		(function($) {
			//拖拽后显示操作图标，点击操作图标删除元素；
			$('#addr-list').on('tap', '.mui-btn', function(event) {
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
	</script>
	<script type="text/javascript">
		mui("#addr-list").on('tap','.addr-item',function(){
			window.location.href="admin.php?controller=userhome&method=location_myaddrMod";
		});
	</script>
</html>