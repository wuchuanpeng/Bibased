<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
        <link rel="stylesheet" type="text/css" href="buyerstyle/css/image-viewer.css"/>
		
	</head>

	<body>
		<header class="mui-bar mui-bar-nav" style="background-color: rgba(255,255,255,0.9);text-align: center;">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" id="backpage" style="color: #000000"></a>
			<h1 class="mui-title">我的评价</h1>
		</header>
		<div class="myevaluate-content">
			<div class="content-topbg">
				<div class="topbg-usermsg">
                    <div class="usermsg-img">
                        <img src="{$buyerMsg.B_ImgUrl}" />
                    </div>
                    <p class="usermsg-name">{$buyerMsg.B_Name}</p>
                    <p class="usermsg-num">已贡献{$buyerMsg.count}条评价</p>
	            </div> 
			</div>
			<ul class="content-evaluate">
                {if $buyerMsg.count neq 0}
                {foreach from = $evalList item = value}
				<li class="mui-table-view mui-collapse-content" style="margin-bottom: 5px;">
					<div class="mui-table-view-cell">
						<a href="#" id="{$value.S_ID}" class="mui-navigate-right evaluate-shopname">{$value.S_ShopName}</a>
                        <div class="eval-item-content">
                            <div class="top-left clearfloat">
                                <div class="shop-grade clearfloat">
                                    {foreach from = $star key = k item = tvalue}
                                        <span class="star-active"></span>
                                        {if $k eq $value.E_FULL}
                                            {break}
                                        {/if}
                                    {/foreach}
                                    {foreach from = $star key = tk item = tvalue}
                                        <span class="star-unactive"></span>
                                        {if $tk eq $value.E_NONE}
                                            {break}
                                        {/if}
                                    {/foreach}
                                </div>
                                <span class="customer-msg">{$value.E_Date}</span>
                            </div>
                            <p class="evaluate-word">{$value.E_Content|default:"当前评论没有内容"}</p>
                            {if $value.L_ImgUrl neq ""}
                            <ul class="img-group clearfloat">
                                <li><img src="{$value.L_ImgUrl}" data-preview-src="" data-preview-group="1"/></li>
                            </ul>
                            {/if}
                            {if $value.sellerReply neq ""}
                            <div class="seller-reply">
                                <div class="reply-item-time clearfloat">
                                    <span class="reply-item">商家回复</span>
                                    <span class="reply-time">{$value.sellerReplyTime}</span>
                                </div>
                                <p class="reply-eval">{$value.sellerReply}</p>
                            </div>
                            {/if}
                        </div>
					</div>
               </li>
                {/foreach}
                {/if}
			</ul>
		</div>
		
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
    <script src="buyerstyle/js/mui.previewimage.js"></script>
    <script src="buyerstyle/js/mui.zoom.js"></script>
	<script type="text/javascript">
        mui.previewImage();
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
//            topItem[i].style.marginTop=window.innerWidth*3/200+'px';
        }

		mui(".content-evaluate").on('tap','.evaluate-shopname',function() {
		    var sid = this.getAttribute("id");
			window.location.href="admin.php?controller=usershop&method=clickRestaurant&sid="+sid;
		});
		
	</script>
</html>