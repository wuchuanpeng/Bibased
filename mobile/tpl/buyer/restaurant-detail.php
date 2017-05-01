<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head> 
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../css/orderpage.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/image-viewer.css"/>
	</head>
	

	<body> 
		<header class="mui-bar mui-bar-nav" style="background-color: #fff;">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000;"></a>
		    <h1 class="mui-title">商家详情</h1>
		</header>
		
		<div class="mui-content" id="detail-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<div class="mui-scroll" style="width: 100%;background-color: #fff;">
						<a class="mui-control-item mui-active" href="#item3mobile" style="width: 50%;">
							商家
						</a>
						<a class="mui-control-item" href="#item4mobile" style="width: 50%;">
							评价
						</a>
				    </div>
				</div>
				<div class="mui-slider-group" style="margin-top: -1px;">
					<div id="item3mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll3" class="mui-content mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="mui-table-view seller-detail1">
									<li class="mui-table-view-cell detail-item">
										<span class="detail-content">37824723472</span>
										<a href="#seller-tel" id="detail-phone-icon"><img src="../img/top-tel.png"/></a>
									</li>
									<li class="mui-table-view-cell detail-item">
										<a href="" class="mui-navigate-right">
											<span class="detail-content">株洲市天元区泰山路98号你家</span>
										</a>
									</li>
								</ul>
								<ul class="mui-table-view seller-detail2">
									<li class="mui-table-view-cell detail-item">
										<span class="detail-content">配送时间: 10:00-22:00</span>
									</li>
									<li class="mui-table-view-cell detail-item">
										<span class="detail-content">配送服务: 由商家提供</span>
									</li>
								</ul>
								<ul class="mui-table-view seller-detail3">
									<li class="mui-table-view-cell detail-item">
										<span class="detail-content">满20减1</span>
									</li>
									<li class="mui-table-view-cell detail-item">
										<span  class="detail-content">该商家支持在线支付</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="item4mobile" class="mui-slider-item mui-control-content">
						<div id="scroll4" class="mui-scroll-wrapper">
		 					<div class="mui-scroll">
								<ul class="mui-table-view">
									<li class="mui-table-view-cell seller-eval-grade">
				 						<div class="eval-grade-left">
				 							<span class="grade-left-grade">4.6</span>
				 							<p class="grade-left">综合评分</p>
				 							<p class="grade-left">商家好评率98%</p>
				 						</div>
				 						<div class="eval-grade-right">
				 							<div class="grade-seller clearfloat">
				 								<div class="grade-item-name"><span>商家评分</span></div>
				 								<div class="grade-seller-item clearfloat">
				 									<span class="star-active"></span>
				 									<span class="star-active"></span>
				 									<span class="star-active"></span>
				 									<span class="star-active"></span>
				 									<span class="star-unactive"></span>
				 								</div>
				 								<div class="grade-num"><span>4.0</span></div>
				 							</div>
				 							<div class="grade-seller clearfloat">  
				 								<div class="grade-item-name"><span>商品评分</span></div>
				 								<div class="grade-seller-item clearfloat">
				 									<span class="star-active"></span>
				 									<span class="star-active"></span>
				 									<span class="star-active"></span>
				 									<span class="star-active"></span>
				 									<span class="star-unactive"></span>
				 								</div>
				 								<div class="grade-num"><span>4.0</span></div>
				 							</div>
				 						</div>
									</li>
								</ul>
								
								<ul class="eval-table-view" style="margin-top: 10px;">
									<li class="eval-table-view-cell seller-eval" id="seller-eval">
										<span class="seller-eval-item span-active">全部(<span>775</span>)</span>
										<span class="seller-eval-item span-unactive">有图(<span>9</span>)</span>
										<span class="seller-eval-item span-unactive">好评(<span>716</span>)</span>
										<span class="seller-eval-item span-unactive">中评(<span>34</span>)</span>
										<span class="seller-eval-item span-unactive">差评(<span>23</span>)</span>
										<span class="seller-eval-item span-unactive">追评(<span>3</span>)</span>
										<span class="seller-eval-item span-unactive">味道赞(<span>147</span>)</span>
										<span class="seller-eval-item span-unactive">分量足(<span>99</span>)</span>
									</li>
								</ul>
								
								<ul class="mui-table-view" class="customer-eval">
									<li class="mui-table-view-cell customer-eval-item">
										<div class="eval-item-top">
											<div class="item-top-left">
												<img src="../img/headimg.jpeg"/>
											</div>
											<div class="item-top-right">
												<div class="top-right-top clearfloat">													
													<span class="customer-msg">小花的春天</span>
													<span class="customer-msg">2017-03-03</span>
												</div>
												<div class="top-right-bottom clearfloat">													
													<div class="customer-msg clearfloat">
														<span class="star-active"></span>
					 									<span class="star-active"></span>
					 									<span class="star-active"></span>
					 									<span class="star-active"></span>
					 									<span class="star-unactive"></span>
													</div>
													<span class="customer-msg">47分钟送达</span>
												</div>
											</div>
										</div>
										<div class="eval-item-content">
											<p class="evaluate-word">很好吃</p>
											<ul class="img-group clearfloat">
												<li><img src="../img/muwu.jpg" data-preview-src="" data-preview-group="1" /></li>
												<li><img src="../img/muwu.jpg" data-preview-src="" data-preview-group="1"/></li>
											</ul>
											<span class="eval-object">农家小炒肉+米饭</span>
											<span class="label-evaluation">味道好,风雨无阻,送货快</span>
											<div class="seller-reply">
												<p>商家回复(<span>1天</span>后):<span>谢谢您的夸奖,您的满意是我们最大的开心</span></p>
											</div>
										</div>
									</li>
									<li class="mui-table-view-cell customer-eval-item">
										<div class="eval-item-top">
											<div class="item-top-left">
												<img src="../img/headimg.jpeg"/>
											</div>
											<div class="item-top-right">
												<div class="top-right-top clearfloat">													
													<span class="customer-msg">小花的春天</span>
													<span class="customer-msg">2017-03-03</span>
												</div>
												<div class="top-right-bottom clearfloat">													
													<div class="customer-msg clearfloat">
														<span class="star-active"></span>
					 									<span class="star-active"></span>
					 									<span class="star-active"></span>
					 									<span class="star-active"></span>
					 									<span class="star-unactive"></span>
													</div>
													<span class="customer-msg">47分钟送达</span>
												</div>
											</div>
										</div>
										<div class="eval-item-content">
											<p class="evaluate-word">很好吃味道好,风雨无阻,送货快味道好,风雨无阻,送货快味道好,风雨无阻,送货快</p>
											<ul class="img-group clearfloat">
												<li><img src="../img/muwu.jpg" data-preview-src="" data-preview-group="1" /></li>
												<li><img src="../img/muwu.jpg" data-preview-src="" data-preview-group="1"/></li>
											</ul>
											<span class="eval-object">农家小炒肉+米饭</span>
											<span class="label-evaluation">味道好,风雨无阻,送货快味道好,风雨无阻,送货快味道好,风雨无阻,送货快</span>
											<div class="seller-reply">
												<p>商家回复(<span>1天</span>后):<span>谢谢您的夸奖,您的满意是我们最大的开心aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</span></p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
   
		
		<div id="seller-tel" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<p>联系电话</p>
				</li>
				<li class="mui-table-view-cell">
					<a href="#">呼叫:14874672374</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#seller-tel"><b>取消</b></a>
				</li>
			</ul>
		</div>
	</body>
	<script src="../js/mui.min.js"></script>
	<script src="../js/mui.pullToRefresh.js"></script>
	<script src="../js/mui.pullToRefresh.material.js"></script>
	<script src="../js/mui.previewimage.js"></script>
	<script src="../js/mui.zoom.js"></script>
	<script type="text/javascript">
