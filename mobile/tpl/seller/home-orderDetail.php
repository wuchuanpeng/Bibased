<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head> 
		<title>订单查看</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-home.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css">
	</head>
	
 
	<body>
        <header class="mui-bar mui-bar-nav" style="background-color: rgba(255,255,255,0.9);text-align: center;">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" id="backpage" style="color: #000000"></a>
            <h1 class="mui-title">我的订单</h1>
        </header>
		<div class="mui-content" id="detail-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<div class="mui-scroll" style="width: 100%;background-color: #fff;">
						<a class="mui-control-item mui-active" href="#item1mobile" style="width: 33%;">
							全部订单
						</a>
						<a class="mui-control-item" href="#item2mobile" style="width: 33%;">
							已完成
						</a>
						<a class="mui-control-item" href="#item3mobile" style="width: 33%;">
							已发货
						</a>
				    </div>
				</div>
				<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-4"></div>
				<div class="mui-slider-group" style="margin-top: -1px;">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
		 					<div class="mui-scroll">
		 						<div class="aaaaaa">
									<ul class="order-details">
										<li class="order-msg">
											<span class="order-number">订单编号:236128736dsfef4</span>
											<span class="order-state">交易成功</span>
										</li>
										<li class="order-time">
											<span>生成时间:2016-07-23 08:00</span>
										</li>
										<li class="order-place clearfloat">
											<span class="place-user">客户:lili</span>
											<span class="place-contact">联系他</span>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">家常豆腐</p>
													<span class="commodity-unitPrice">¥20.00</span>
												</div>
												<div class="note-count">
													<p class="order-note">备注:少辣</p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">米饭</p>
													<span class="commodity-unitPrice">¥1.00</span>
												</div>
												<div class="note-count">
													<p class="order-note"></p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-price clearfloat">
											<p>共2件商品&nbsp;合计: ¥ <span class="total-price">21.00</span>元(含运费0.00元)</p>
										</li>
										<li class="order-deal clearfloat">
											
											<button type="button">删除订单</button>
										</li>
									</ul>
									<ul class="order-details">
										<li class="order-msg">
											<span class="order-number">订单编号:236128736dsfef4</span>
											<span class="order-state">已发货</span>
										</li>
										<li class="order-time">                    
											<span>生成时间:2016-07-23 08:00</span>
										</li>
										<li class="order-place clearfloat">
											<span class="place-user">客户:lili</span>
											<span class="place-contact">联系他</span>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">家常豆腐</p>
													<span class="commodity-unitPrice">¥20.00</span>
												</div>
												<div class="note-count">
													<p class="order-note">备注:少辣</p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">米饭</p>
													<span class="commodity-unitPrice">¥1.00</span>
												</div>
												<div class="note-count">
													<p class="order-note"></p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-price clearfloat">
											<p>共2件商品&nbsp;合计: ¥ <span class="total-price">21.00</span>元(含运费0.00元)</p>
										</li>
										<li class="order-deal clearfloat">
											
											<button type="button">删除订单</button>
										</li>
									</ul>
		 						</div>
							</div>
						</div>
					</div>
					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-content mui-scroll-wrapper">
							<div class="mui-scroll">
								<div class="aaaaaa">
									<ul class="order-details">
										<li class="order-msg">
											<span class="order-number">订单编号:236128736dsfef4</span>
											<span class="order-state">交易成功</span>
										</li>
										<li class="order-time">
											<span>生成时间:2016-07-23 08:00</span>
										</li>
										<li class="order-place clearfloat">
											<span class="place-user">客户:lili</span>
											<span class="place-contact">联系他</span>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">家常豆腐</p>
													<span class="commodity-unitPrice">¥20.00</span>
												</div>
												<div class="note-count">
													<p class="order-note">备注:少辣</p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">米饭</p>
													<span class="commodity-unitPrice">¥1.00</span>
												</div>
												<div class="note-count">
													<p class="order-note"></p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-price clearfloat">
											<p>共2件商品&nbsp;合计: ¥ <span class="total-price">21.00</span>元(含运费0.00元)</p>
										</li>
										<li class="order-deal clearfloat">
											
											<button type="button">删除订单</button>
										</li>
									</ul>
								</div>	
							</div>	
						</div>
					</div>
					<div id="item3mobile" class="mui-slider-item mui-control-content">
						<div id="scroll3" class="mui-content mui-scroll-wrapper">
							<div class="mui-scroll">
								<div class="aaaaaa">
									<ul class="order-details">
										<li class="order-msg">
											<span class="order-number">订单编号:236128736dsfef4</span>
											<span class="order-state">已发货</span>
										</li>
										<li class="order-time">                    
											<span>生成时间:2016-07-23 08:00</span>
										</li>
										<li class="order-place clearfloat">
											<span class="place-user">客户:lili</span>
											<span class="place-contact">联系他</span>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">家常豆腐</p>
													<span class="commodity-unitPrice">¥20.00</span>
												</div>
												<div class="note-count">
													<p class="order-note">备注:少辣</p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-commodityList clearfloat">
											<div class="commodityList-left">
												<img src="buyerstyle/img/headimg.jpeg"/>
											</div>
											<div class="commodityList-right">
												<div class="name-unitPrice">
													<p class="commodity-name">米饭</p>
													<span class="commodity-unitPrice">¥1.00</span>
												</div>
												<div class="note-count">
													<p class="order-note"></p>
													<span class="order-count">×1</span>
												</div>
											</div>
										</li>
										<li class="order-price clearfloat">
											<p>共2件商品&nbsp;合计: ¥ <span class="total-price">21.00</span>元(含运费0.00元)</p>
										</li>
										<li class="order-deal clearfloat">
											
											<button type="button">删除订单</button>
										</li>
									</ul>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
   
		
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script src="buyerstyle/js/mui.pullToRefresh.js"></script>
	<script src="buyerstyle/js/mui.pullToRefresh.material.js"></script>
	<script type="text/javascript">
