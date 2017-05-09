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
    <h1 class="mui-title">支付订单</h1>
</header>

<div class="mui-content mui-scroll-wrapper"id="sub-wrapper">
    <div class="mui-scroll"style="padding-bottom: 50px;">
        <div class="sub-content">

            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <span class="simg"></span>
                    <span class="">￥{$sum}</span>
                    <p style="padding-left: 30px">{$shopName}</p>
                </li>

            </ul>
            <ul class="mui-table-view">
                <ul class="mui-table-view mui-table-view-radio">
                    <li class="mui-table-view-cell  mui-selected">
                        <a class="mui-navigate-right">微信支付</a>
                    </li>
                </ul>

            </ul>

        </div>
    </div>
</div>

<!--固定底部的提交订单-->
<div class="sub-pay">
    <p class="mui-btn-warning" id = "order_pay" >确认支付{$sum}元</p>
</div>



</body>
<script src="buyerstyle/js/jquery.js"></script>
<script src="buyerstyle/js/mui.min.js"></script>
<script src="buyerstyle/js/func.js"></script>
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
    var orderId = "{$orderId}";
    document.getElementById("order_pay").addEventListener("tap", function () {
        doajax("admin.php?controller=userorder&method=orderPay",{
            orderId:orderId
            },'text',function (data) {
            console.info(data);
            if (data > 0) {
                mui.toast("支付成功");
                window.location.href = "admin.php?controller=usershop&method=index";
            }else {
                alert("支付失败");
            }
        });
    });
</script>
</html>