//		调整css布局
		var evalitemtopGroup=document.getElementsByClassName("eval-item-top");
		for(var i=0;i<evalitemtopGroup.length;i++){
			evalitemtopGroup[i].style.height==window.innerWidth*3/20+'px';
		}
		var toprighttopGroup=document.getElementsByClassName("top-right-top");
		for(var i=0;i<toprighttopGroup.length;i++){
			toprighttopGroup[i].style.height=window.innerWidth*3/40+'px';
		}
		var toprightbottomGroup=document.getElementsByClassName("top-right-bottom");
		for(var i=0;i<toprightbottomGroup.length;i++){
			toprightbottomGroup[i].style.height=window.innerWidth*3/40+'px';
		}
		var imgGroup=document.getElementsByClassName("img-group");
		for(var i=0;i<imgGroup.length;i++){
			imgGroup[i].style.height=(window.innerWidth-30)*0.82*0.3+'px';
		}
		var topItem=document.getElementsByClassName("customer-msg");
		for(var i=0;i<topItem.length;i++){
			topItem[i].style.height=window.innerWidth*3/50+'px';
			topItem[i].style.marginTop=window.innerWidth*3/200+'px';
		}
		
		
		
		mui('.mui-scroll-wrapper').scroll({
			scrollY:true,
			deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
			indicators:true,
			bounce: false
		});
		mui.previewImage();
		mui.init({
			pullRefresh: {
				container: '#scroll4',
				down: {
					callback: pulldownRefresh
				},
				up:{
					contentrefresh: '正在加载...',
					callback: pullupRefresh
				}  
			}
		});
		function pulldownRefresh() {
			setTimeout(function() {
				mui.toast("刷新成功"); 
				mui('#scroll4').pullRefresh().endPulldownToRefresh(); //refresh completed
			}, 1500);
		}
		function pullupRefresh() {
			setTimeout(function() {
				mui.toast("加载成功");
				mui('#scroll4').pullRefresh().endPullupToRefresh();
			}, 1500);
		}
		
	
		
		mui(".seller-eval").on('tap','.seller-eval-item',function(){
			var fontcss=document.getElementById("seller-eval").getElementsByClassName("seller-eval-item");
			for (var j = fontcss.length - 1; j >= 0; j--) {
				fontcss[j].classList.remove("span-active");
				fontcss[j].classList.add("span-unactive");
			}
			this.classList.remove("span-unactive");
			this.classList.add("span-active");
		});
	</script>
</html>