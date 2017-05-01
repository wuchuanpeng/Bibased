<?php
/* Smarty version 3.1.31, created on 2017-04-28 03:47:57
  from "D:\wamp\www\Bibased\mobile\tpl\seller\seller-home.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5902bb6de3e582_81003658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b739891af9196822d11beb3f160d28cfc828e2dd' => 
    array (
      0 => 'D:\\wamp\\www\\Bibased\\mobile\\tpl\\seller\\seller-home.php',
      1 => 1493351275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5902bb6de3e582_81003658 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php ';?>header("Content-type: text/html; charset=utf-8"); <?php echo '?>';?>
<html>
	<head>
		<title>商家主页</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-home.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body> 
		<!--<header class="mui-bar mui-bar-nav" style="background: #535355;">-->
	   		<!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>-->
	        <!--<h1 class="mui-title" style="color: #fff;"></h1>
	 	 </header>  -->
	    <!-- 底部选项卡 --> 
        <nav class="mui-bar mui-bar-tab" id ="seller-item" style="height: 10%;">
            <a class="mui-tab-item" id="seller-commodity-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">商品管理</span>
            </a>
            <a class="mui-tab-item" id ="seller-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单管理</span>
            </a>
            <a class="mui-tab-item mui-active" href="#home-content" id="seller-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">商家主页</span>
            </a>
        </nav>   
        <div class="home-content mui-active" id="home-content">
			<div class="home-top">
           		 <!-- 头像和名字在页面的显示 -->
                <div class="home-top-usermsg">
                    <div class="usermsg-img">
                        <img src="buyerstyle/img/headimg.jpeg" />
                    </div>
                    <a href="home-msgmod.php">LILI ></a>
                </div> 
                <div class="talk-div" onclick="window.location.href='home-talkbox.php'">
                	<img src="buyerstyle/img/conver1.png"/>
                </div>
            </div>
            <ul class="home-orderManage mui-table-view" style="margin-bottom: 10px;"> 
           		<li class="mui-table-view-cell mui-collapse-content">
           			<a class="mui-navigate-right" href="admin.php?controller=sellerhome&method=location_orderForm">全部订单</a>
           		</li>  
           		<li class="" style="height: 43px;line-height: 43px;">
           			<ul class="order-detail">
           				<a href="" class="detail-item"><li>已完成</li></a>
           				<a href="" class="detail-item"><li>已发货</li></a>
           			</ul>
           		</li>
            </ul> 
            <div class="home-list">
                <ul class="mui-table-view list-myfunc">
                    <li class="mui-table-view-cell mui-collapse-content">
                        <a class="mui-navigate-right" href="home-myAccount.php">我的账户</a>
                    </li>
                    <li class="mui-table-view-cell mui-collapse-content">
                        <a class="mui-navigate-right" href="">认证信息</a>
                    </li>
                    <li class="mui-table-view-cell mui-collapse-content">
                        <a class="mui-navigate-right" href="store-set.php">其他设置</a>
                    </li>
                </ul>
            </div>	  	
        </div>
	</body>
	<?php echo '<script'; ?>
 src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		mui.init();
		//		选项卡跳转页面
		document.getElementById("seller-commodity-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellercommodity&method=index";
		});
		document.getElementById("seller-order-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellerorder&method=index";
		});
	<?php echo '</script'; ?>
>	
</html><?php }
}
