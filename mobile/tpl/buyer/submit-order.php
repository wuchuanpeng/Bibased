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
                    <span class="stxt">{$shopName}</span>
                </li>
                {foreach from=$products item=product}

                <li class="mui-table-view-cell smenu">
                    <p style="text-align:left;">{$product.P_Name}</p>
                    <p>x{$product.num}</p>
                    <p>¥{$product.sum}</p>
                </li>

                {foreachelse}
                当前没有数据
                {/foreach}
                <li class="mui-table-view-cell ssum">
                    <p>总计¥{$sum}</p>
                    <p class="sfact">实付<span class="smon">¥{$sum}</span></p>
                </li>
            </ul>
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <a class=""href="javascript:;"id="remark">
                        <span class="meal-num">收货地址</span>
                    </a>
                    <textarea>{$userInfo.B_ReceiptAddr}</textarea>
                </li>
                <li class="mui-table-view-cell">
                    <a class=""href="javascript:;"id="remark">
                        <span class="meal-num">电话</span>
                    </a>
                    <input type="text" value="{$userInfo.B_Tel}"/>
                </li>

            </ul>

        </div>
    </div>
</div>
<div style="display: none">
    <form action="admin.php?controller=userorder&method=orderSubmit" method="post" id="order_submit">
        {foreach from=$data item=value key=key}
        <input type="hidden" name = "{$key}" value="{$value}"/>
        {/foreach}
    </form>
</div>
<!--固定底部的提交订单-->
<div class="sub-pay">
    <p class="sub-fav">
        <!--                  优惠¥3-->
    </p>
    <p class="wait-sub">待支付<span>¥{$sum}</span></p>
    <p class="sub-btn" id = "submit-order" >提交订单</p>
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
    document.getElementById("submit-order").addEventListener("tap", function () {
        $("#order_submit").submit();
    });
</script>
</html>