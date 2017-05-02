<?php header("Content-type: text/html; charset=utf-8"); ?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/submit-order.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
		    <a class="mui-icon mui-icon-left-nav mui-pull-left"href="javascript:;"id="action-back"style="color: #000;"></a>
		    <h1 class="mui-title">提交订单</h1>
		</header>
		
		   <div class="mui-content mui-scroll-wrapper"id="sub-wrapper">
	          <div class="mui-scroll"style="padding-bottom: 50px;">
	          	<div class="sub-content">
					<ul class="mui-table-view">
					    <li class="mui-table-view-cell">
					        <a class="mui-navigate-right"href="#way-pay">
					        	<p class="way-sub">支付方式</p>
					        	<p class="way-txt"id="way-txt">在线支付</p>
					        </a>
					    </li>
					    <li class="mui-table-view-cell">
					        <a class="mui-navigate-right">
					        	<p class="way-sub">微信红包</p>
					        	<p class="way-txt"></p>
					        </a>
					    </li>
					    <li class="mui-table-view-cell">
					        <a class="mui-navigate-right">
					        	<p class="way-sub">商家代金券</p>
					        	<p class="way-txt"></p>
					        </a>
					    </li>
					</ul>
					<ul class="mui-table-view">
					    <li class="mui-table-view-cell">
					      <span class="simg"></span>
					      <span class="stxt">家常菜馆</span> 
					    </li>
					    <li class="mui-table-view-cell smenu">
					        <p style="text-align:left;">苦瓜炒蛋</p>
					        <p>x2</p>
					        <p>¥20</p>
					    </li>
					    <li class="mui-table-view-cell smenu">
					        <p style="text-align:left;">茄子炒肉</p>
					        <p>x2</p>
					        <p>¥20</p>
					    </li>
					    <li class="mui-table-view-cell sact">
					        <p class="sact-txt">优惠活动</p>
					        <p class="sact-con">-¥3</p>
					    </li>
					    <li class="mui-table-view-cell ssum">
					        <p>总计¥40<span>优惠¥3</span></p>
					        <p class="sfact">实付<span class="smon">¥37</span></p>
					    </li>
					</ul>
					<ul class="mui-table-view">
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right"href="#dinner-count">
								<span class="meal-num">用餐人数</span>
								<p class="meal-txt"id="meal-txt">以便商家给您确定餐具</p>
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right"href="add-remark.php"id="remark">
								<span class="meal-num">备注</span>
								<p class="meal-txt"id="meal-like">口味、偏好等要求</p>
							</a>
						</li>
					</ul>
					
			</div>
		</div>
	</div>
		
			<!--固定底部的提交订单-->
			<div class="sub-pay">
			  <p class="sub-fav">优惠¥3</p>
			  <p class="wait-sub">待支付<span>¥30</span></p>
			  <p class="sub-btn">提交订单</p>
			</div>
			<!--支付方式选择-->
			<div id="way-pay"class="mui-popover mui-popover-bottom mui-popover-action">
				
				<ul class="sub-table">
					<li class="sub-view">
						<a href="#way-pay">
							<p class="pay-txt">在线支付</p>
							<p class="sub-choose"><img src="buyerstyle/image/choose.png"/></p>
						</a>
					</li>
					<li class="sub-view">
						<a href="#way-pay">
							<p class="pay-txt">货到付款</p>
							<p class="sub-choose ishide"><img src="buyerstyle/image/choose.png"/></p>
						</a>
					</li>
				</ul>
				<ul class="sub-cancle">
					<li class="sub-view-cell">
						<a href="#way-pay">取消</a>
					</li>
				</ul>
			</div>
		    <!--用餐人数选择-->
		    <div id="dinner-count"class="mui-popover mui-popover-bottom mui-popover-action"style="height: 250px;">
		    	<div class="mui-scroll-wrapper"style="height: 200px;border-radius: 0;">
					<div class="mui-scroll">
						<ul class="dinner-table">
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">1人</p>
								</a>
							</li>  
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">2人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">3人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">4人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">5人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">6人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">7人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">8人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">9人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">10人</p>
								</a>
							</li>
							<li class="dinner-view">
								<a href="#dinner-count">
									<p class="count-txt">10人以上</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<a href="#dinner-count"><div class="count-cancel">取消</div></a>
			</div>

		
	</body>
     <script src="buyerstyle/js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init();
			//返回
			document.getElementById('action-back').addEventListener('tap',function(){
				history.back();
			});
			//滚动
			mui('.mui-scroll-wrapper').scroll({
				deceleration:0.0005,
				scrollY: true,
				bounce: false,
				indicators:true
			});
			//点击选择支付方式
			var subway=document.getElementsByClassName('sub-view');
			for(var i=0;i<subway.length;i++){
				subway[i].addEventListener('tap',function(){
					for(var i=0;i<subway.length;i++){
						subway[i].children[0].children[1].classList.add('ishide');
					}
					 document.getElementById('way-txt').innerText=this.children[0].children[0].innerText;
					 mui('#way-pay').popover('hide');
					 this.children[0].children[1].classList.remove('ishide');
				});
			}
			//点击选择用餐人数
			var dtxt=document.getElementById('meal-txt');
			mui('.dinner-table').on('tap','.dinner-view',function(){
				var oth=this.parentNode.children;
				for(var i=0;i<oth.length;i++){
					oth[i].children[0].children[0].style.color='#000';
				}
				  dtxt.innerHTML=this.children[0].children[0].innerHTML;
				  this.children[0].children[0].style.color='#14B2FD';
			});
			
			//改变备注的内容
		</script>
</html>