//		mui('.mui-scroll-wrapper').scroll({
//			scrollY:true,
//			deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
//			indicators:false,
//			bounce: false
//		});
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
					$.each(document.querySelectorAll('.mui-slider-group .mui-scroll'), function(index, pullRefreshEl) {
						$(pullRefreshEl).pullToRefresh({
							up: {
								callback: function() {
									var self = this;
									setTimeout(function() {
										var div = self.element.querySelector('.aaaaaa');
										div.appendChild(createFragment(div, index, 5));
										self.endPullUpToRefresh();
									}, 1000);
								}
							}
						});
					});
					var createFragment = function(div, index, count, reverse) {
						var length = div.querySelectorAll('ul').length;
						var fragment = document.createDocumentFragment();
						var ul;
						for (var i = 0; i < count; i++) {
							ul = document.createElement('ul');
							ul.className = 'order-details';
							ul.innerHTML = '<li class="order-msg">'+
										'<span class="order-number">订单编号:236128736dsfef4</span>'+
										'<span class="order-state">已发货</span>'+
									'</li>'+
									'<li class="order-time">'+                   
										'<span>生成时间:2016-07-23 08:00</span>'+
									'</li>'+
									'<li class="order-place clearfloat">'+
										'<span class="place-user">客户:lili</span>'+
										'<span class="place-contact">联系他</span>'+
									'</li>'+
									'<li class="order-commodityList clearfloat">'+
										'<div class="commodityList-left">'+
											'<img src="buyerstyle/img/headimg.jpeg"/>'+
										'</div>'+
										'<div class="commodityList-right">'+
											'<div class="name-unitPrice">'+
												'<p class="commodity-name">家常豆腐</p>'+
												'<span class="commodity-unitPrice">¥20.00</span>'+
											'</div>'+
											'<div class="note-count">'+
												'<p class="order-note">备注:少辣</p>'+
												'<span class="order-count">×1</span>'+
											'</div>'+
										'</div>'+
									'</li>'+
									'<li class="order-commodityList clearfloat">'+
										'<div class="commodityList-left">'+
											'<img src="buyerstyle/img/headimg.jpeg"/>'+
										'</div>'+
										'<div class="commodityList-right">'+
											'<div class="name-unitPrice">'+
												'<p class="commodity-name">米饭</p>'+
												'<span class="commodity-unitPrice">¥1.00</span>'+
											'</div>'+
											'<div class="note-count">'+
												'<p class="order-note"></p>'+
												'<span class="order-count">×1</span>'+
											'</div>'+
										'</div>'+
									'</li>'+
									'<li class="order-price clearfloat">'+
										'<p>共2件商品&nbsp;合计: ¥ <span class="total-price">21.00</span>元(含运费0.00元)</p>'+
									'</li>'+
									'<li class="order-deal clearfloat">'+
										'<button type="button">删除订单</button>'+
									'</li>';
							fragment.appendChild(ul);
						}
						return fragment;
					};
				});
			})(mui);
		
		
	</script>
</html>