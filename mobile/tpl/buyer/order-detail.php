<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head> 
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../css/orderpage.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
	</head>
	
 
	<body> 
		<header class="mui-bar mui-bar-nav" style="background-color: #fff;">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000;"></a>
		    <h1 class="mui-title">家常菜馆</h1>
		    <a href="#div-tel"><img src="../img/top-tel.png" class="head-tel"></a>
		</header>
		
		<div class="mui-content" id="detail-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<div class="mui-scroll" style="width: 100%;background-color: #fff;">
						<a class="mui-control-item mui-active" href="#item1mobile" style="width: 50%;">
							订单状态
						</a>
						<a class="mui-control-item" href="#item2mobile" style="width: 50%;">
							订单详情
						</a>
				    </div>
				</div>
				<div class="mui-slider-group" style="margin-top: -1px;">
					<!-- 订单状态 -->
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
		 					<div class="mui-scroll cccc">
								<ul class="mui-table-view">
									<li class="mui-table-view-cell order-state-li">
				 						<div class="order-state clearfloat">
											<span class="state">订单已提交</span>
											<span class="time">2017-03-19 19:21</span>
										</div>
										<p class="state-prompt">请耐心等待商家确认</p>
									</li>
									<li class="mui-table-view-cell order-state-li">
										<span class="state">支付成功</span>
										<span class="time">2017-03-19 19:21</span>
									</li>
									<li class="mui-table-view-cell order-state-li">
										<div class="order-state clearfloat">
											<span class="state">商家已接单</span>
											<span class="time">2017-03-19 19:24</span>
										</div>
										<p class="state-prompt">商品准备中,配送进度请咨询商家</p>
									</li>
									<li class="mui-table-view-cell order-state-li">
										<span class="state">订单完成</span>
										<span class="time">2017-03-19 20:00</span>
									</li>
								</ul>
							</div>
							<div id="order-eval" class="bottom-div" style="display: none">
								<a id="evalAccess" class="once-more">去评价</a>
							</div>
							<div id="order-sure" class="bottom-div" style="display:block">
								<a id="refundMoney" class="refund-money">退款</a>
								<a id="confirmReceipt" class="confirm-receipt">确认收货</a>
							</div>
						</div>
					</div>
					<!-- 订单详情页面 -->
					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-content mui-scroll-wrapper">
							<div class="mui-scroll">
								<!-- 订单信息商品 -->
								<div class="item-class-name">
									<span class="name-span">订单详情</span>
								</div>
								<ul class="mui-table-view">
									<li class="mui-table-view-cell">
										<a href="" class="mui-navigate-right order-shop-link">
											<div class="order-shop-img">
												<img src="../img/headimg.jpeg">
											</div>
											<span class="order-shop-name">家常菜馆</span>
										</a>
									</li>
									<li class="mui-table-view-cell commodity-class">
										<div><span class="commodity-class-name">餐饮</span></div>
										<div class="commodity-class1">
											<div class="class1-item">
												<span class="item-elem">农家小炒肉</span>
												<span class="item-elem">×<span>1</span></span>
												<span class="item-elem">¥ <span>16</span></span>
											</div>
											<div class="class1-item">
												<span class="item-elem">茄子豆角</span>
												<span class="item-elem">×<span>1</span></span>
												<span class="item-elem">¥ <span>12</span></span>
											</div>
											<div class="class1-item">
												<span class="item-elem">干煸四季豆</span>
												<span class="item-elem">×<span>1</span></span>
												<span class="item-elem">¥ <span>15</span></span>
											</div>
											<div class="class1-remarks">
												<span class="remarks-name">备注</span>
												<span class="remarks-info">微辣</span>
											</div>
										</div>	
									</li>
									<li class="mui-table-view-cell commodity-class">
										<div><span class="commodity-class-name">酒店</span></div>
										<div class="commodity-class1">
											<div class="class1-item">
												<span class="item-elem">双人间</span>
												<span class="item-elem">×<span>1</span></span>
												<span class="item-elem">¥ <span>119</span></span>
											</div>
											<div class="class1-item">
												<span class="item-elem">单人间</span>
												<span class="item-elem">×<span>1</span></span>
												<span class="item-elem">¥ <span>109</span></span>
											</div>
											<div class="class1-remarks">
												<span class="remarks-name">备注</span>
												<span class="remarks-info"></span>
											</div>
										</div>	
									</li>
									<li class="mui-table-view-cell commodity-class">
										<div><span class="commodity-class-name">农产品</span></div>
										<div class="commodity-class1">
											<div class="class1-item">
												<span class="item-elem">茶叶</span>
												<span class="item-elem">×<span>1</span>kg</span>
												<span class="item-elem">¥ <span>30</span></span>
											</div>
											<div class="class1-item">
												<span class="item-elem">花生</span>
												<span class="item-elem">×<span>1</span>kg</span>
												<span class="item-elem">¥ <span>22</span></span>
											</div>
											<div class="class1-remarks">
												<span class="remarks-name">备注</span>
												<span class="remarks-info"></span>
											</div>
										</div>	
									</li>
									<li class="mui-table-view-cell commodity-cost">
										<div class="commodity-postage-cost clearfloat">
											<span class="order-cost">邮费</span>
											<span class="order-cost-money">¥ <span>22</span></span>
										</div>
										<div class="commodity-prepay-cost clearfloat">
											<span class="order-cost">预付</span>
											<span class="order-cost-money">¥ <span>5</span></span>
										</div>	
									</li>
									<li class="mui-table-view-cell commodity-discount">
										<span class="order-cost">优惠金额</span>
										<span class="order-cost-money">- ¥ <span>22</span></span>
									</li>
									<li class="mui-table-view-cell commodity-total-price">
										<span class="total-price">总计 ¥ <span>320</span></span>
										<span class="total-discount">优惠 ¥ <span>22</span></span>
										<span class="actual-pay">实付 ¥ <span>298</span></span>
									</li>
								</ul>
								<!-- 配送地址信息 -->
								<div class="item-class-name">
									<span class="name-span">配送信息</span>
								</div>
								<ul class="mui-table-view item-package-msg">
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">期望时间</span>
										<span class="msg-block-right">立即配送</span>
									</li>
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">配送号码</span>
										<span class="msg-block-right">19738362822</span>
									</li>
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">配送地址</span>
										<span class="msg-block-right">湖南省株洲市天元区湖南工业大学</span>
									</li>
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">配送服务</span>
										<span class="msg-block-right">百世汇通</span>
									</li>
								</ul>
								<!-- 订单信息 -->
								<div class="item-class-name">
									<span class="name-span">订单信息</span>
								</div>
								<ul class="mui-table-view item-package-msg">
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">订单号码</span>
										<span class="msg-block-right">1237512178631782</span>
									</li>
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">订单时间</span>
										<span class="msg-block-right">2017-03-16 18:14</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
   
		
		<div id="div-tel" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<p>联系电话</p>
				</li>
				<li class="mui-table-view-cell">
					<a href="#">呼叫:10109777</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#div-tel"><b>取消</b></a>
				</li>
			</ul>
		</div>
	</body>
	<script src="../js/mui.min.js"></script>
	<script src="../js/mui.pullToRefresh.js"></script>
	<script src="../js/mui.pullToRefresh.material.js"></script>
	<script type="text/javascript">
		mui('.mui-scroll-wrapper').scroll({
			scrollY:true,
			deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
			indicators:false,
			bounce: false
		});

		mui.init({
			pullRefresh: {
				container: '#scroll1',
				down: {
					callback: pulldownRefresh
				}
			}
		});
		function pulldownRefresh() {
			setTimeout(function() {
				mui.toast("刷新成功");
				mui('#scroll1').pullRefresh().endPulldownToRefresh(); //refresh completed
			}, 1500);
		}
		
			// document.getElementById("detail-content").style.height=window.innerHeight+'px';
			// document.getElementById("item1mobile").style.height=window.innerHeight+'px';
			// document.getElementById("item2mobile").style.height=window.innerHeight+'px';
		
		document.getElementById("refundMoney").addEventListener('tap',function(){
			mui.toast("退款成功");
		});
		document.getElementById("confirmReceipt").addEventListener('tap',function(){
			mui.confirm('确认已经收到您的订单？','确认收货',new Array('取消','确定'),function(e){
					if(e.index==1){
						document.getElementById('order-sure').style.display='none';
					    document.getElementById('order-eval').style.display='block'; 
					}
				});
		});
		document.getElementById("evalAccess").addEventListener('tap',function(){
			window.location.href="menuaccess.php";
		});	
	</script>
</html>