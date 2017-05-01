<?php
/* Smarty version 3.1.31, created on 2017-04-28 03:52:53
  from "D:\wamp\www\Bibased\mobile\tpl\seller\seller-order-detail.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5902bc95a418a7_20831926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9f9bf28b0baa7acb53736fd3bdd9abaf4f2b2e8' => 
    array (
      0 => 'D:\\wamp\\www\\Bibased\\mobile\\tpl\\seller\\seller-order-detail.php',
      1 => 1493350921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5902bc95a418a7_20831926 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php ';?>header("Content-type: text/html; charset=utf-8"); <?php echo '?>';?>
<html>
	<head>
		<title>订单详情</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-order.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body> 
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">订单详情</h1>
	 	 </header> 
	 	 <div class="mui-content mui-scroll-wrapper"id="sub-wrapper">
	          <div class="mui-scroll"style="padding-bottom: 50px;">
	          	<div class="sub-content">
					<ul class="mui-table-view">
					    <li class="mui-table-view-cell">
					        <a class="mui-navigate-right">
					        	<p class="way-sub">是否已付款</p>
					        	<p class="way-txt"id="way-txt">已在线支付</p>
					        </a>
					    </li>
					</ul>
					<ul class="mui-table-view">
					    <li class="mui-table-view-cell">
					      <span class="simg"></span>
					      <span class="stxt">家常菜馆</span> 
					    </li>
					    <li class="mui-table-view-cell smenu">
					        <p style="text-align:left;">苦瓜炒蛋</p>
					        <p>x2</p>
					        <p>¥20</p>
					    </li>
					    <li class="mui-table-view-cell smenu">
					        <p style="text-align:left;">茄子炒肉</p>
					        <p>x2</p>
					        <p>¥20</p>
					    </li>
					</ul>
					<ul class="mui-table-view">
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right">
								<span class="meal-num">用餐人数</span>
								<p class="meal-txt"id="meal-txt">2人</p>
							</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right"id="remark">
								<span class="meal-num">备注</span>
								<p class="meal-txt"id="meal-like">不吃辣</p>
							</a>
						</li>
					</ul>		
			</div>
		</div>
	</div>
	<div class="taking-sure">确认接单</div>
</body>
	<?php echo '<script'; ?>
 src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		//滚动
			mui('.mui-scroll-wrapper').scroll({
				deceleration:0.0005,
				scrollY: true,
				bounce: false,
				indicators:true
			});
	<?php echo '</script'; ?>
>
	
</html><?php }
}
