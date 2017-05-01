<?php
/* Smarty version 3.1.31, created on 2017-04-27 01:51:05
  from "D:\wamp\www\Bibased\mobile\tpl\seller\seller-commodity.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59014e89e8f178_00511024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42ee944ab57de3ae801f82b6aacaae0bce4a85f7' => 
    array (
      0 => 'D:\\wamp\\www\\Bibased\\mobile\\tpl\\seller\\seller-commodity.php',
      1 => 1493256783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59014e89e8f178_00511024 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 
';?>header("Content-type: text/html; charset=utf-8"); <?php echo '?>';?>
<html>
	<head>
		<title>商家商品管理页面</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body> 
        <nav class="mui-bar mui-bar-tab" id ="seller-item" style="height: 10%;">
            <a class="mui-tab-item mui-active" href="#commodity-content" id="seller-commodity-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">商品管理</span>
            </a>
            <a class="mui-tab-item" id ="seller-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单管理</span>
            </a>
            <a class="mui-tab-item" id="seller-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">商家主页</span>
            </a>
        </nav>
        <div class="commodity-content mui-active" id="commodity-content">
        	<div class="content-header">
        		<div class="shop-img">
        			<input type="file"  id="photo-select"/>
        			<img src="<?php echo $_smarty_tpl->tpl_vars['shopImg']->value;?>
"/>
        		</div>
        		<a href="admin.php?controller=sellercommodity&method=location_addCommodity" class="add-commodity">添加商品</a>
        		<div class="shop-name">
        			<span>
        				<?php echo $_smarty_tpl->tpl_vars['shopName']->value;?>

        			</span>
        		</div>
        	</div>
        	<div class="content-list mui-content mui-scroll-wrapper">
        		<div class="mui-scroll"  id="content-list">
        			
        		</div>
        		
        	</div>
        	<div id="left-card">
        		<span id="produce-manage" class="card-item select-menu">
        			农产品
        		</span>
        		<span id="hotel-manage" class="card-item">
        			住宿
        		</span>
        		<span id="left-span">商品</span>
        	</div>
        </div>
	</body>
	<?php echo '<script'; ?>
 src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="buyerstyle/js/jquery.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="buyerstyle/js/Move-1.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="buyerstyle/js/func.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		mui.init();
		//		选项卡跳转页面
		document.getElementById("seller-home-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellerhome&method=index";
		});
		document.getElementById("seller-order-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=sellerorder&method=index";
		});
		window.onload=function(){
			mui('.mui-scroll-wrapper').scroll({
				scrollY:true,
				deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
				indicators:false,
				bounce: false
			});
			produceManage();
//			滑动的菜单栏实现
			var leftSpan=document.getElementById("left-span");
			var flag=0;
			var leftCard=document.getElementById("left-card");
			leftSpan.addEventListener('tap',function(){
				if(flag==0){
					startMove(leftCard,'left',0);
					flag=1;
				}else{
					startMove(leftCard,'left',-80);
					flag=0;					
				}
			});
//			用ajax将不同的页面引入
			function produceManage(){
				mui.get('admin.php?controller=sellercommodity&method=ajaxProduct',{
				},function(data){
					document.getElementById('content-list').innerHTML=data;
					mui('.hotel-content').on('tap','.hotel-detail',function(){
						id=this.getAttribute('id');
						window.location.href="admin.php?controller=sellercommodity&method=location_reviseProduct&id="+id;   
					});
				},'html');	
			}
			
			function hotelManage(){
				mui.get('admin.php?controller=sellercommodity&method=ajaxHotel',{
				},function(data){
					document.getElementById('content-list').innerHTML=data;
					mui('.hotel-content').on('tap','.hotel-detail',function(){
						id=this.getAttribute('id');
						window.location.href="admin.php?controller=sellercommodity&method=location_reviseProduct&id="+id;
					});
				},'html');	
			}
			function removeStyle(){
				var cardItem=document.getElementsByClassName('card-item');
				for(var i=0;i<cardItem.length;i++){
					cardItem[i].classList.remove('select-menu');
				}
			}
			document.getElementById("hotel-manage").addEventListener('tap',function(){
				removeStyle();
				this.classList.add('select-menu');
				startMove(leftCard,'left',-80);
				flag=0;	
				hotelManage();
			});
			document.getElementById("produce-manage").addEventListener('tap',function(){
				removeStyle();
				this.classList.add('select-menu');
				startMove(leftCard,'left',-80);
				flag=0;	
				produceManage();
			});
		}
	<?php echo '</script'; ?>
>	
</html><?php }
}
