<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
	</head>

	<body>
		<!-- 底部选项卡 -->
        <nav class="mui-bar mui-bar-tab" id ="user-item" style="height: 10%;">
            <a class="mui-tab-item" id="user-shop-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item" id ="user-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单</span>
            </a>
            <a class="mui-tab-item mui-active" href="#user-home" id="user-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">我的</span>
            </a>
        </nav>
        
       	<!-- 用户主页的详细内容  -->
		<div id="user-home" class="mui-control-content mui-active">
			<div class="user-home-content">
				<div class="home-top" style="border-bottom: 1px solid #dcdce1;">
	           		 <!-- 头像和名字在页面的显示 -->
	                <div class="home-top-usermsg">
	                    <div class="usermsg-img">
	                        <img src="{$userImg}"/>
	                    </div>
	                    <a href="admin.php?controller=userhome&method=userMessage">{$userName} ></a>
	                </div> 
	                <div class="talk-div" onclick="window.location.href='admin.php?controller=userhome&method=location_MyTalkbox'">
	                	<img src="buyerstyle/img/conver1.png"/>
	                </div>
	           	</div>
	           	<!-- <div class="mui-table-view home-menu">
	           		<ul class="home-menu-item">
	                	<a href=""><li class="menu-item"><div><p>0</p>&nbsp;元</div><div>余额</div></li></a>
	           			<a href=""><li class="menu-item"><div><p>1</p>&nbsp;张</div><div>红包</div></li></a>
	           			<a href=""><li class="menu-item"><div><p>0</p>&nbsp;张</div><div>代金券</div></li></a>
	                </ul>
	           	</div> -->
	            <div class="home-list">
	                <ul class="mui-table-view list-myfunc">
	                    <li class="mui-table-view-cell mui-collapse-content">
	                        <a class="mui-navigate-right" href="admin.php?controller=userhome&method=location_Myevaluate">我的评价</a>
	                    </li>
	                    <li class="mui-table-view-cell mui-collapse-content">
	                        <a class="mui-navigate-right" href="admin.php?controller=userhome&method=location_Mycollection">我的收藏</a>
	                    </li>
	                    <li class="mui-table-view-cell mui-collapse-content">
	                        <a class="mui-navigate-right" href="admin.php?controller=userhome&method=location_Myaddr">我的地址</a>
	                    </li>
	                </ul>
	                <ul class="mui-table-view list-seller">
	                	<li class="mui-table-view-cell mui-collapse-content">
	                       	<a class="mui-navigate-right" style="margin-left: 5px; padding-left: 25px;" href="../seller/apply-settlement.php">商家入驻</a>
	                    </li>
	                </ul>
	                <ul class="mui-table-view list-service">
	                     <li class="mui-table-view-cell mui-collapse-content">
	                        <a class="mui-navigate-right" href="admin.php?controller=userhome&method=location_MyComments">意见和反馈</a>
	                    </li>
	                    <li class="mui-table-view-cell mui-collapse-content">
	                        <a class="mui-navigate-right" href="">关于我们</a>
	                    </li>
	                </ul>
	                <ul class="mui-table-view list-servicephone">
	                    <li class="mui-table-view-cell">
	                       	<a href="#service-tel">客服电话:10109777</a>
	                    </li>
	                </ul>
	            </div>	
	        </div>
		</div>    	
		<div id="service-tel" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<p>工作时间:每天9:00-23:00</p>
				</li>
				<li class="mui-table-view-cell">
					<a href="#">呼叫:10109777</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#service-tel"><b>取消</b></a>
				</li>
			</ul>
		</div>
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script type="text/javascript">
		mui.ready(function(){
			document.getElementById("user-shop-item").addEventListener("tap",function(){
				window.location.href="admin.php?controller=usershop&method=index";
			});
			document.getElementById("user-order-item").addEventListener("tap",function(){
				window.location.href="admin.php?controller=userorder&method=index";
			});
		});	
	</script>
</html>