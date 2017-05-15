<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head> 
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/orderpage.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css">
	</head>
	
 
	<body> 
		<header class="mui-bar mui-bar-nav" style="background-color: #fff;">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000;"></a>
		    <h1 class="mui-title">{$sellerInfo.S_ShopName}</h1>
		    <a href="#div-tel"><img src="buyerstyle/img/top-tel.png" class="head-tel"></a>
		</header>
		
		<div class="mui-content" id="detail-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div class="mui-slider-group" style="margin-top: -1px;">
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
										<a href="" class="mui-navigate-right order-shop-link aabaa" sid = "{$sellerInfo.S_ID}">
											<div class="order-shop-img">
												<img src="{$sellerInfo.S_ShopImgUrl}">
											</div>
											<span class="order-shop-name">{$sellerInfo.S_ShopName}</span>
										</a>
									</li>
									<li class="mui-table-view-cell commodity-class">
										<div><span class="commodity-class-name">商品</span></div>
										<div class="commodity-class1">
                                            {foreach from = $agrorders key = k item = agrorder}
											<div class="class1-item">
												<span class="item-elem">{$agrorder.A_Name}</span>
												<span class="item-elem">×<span>{$agrorder.A_Count}</span></span>
												<span class="item-elem">¥ <span>{$agrorder.A_RealPrice}</span></span>
											</div>
                                            {/foreach}
											<div class="class1-remarks">
												<span class="remarks-name">备注</span>
												<span class="remarks-info">{$sellerInfo.O_Desc}</span>
											</div>
										</div>	
									</li>

									<li class="mui-table-view-cell commodity-total-price">
										<span class="actual-pay">实付 ¥ <span>{$sellerInfo.O_RealPrice}</span></span>
									</li>
								</ul>
								<!-- 配送地址信息 -->
								<div class="item-class-name">
									<span class="name-span">配送信息</span>
								</div>
								<ul class="mui-table-view item-package-msg">
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">配送号码</span>
										<span class="msg-block-right">{$buyerInfo.B_Tel}</span>
									</li>
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">配送地址</span>
										<span class="msg-block-right">{$buyerInfo.B_ReceiptAddr}</span>
									</li>
								</ul>
								<!-- 订单信息 -->
								<div class="item-class-name">
									<span class="name-span">订单信息</span>
								</div>
								<ul class="mui-table-view item-package-msg">
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">订单号码</span>
										<span class="msg-block-right">{$sellerInfo.O_No}</span>
									</li>
									<li class="mui-table-view-cell package-msg-block">
										<span class="msg-block-left">订单时间</span>
										<span class="msg-block-right">{"Y-m-d H:i:s"|date:$sellerInfo.O_Date}</span>
									</li>
								</ul>
                                <div id="order-sure" class="bottom-div" style="display:block">
<!--                                    <a id="refundMoney" class="refund-money">退款</a>-->
<!--                                    <a id="confirmReceipt" style="width: 100%;height: 49px" oid = "{$sellerInfo.O_ID}" class="confirm-receipt">确认收货</a>-->
                                    {if $sellerInfo.O_PayState eq 0}
                                    <button type="button"class="mui-btn mui-btn-primary menu-to-pay" style="width: 100%;height: 49px"  oid = "{$sellerInfo.O_ID}" id="menu-to-pay">去支付</button>
                                    {else}
                                    {if $sellerInfo.O_HandleState eq 0}
                                    {else}
                                    {if $sellerInfo.O_HandleState eq 1}
                                    <button type="button"class="mui-btn mui-btn-primary menu-sure" style="width: 100%;height: 49px"  oid = "{$sellerInfo.O_ID}" id="menu-sure">确认收货</button>
                                    {else}
                                    {if $sellerInfo.isEvaluate eq 0}
                                    <button type="button"class="mui-btn mui-btn-primary menu-access" style="width: 100%;height: 49px"  oid = "{$sellerInfo.O_ID}" id="menu-access">去评价</button>
                                    {else}
                                    {/if}
                                    {/if}
                                    {/if}
                                    {/if}
                                </div>
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
					<a href="tel:{$sellerInfo.F_Tel}">呼叫:{$sellerInfo.F_Tel}</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#div-tel"><b>取消</b></a>
				</li>
			</ul>
		</div>
	</body>
    <script src="buyerstyle/js/jquery.js"></script>
    <script src="buyerstyle/js/func.js"></script>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script src="buyerstyle/js/mui.pullToRefresh.js"></script>
	<script src="buyerstyle/js/mui.pullToRefresh.material.js"></script>
	<script type="text/javascript">
		mui('.mui-scroll-wrapper').scroll({
			scrollY:true,
			deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
			indicators:false,
			bounce: false
		});

		mui.init({
//			pullRefresh: {
//				container: '#scroll1',
//				down: {
//					callback: pulldownRefresh
//				}
//			}
		});
//		function pulldownRefresh() {
//			setTimeout(function() {
//				mui.toast("刷新成功");
//				mui('#scroll1').pullRefresh().endPulldownToRefresh(); //refresh completed
//			}, 1500);
//		}
		

		
//		document.getElementById("refundMoney").addEventListener('tap',function(){
//			mui.toast("退款成功");
//		});
//		document.getElementById("confirmReceipt").addEventListener('tap',function(){
//			mui.confirm('确认已经收到您的订单？','确认收货',new Array('取消','确定'),function(e){
//					if(e.index==1){
//						document.getElementById('order-sure').style.display='none';
//					    document.getElementById('order-eval').style.display='block';
//					}
//				});
//		});
//		document.getElementById("evalAccess").addEventListener('tap',function(){
//			window.location.href="admin.php?controller=userorder&method=location_evaluatePage";
//		});
        mui(".mui-table-view-cell").on('tap','.aabaa',function(e){
            var sid = this.getAttribute("sid");
            mui.openWindow({
                url:'admin.php?controller=usershop&method=clickRestaurant&sid='+sid,
                id:'restaurant'
            })
        });

        //是否确认收货
        mui('.bottom-div').on('tap','.menu-sure',function(){
            var oid = this.getAttribute("oid");
            mui.confirm('确认已经收到您的订单？','确认收货',new Array('取消','确定'),function(e){
                if(e.index==1){
                    doajax("admin.php?controller=userorder&method=sureOrder",{
                        oid:oid
                    },"text",function (data) {
                        if(data == 1){
                            mui.toast("确认收货成功");
                            window.location.reload();
                        }else {
                            mui.toast("确认收货失败");
                        }
                    });
                }
            });
        });
        //区支付
        mui(".bottom-div").on('tap','.menu-to-pay',function(){
            var oid = this.getAttribute("oid");
            mui.openWindow({
                url:'admin.php?controller=userorder&method=orderGoPay&oid='+oid,
                id:'orderdetail'
            })
        });
        //评价界面
        mui('.bottom-div').on('tap','.menu-access',function(){
            var oid = this.getAttribute("oid");
            mui.openWindow({
                url:'admin.php?controller=userorder&method=location_evaluatePage&oid='+oid,
                id:'menuaccess',
//					show:{
//						aniShow:'slide-in-bottom'
//					}
            })
        });
	</script>
</html>