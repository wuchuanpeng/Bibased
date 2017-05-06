<?php header("Content-type: text/html; charset=utf-8"); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>商家商品管理页面</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-order.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-home.css"/>
	</head>
	<body> 
		<header class="mui-bar mui-bar-nav">
	        <h1 class="mui-title">新订单</h1>
	 	 </header>
	 	 <!--下拉刷新容器-->
		<div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="height: 90%;">
			<div class="mui-scroll">
				<!--数据列表-->
                <div class="aaaaaa">
                    {if $orderMsg neq ""}
                    {foreach from=$orderMsg key=k item=value}
                    <ul class="order-details">
                        <li class="order-type">
                            订单类型:
                            <span>{foreach from=$agrOrder item=avalue}
                                {if in_array($avalue[0].A_PID,$avalue[0])}
                                    农产品
                                    {break}
                                {else}
                                    住宿
                                {/if}
                                {/foreach}
                            </span>
                        </li>
                        <li class="order-msg">
                            <span class="order-number">订单编号:{$value.O_No}</span>
                            <span class="order-state">未处理</span>
                        </li>
                        <li class="order-time">
                            <span>生成时间:{"Y-m-d H:i:s"|date:$value.O_Date}</span>
                        </li>
                        <li class="order-place clearfloat">
                            {foreach from=$orderBuyerMsg item=ovalue}
                            {if $value.O_BID eq $ovalue.B_ID}
                            <span class="place-user">客户: {$ovalue.B_Name}</span>
                            <span class="place-contact">{$ovalue.B_Tel}</span>
                        </li>
                        <li class="order-addr clearfloat">
                            <span>收货地址: </span>
                            <p>{$ovalue.B_ReceiptAddr}</p>
                            {break}
                            {/if}
                            {/foreach}
                        </li>
                        {foreach from = $agrOrder.{$k} item = rvalue}
                        <li class="order-commodityList clearfloat">
                            <div class="commodityList-left">
                            {foreach from = $agrOrderImg.{$k} item = ivalue}
                            {if $rvalue.A_PID eq $ivalue.L_SpecificID}
                            <img src="{$ivalue.L_ImgUrl}"/>
                            {break}
                            {/if}
                            {/foreach}
                            </div>
                            <div class="commodityList-right">
                                <div class="name-unitPrice">
                                    <p class="commodity-name">{$rvalue.A_Name}</p>
                                    <span class="commodity-unitPrice">¥{$rvalue.A_RealPrice}</span>
                                </div>
                                <div class="note-count">
                                    <span class="order-count">×{$rvalue.A_Count}</span>
                                </div>
                                <div class="note-count">
                                    <p class="order-note">备注:{$value.O_Desc}</p>
                                </div>
                            </div>
                        </li>
                        {/foreach}
                        <li class="order-price clearfloat">
                            <p>共2件商品&nbsp;合计: ¥ <span class="total-price">{$value.O_RealPrice}</span>元(含运费0.00元)</p>
                        </li>
                        <li class="order-deal clearfloat">
                            <button type="button" id="{$value.O_ID}" class="mui-btn mui-btn-primary btn-confirm" style="border-radius: 3px;">接受订单</button>
                        </li>
                    </ul>
                    {/foreach}
                    {else}
                    当前没有新订单
                    {/if}
                </div>
			</div>
		</div>
	 	 
	    <!-- 底部选项卡 --> 
        <nav class="mui-bar mui-bar-tab" id ="seller-item" style="height: 10%;">
            <a class="mui-tab-item" id="seller-commodity-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">商品管理</span>
            </a>
            <a class="mui-tab-item mui-active" href="#order-content" id ="seller-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单管理</span>
            </a>
            <a class="mui-tab-item" id="seller-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">商家主页</span>
            </a>
        </nav>
        <div class="order-content mui-active" id="order-content">
        </div>
	</body>
	<script src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="buyerstyle/js/jquery.js"></script>
    <<script src="buyerstyle/js/func.js"></script>
    <script type="text/javascript">
		//		选项卡跳转页面
		document.getElementById("seller-commodity-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellercommodity&method=index";
		});
		document.getElementById("seller-home-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellerhome&method=index";
		});

        mui.init({
            pullRefresh: {
                container: '#pullrefresh',
                down: {
                    callback: pulldownRefresh
                }
            }
        });
        /**
         * 下拉刷新具体业务实现
         */
        function pulldownRefresh() {
            setTimeout(function() {
                //下拉的时候要执行的操作
                document.location.reload();
                mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
            }, 1500);
        }
	</script>
	<script type="text/javascript">
		//查看订单详情
//		mui('.order-manage').on('tap','.new-orders',function(){
//			window.location.href='admin.php?controller=sellerorder&method=location_orderDetail';
//		});
		//接单
		mui('.order-deal').on('tap','.btn-confirm',function(){

			var orderId=this.id;
            doajax("admin.php?controller=sellerorder&method=mod_OrderState",{
                orderid:orderId
            },"json",function (msg) {
                if(msg){
                    mui.toast('接单成功');
                    document.location.reload();
                }
            });
            this.classList.remove('mui-btn-primary');
            this.classList.add('mui-btn-success');
            this.innerText='已接单';
		});
	</script>
</html>