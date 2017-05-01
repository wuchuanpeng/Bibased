<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/seller-home.css"/>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
	        <h1 class="mui-title">消息中心</h1>
	    </header>
	    <div class="talkbox-content" style="padding-top: 45px;">
			<ul id="talkbox-list">
				<li class="mui-table-view">
					<div class=" mui-table-view-cell">
						<div class="mui-slider-right mui-disabled">
							<a class="mui-btn mui-btn-red">删除</a>
						</div>
						<div class="mui-slider-handle">
							<a class="talk-item">
								<div class="clearfloat item-pic" style="padding: 5px;">
									<img src="buyerstyle/img/headimg.jpeg" class="item-img"/>
								</div>
								<div class="item-name-time">
									<span class="item-shopname">金粉世家</span>
									<span class="item-time">2015-06-22</span>
								</div>
								<div class="item-talkmsg">
									<span class="last-msg">谢谢亲,麻烦好评哦</span>
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
							<a class="talk-item">
								<div class="clearfloat item-pic" style="padding: 5px;">
									<img src="buyerstyle/img/headimg.jpeg" class="item-img"/>
								</div>
								<div class="item-name-time">
									<span class="item-shopname">金粉世家</span>
									<span class="item-time">2015-06-22</span>
								</div>
								<div class="item-talkmsg">
									<span class="last-msg">谢谢亲,麻烦好评哦</span>
								</div>
							</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script src="buyerstyle/js/jquery.js"></script>
	<script type="text/javascript">
		mui.init()
		(function($) {
			//拖拽后显示操作图标，点击操作图标删除元素；
			$('#talkbox-list').on('tap', '.mui-btn', function(event) {
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
		mui("#talkbox-list").on("tap",".mui-table-view-cell",function(){
			window.location.href="admin.php?controller=userhome&method=location_talkbox"
		});
	</script>
</html>