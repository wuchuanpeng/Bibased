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
            </ul>
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <span class="simg"></span>
                    <span class="stxt"></span>
                </li>
                <li class="mui-table-view-cell smenu">
                    <p style="text-align:left;">是多少</p>
                    <p>¥</p>
                </li>
                <li class="mui-table-view-cell scount">
                    <span>+</span>
                    <span class="room-count">1</span>
                    <span style="font-size: 26px;">-</span>
                </li>
                <li class="mui-table-view-cell ssum">
                    <p>总计¥</p>
                    <p class="sfact">实付<span class="smon">¥</span></p>
                </li>
            </ul>
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <a class=""href="javascript:;"id="remark">
                        <span class="meal-num">收货地址</span>
                    </a>
                    <textarea></textarea>
                </li>
                <li class="mui-table-view-cell">
                    <a class=""href="javascript:;"id="remark">
                        <span class="meal-num">电话</span>
                    </a>
                    <input type="text" value=""/>
                </li>
            </ul>
        </div>
    </div>
</div>
<div style="display: none">
    <form action="admin.php?controller=userorder&method=orderSubmit" method="post" id="order_submit">

        <input type="hidden" name = "" value=""/>
    </form>
</div>
<!--固定底部的提交订单-->
<div class="sub-pay">
    <p class="sub-fav">
    </p>
    <p class="wait-sub">待支付<span>¥</span></p>
    <p class="sub-btn" id = "submit-order" >提交订单</p>
</div>
<!--支付方式选择-->
<div id="way-pay"class="mui-popover mui-popover-bottom mui-popover-action">

    <ul class="sub-table">
        <li class="sub-view">
            <a href="#way-pay" style="height: 100%;">
                <p class="pay-txt">在线支付</p>
                <p class="sub-choose"><img src="buyerstyle/image/choose.png"/></p>
            </a>
        </li>
    </ul>
    <ul class="sub-cancle">
        <li class="sub-view-cell">
            <a href="#way-pay">取消</a>
        </li>
    </ul>
</div>

</body>
<script src="buyerstyle/js/jquery.js"></script>
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
    //改变备注的内容
    document.getElementById("submit-order").addEventListener("tap", function () {
        $("#order_submit").submit();
    });
</script>
</html>