<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-home.css"/>
    <link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css">
    <link rel="stylesheet" type="text/css" href="buyerstyle/css/image-viewer.css"/>
</head>


<body>
<header class="mui-bar mui-bar-nav" style="background-color: #fff;">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000;"></a>
    <h1 class="mui-title">商家详情</h1>
</header>

<div class="mui-content" id="detail-content">
    <div id="scroll4" class="mui-scroll-wrapper" style="padding-top: 45px;">
            <div class="mui-scroll">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell seller-eval-grade">
                        <div class="eval-grade-left">
                            <span class="grade-left-grade" id = "left-grade"></span>
                            <p class="grade-left">综合评分</p>
                        </div>
                        <div class="eval-grade-right">
                            <span class="grade-right-grade" id = "right-grade">98%</span>
                            <p class="grade-right">好评率</p>
                        </div>
                    </li>
                </ul>
<!--                数据-->
                <ul class="mui-table-view customer-eval">
                </ul>
            </div>
        </div>
</div>
</body>
<script src="buyerstyle/js/mui.min.js"></script>
<script src="buyerstyle/js/jquery.js"></script>
<script src="buyerstyle/js/func.js"></script>
<script src="buyerstyle/js/mui.pullToRefresh.js"></script>
<script src="buyerstyle/js/mui.pullToRefresh.material.js"></script>
<script src="buyerstyle/js/mui.previewimage.js"></script>
<script src="buyerstyle/js/mui.zoom.js"></script>
<script>
    var LIST_NUM = 10;
    var countScore = 0;
    var countNum = 0;
    var goodEval = 0;
    $(function () {
        pullupRefresh();
    });
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
    //下拉刷新
    function pulldownRefresh() {
        setTimeout(function() {
            document.location.reload();
            mui('#scroll4').pullRefresh().endPulldownToRefresh(); //refresh completed
        }, 1500);
    }

    var count = 0;
    //上拉加载具体业务实现
    function pullupRefresh() {
        //初始化填入内容
        var option = {
            startItem:count * LIST_NUM,
            listNum:LIST_NUM
        };
        doajax("admin.php?controller=sellerhome&method=getEvaluateList",option,'json',function (data) {
            if (data.length == 0) {
                mui('#scroll4').pullRefresh().endPullupToRefresh(true); //参数为true代表没有更多数据了。
            }else {
                setTimeout(evaluateLoading(data),1500);
                count++;
            }
        });
    }
    //转换时间格式
    function formatDate(now) {
        var year=now.getFullYear();
        var month=now.getMonth()+1;
        var date=now.getDate();
        var hour=now.getHours();
        var minute=now.getMinutes();
        return year+"-"+formatD(month)+"-"+formatD(date)+" "+formatD(hour)+":"+formatD(minute);
    }
    function formatD(day) {
        if(day < 10){
            return "0"+day;
        }else{
            return day;
        }
    }

    function evaluateLoading(data) {
        var addItemNum = data.length;
        mui('#scroll4').pullRefresh().endPullupToRefresh(addItemNum == 0); //参数为true代表没有更多数据了。
        var table = document.body.querySelector('.customer-eval');
        var cells = document.body.querySelectorAll('.customer-eval-item');
        var k = 0;
        for (var i = cells.length, len = i + addItemNum; i < len; i++) {
            var item = data[k++];
//            计算平均分
            if(item.E_Score != ""){
                countScore += parseInt(item.E_Score);
                countNum += 1;
                if(parseInt(item.E_Score) >= 3){
                    goodEval += 1;
                }
            }
            var li = document.createElement('li');
            li.className = 'mui-table-view-cell customer-eval-item';
            li.setAttribute("eid" , item.E_ID);
            var str = '<div class="eval-item-top">'+
                            '<div class="item-top-left">'+
                                '<img src="' + item.buyer_Img + '"/>'+
                            '</div>'+
                            '<div class="item-top-right">'+
                                '<div class="top-right-top clearfloat">'+
                                    '<span class="customer-msg" style="float: left">' + item.buyer_Name + '</span>';
                        if(item.E_Date != ""){
                            str += '<span class="customer-msg">' + formatDate(new Date(item.E_Date)) + '</span>';
                        }
                            str += '</div>'+
                                '<div class="top-right-bottom clearfloat">'+
                                    '<div class="customer-msg clearfloat">';
                                    for (var j = 0; j < item.E_Score; j++){
                                        str += '<span class="star-active"></span>';
                                    }
                                    for (var l = 0; l < 5 - item.E_Score; l++){
                                        str += '<span class="star-unactive"></span>';
                                    }
                                str+='</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="eval-item-content">'+
                            '<p class="evaluate-word">' + item.E_Content + '</p>';
                if(item.eval_Pic != ""){
                    str += '<ul class="img-group clearfloat">'+
                                '<li><img src="' + item.eval_Pic + '" data-preview-src="" data-preview-group="1"/></li>'+
                            '</ul>';
                }
                if(item.seller_Reply != ""){
                    str += '<div class="seller-reply">'+
                                '<p>商家回复:<span>' + item.seller_Reply + '</span></p>'+
                            '</div>';
                }
                    str += '</div>'+
                        '<div class="btn-group">';
                if(item.seller_Reply == ""&&item.E_ID != ""){
                    str += '<button type="button" class="btn-reply">回复</button>';
                }else{
                    str += '<button type="button" class="btn-reply" disabled>回复</button>';
                }

            str += '</div>';
            li.innerHTML = str;
            table.appendChild(li);

        }
        /* css调整 */
        var evalitemtopGroup=document.getElementsByClassName("eval-item-top");
        for(var i=0;i<evalitemtopGroup.length;i++){
            evalitemtopGroup[i].style.height=(window.innerWidth-30)*0.15+'px';
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
        //计算顶部的值
        document.getElementById('left-grade').innerHTML = (countScore / countNum).toFixed(1);
        document.getElementById('right-grade').innerHTML = Percentage(goodEval,countNum);
        reply_tap();
    }
    //计算好评率百分比
    function Percentage(num, total) {
        return (Math.round(num / total * 10000) / 100.00 + "%");// 小数点后两位百分比
    }
</script>
<script>
    function reply_tap() {
        mui(".btn-group").on("tap",".btn-reply",function (e) {
            var eid = this.parentNode.parentNode.getAttribute("eid");
            e.detail.gesture.preventDefault();
            var btnArray = ['发送', '取消'];
            mui.prompt('', '回复：', '回复订单', btnArray, function(e) {
                if (e.index == 0) {
                    if(e.value == ""){
                        mui.alert("您并没有输入任何回复");
                        return false;
                    }else{
                        reply = e.value;
                        doajax("admin.php?controller=sellerhome&method=saveSellerReply",{
                            reply : reply,
                            eid : eid
                        },"json",function (msg) {
                            if(msg){
                                window.location.href = "admin.php?controller=sellerhome&method=location_ShopEval";
                            }
                        });
                    }
                }
            })
        });
    }

</script>
</html>