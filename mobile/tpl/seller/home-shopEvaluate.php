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
                            <span class="grade-left-grade">4.6</span>
                            <p class="grade-left">综合评分</p>
                        </div>
                        <div class="eval-grade-right">
                            <span class="grade-right-grade">98%</span>
                            <p class="grade-right">好评率</p>
                        </div>
                    </li>
                </ul>

                <ul class="mui-table-view" class="customer-eval">
                    <li class="mui-table-view-cell customer-eval-item">
                        <div class="eval-item-top">
                            <div class="item-top-left">
                                <img src="buyerstyle/img/headimg.jpeg"/>
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
                                </div>
                            </div>
                        </div>
                        <div class="eval-item-content">
                            <p class="evaluate-word">很好吃</p>
                            <ul class="img-group clearfloat">
                                <li><img src="buyerstyle/img/muwu.jpg" data-preview-src="" data-preview-group="1" /></li>
                                <li><img src="buyerstyle/img/muwu.jpg" data-preview-src="" data-preview-group="1"/></li>
                            </ul>
                            <span class="label-evaluation">味道好,风雨无阻,送货快</span>
                            <div class="seller-reply">
                                <p>商家回复(<span>1天</span>后):<span>谢谢您的夸奖,您的满意是我们最大的开心</span></p>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn-reply">回复</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
</div>
</body>
<script src="buyerstyle/js/mui.min.js"></script>
<script src="buyerstyle/js/mui.pullToRefresh.js"></script>
<script src="buyerstyle/js/mui.pullToRefresh.material.js"></script>
<script src="buyerstyle/js/mui.previewimage.js"></script>
<script src="buyerstyle/js/mui.zoom.js"></script>
<script type="text/javascript">
    //		调整css布局
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




</script>
</html>