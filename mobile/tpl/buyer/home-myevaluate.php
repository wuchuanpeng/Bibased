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
		<header class="mui-bar mui-bar-nav" style="background-color: rgba(255,255,255,0.9);text-align: center;">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" id="backpage" style="color: #000000"></a>
			<h1 class="mui-title">我的评价</h1>
		</header>
		<div class="myevaluate-content">
			<div class="content-topbg">
				<div class="topbg-usermsg">
                    <div class="usermsg-img">
                        <img src="buyerstyle/img/headimg.jpeg" />
                    </div>
                    <p class="usermsg-name">LILI</p>
                    <p class="usermsg-num">已贡献3条评价</p>
	            </div> 
			</div>
			<ul class="content-evaluate">
				<li class="mui-table-view mui-collapse-content" style="margin-bottom: 5px;">
					<div class="mui-table-view-cell">
						<a class="mui-navigate-right evaluate-shopname">金粉世家</a>
	                    <div class="evaluate-detail clearfloat">
	                    	<div class="detail-header">
	                    		<img src="buyerstyle/img/headimg.jpeg"/>
	                    	</div>
	                    	<div class="detail-item clearfloat">
	                    		<div class="item-user-time clearfloat">
	                    			<span class="item-user">LILI</span>
	                    			<span class="item-time">2015.11.22</span>
	                    		</div>
	                    		<div class="item-star clearfloat">
	                    			<span class="grade-star">综合:</span>
	                    			<span class="star-active"></span>
	                    			<span class="star-active"></span>
	                    			<span class="star-active"></span>
	                    			<span class="star-unactive"></span>
	                    			<span class="star-unactive"></span>
	                    		</div>
	                    		<p class="item-eval">
	                    			好吃
	                    		</p>
	                    		<div class="seller-reply">
	                    			<div class="reply-item-time clearfloat">
	                    				<span class="reply-item">商家回复</span>
	                    				<span class="reply-time">2015年10月19日 19:18</span>
	                    			</div>
	                    			<p class="reply-eval">谢谢亲的支持</p>
	                    		</div>
	                    	</div>
	                    </div>
	                    <div class="evaluate-evalmore">
	                		<a class="evalmore-item evalmore-trigger">追评</a>
	                	</div>
					</div>   
               </li>
                <li class="mui-table-view mui-collapse-content" style="margin-bottom: 5px;">
					<div class="mui-table-view-cell">
						<a class="mui-navigate-right evaluate-shopname">金粉世家</a>
	                    <div class="evaluate-detail clearfloat">
	                    	<div class="detail-header">
	                    		<img src="buyerstyle/img/headimg.jpeg"/>
	                    	</div>
	                    	<div class="detail-item clearfloat">
	                    		<div class="item-user-time clearfloat">
	                    			<span class="item-user">LILI</span>
	                    			<span class="item-time">2015.11.22</span>
	                    		</div>
	                    		<div class="item-star clearfloat">
	                    			<span class="grade-star">综合:</span>
	                    			<span class="star-active"></span>
	                    			<span class="star-active"></span>
	                    			<span class="star-active"></span>
	                    			<span class="star-unactive"></span>
	                    			<span class="star-unactive"></span>
	                    		</div>
	                    		<p class="item-eval">
	                    			好吃
	                    		</p>
	                    		<div class="seller-reply" style="display: none;">
	                    			<div class="reply-item-time clearfloat">
	                    				<span class="reply-item">商家回复</span>
	                    				<span class="reply-time">2015年10月19日 19:18</span>
	                    			</div>
	                    			<p class="reply-eval"></p>
	                    		</div>
	                    	</div>
	                    </div>
	                    <div class="evaluate-evalmore">
	                		<a class="evalmore-item evalmore-trigger">追评</a>
	                	</div>
					</div>   
                </li>
			</ul>
		</div>
		
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script type="text/javascript">
//		追加评价弹出的对话框
		mui(".content-evaluate").on('tap','.evalmore-trigger',function(e) {
			e.detail.gesture.preventDefault(); 
			var btnArray = ['发送', '取消'];
			mui.prompt(' ', '追加评价：', '感谢评价', btnArray, function(e) {
				if (e.index == 0) {
					mui.toast("谢谢");
				}
			})
		});
		mui(".content-evaluate").on('tap','.evaluate-shopname',function() {
			window.location.href="restaurant.php";
		});
		
	</script>
</html>