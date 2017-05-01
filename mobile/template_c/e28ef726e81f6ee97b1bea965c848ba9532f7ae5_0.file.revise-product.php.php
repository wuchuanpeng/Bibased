<?php
/* Smarty version 3.1.31, created on 2017-04-27 09:59:52
  from "D:\wamp\www\Bibased\mobile\tpl\seller\revise-product.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5901c118a9f0b2_00042726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e28ef726e81f6ee97b1bea965c848ba9532f7ae5' => 
    array (
      0 => 'D:\\wamp\\www\\Bibased\\mobile\\tpl\\seller\\revise-product.php',
      1 => 1493287153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5901c118a9f0b2_00042726 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php ';?>header("Content-type: text/html; charset=utf-8"); <?php echo '?>';?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>商品修改</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/apply-page.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<style type="text/css">
			#commodity-delete{
				color: #fff;
				float: right;
				font-size: 16px;
				margin-top: 12px;
			}
		</style>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">修改商品</h1>
	        <span id="commodity-delete" onclick="delete_commod()">删除</span>
	    </header>
	    <div class="mui-content">
	    	<form action="admin.php?controller=sellercommodity&method=add_newProduct&operation=mod" method="post" enctype="multipart/form-data" name="newcommodityform">
		    	<div class="photo-add">
		    		<div class="photo-detail">	
		    			<input type="file" value="<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
" id="upload-photo" name="upload-photo"/>
		    			<img id="new-photo" src="<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
"/>
		    			<span class="up-left"></span>
			    		<span class="up-right"></span>
			    		<span class="down-left"></span>
			    		<span class="down-right"></span>
		    		</div>
		    	</div>
		    	<ul class="mui-table-view" style="padding-bottom: 51px;">
		    		<li class="mui-table-view-cell new-built">
				        <p class="built-name">商品类型</p>
				        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['commodType']->value;?>
" id="commodity-type" readonly/>
				    </li>
				    <?php if ($_smarty_tpl->tpl_vars['commodType']->value == "农产品") {?>
				     <li class="mui-table-view-cell new-built" id="product-type">
	           			<a class="mui-navigate-right" href="#" onclick="selectKind()" style="margin: -5px -15px;text-align: left;color: #767676;font-size: 1.1em;">
	           				农产品分类
	           				<input type="text" id="agr-kind" name="agr-kind" value="<?php echo $_smarty_tpl->tpl_vars['defaultKind']->value;?>
" style="border:none;float: right;margin-right: 17px;color:#000;font-size: 16px;width:50%;">
	           			</a>
	           		</li> 
	           		<?php }?> 
				    <li class="mui-table-view-cell new-built">
				        <p class="built-name">商品名称</p>
				        <input type="text" name="commodity-name" id="commodity-name" value="<?php echo $_smarty_tpl->tpl_vars['defaultName']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['defaultName']->value;?>
"/>
				    </li>
				    <li class="mui-table-view-cell new-built">
				         <p class="built-name">商品价格</p>
				        <input type="text" name="commodity-price" id="commodity-price" value="<?php echo $_smarty_tpl->tpl_vars['defaultPrice']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['defaultPrice']->value;?>
"/>
				    </li>
				     <li class="mui-table-view-cell new-built">
				         <p class="built-name">商品数量</p>
				        <input type="text" name="commodity-remain" id="commodity-remain" value="<?php echo $_smarty_tpl->tpl_vars['defaultRemain']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['defaultRemain']->value;?>
"/>
				    </li>
				    <?php if ($_smarty_tpl->tpl_vars['commodType']->value == "酒店房间") {?>
				    <li class="mui-table-view-cell room-num" id="room-num">
				    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['defaultRoomNum']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
				    	<input type='text' class="input-roomnum" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" placeholder='<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
'>
				    	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				    </li>
				    <?php }?>
				</ul>		
				<input type="hidden" value="" name="room-no" id="room-no">
				<input type="hidden" value="" name="agr-hotel" id="agr-hotel"> 
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
" name="default-img" id="default-img"> 
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['defaultId']->value;?>
" name="commodity-id" id="commodity-id">   
				 <div class="first-footer">
		            <button type="button" class="first-location-next" id="location-next">完成</button>
		        </div>
	        </form>
        </div>
	</body>
	<?php echo '<script'; ?>
 src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="buyerstyle/js/jquery.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="buyerstyle/js/func.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
	//商品分类信息选择
		function selectKind(){
		   var iWidth = window.innerWidth+'px';
			var iHeight = window.innerHeight+'px';
			var iTop =0;
			var iLeft = 0;
			var nowType=document.getElementById('agr-kind').value;
			var win = window.open("admin.php?controller=sellercommodity&method=showpage&nowtype="+nowType,"弹出窗口", "width=" + iWidth + ", height=" + iHeight + ",top=" + iTop + ",left=" + iLeft + ",toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no,alwaysRaised=yes,depended=yes");
		}
//照片上传
		$('#upload-photo').change(function(){
	   	  	var fil=this.files;
	   	    var reader=new FileReader();
	   	    reader.readAsDataURL(fil[0]);
	   	    reader.onload=function(){
	   	     	  document.getElementById('new-photo').setAttribute('src',reader.result);
	   	    }
   	  	});

   	  	function delete_commod(){
   	  		doajax("admin.php?controller=sellercommodity&method=delete_commodity",{
   	  			id:$("#commodity-id").val(),
   	  			type:$("#agr-hotel").val()
   	  		},"json",function(msg){
   	  			if(msg){
   	  				window.location.href="admin.php?controller=sellercommodity&method=index";
   	  			}
   	  		});
   	  	}

		var commodityType=document.getElementById('commodity-type').value;
		if(commodityType=="农产品"){
			document.getElementById('agr-hotel').value="product";//隐藏表单域 提交的是农产品信息还是酒店信息
			var AgrName=document.getElementById('commodity-name');
			var AgrNum=document.getElementById('commodity-remain');

			//农产品名称重复判断
			AgrName.addEventListener('change',function(){
				var newAgrName=AgrName.value;
				doajax("admin.php?controller=sellercommodity&method=ajaxAgrNameJudge", {
					newAgrName:newAgrName
				}, "json", function(msg){
					if(msg['is_exist']){
						mui.toast("该商品已存在");
					}
				});
			});

			document.getElementById('location-next').addEventListener('tap',function(){
				var priceAgr=document.getElementById('commodity-price');
				var hotelroom=new Array();
				if(AgrName.value==""){
					alert("请输入商品名称");
					return false;
				}else if(isNaN(AgrNum.value)||AgrNum.value==""){
					alert("商品数量填写错误");
					return false;
				}else if(isNaN(priceAgr.value)||priceAgr.value==""){
					alert("价格填写错误")
					return false;
				}else{
					document.newcommodityform.submit();
				}
			});

		}else{
			document.getElementById('agr-hotel').value="hotel";
			var roomTypeNum=document.getElementById('commodity-remain');
			var roomTypeName=document.getElementById('commodity-name');
			var submitState=true;

			//监听房间数量的变化填写房间号
			roomTypeNum.addEventListener('change',function(){
				//添加具体房间号码
				var parentLi = document.body.querySelector('.room-num');
				var childs=parentLi.childNodes;
				//清空原来的子节点
				if(childs.length!=0){
					for(var i = childs.length - 1; i >= 0; i--) { 
					  parentLi.removeChild(childs[i]); 
					}
				}

				var fragment=document.createDocumentFragment();
				var roomNum=roomTypeNum.value;
				for(var i=0;i<roomNum;i++){
					var inputtext=document.createElement('input');
					inputtext.type='text';
					inputtext.placeholder='请输入房间号码';
					inputtext.className="input-roomnum";
					fragment.appendChild(inputtext);
				}
				document.getElementById('room-num').classList.remove('display_none');
				parentLi.appendChild(fragment);
			});

			//酒店新房间类型名称重复判断
			roomTypeName.addEventListener('change',function(){
				var newHotelName=roomTypeName.value;
				doajax("admin.php?controller=sellercommodity&method=ajaxHotelNameJudge", {
					newHotelName:newHotelName
				}, "json", function(msg){
					if(msg['is_exist']){
						mui.toast("该商品已存在");
					}
				});
			});
			//js判空和提交数据到后台
			document.getElementById('location-next').addEventListener('tap',function(){
				var pricehotel=document.getElementById('commodity-price');
				var flag=0;
				var roomNoMsg=document.getElementsByClassName('input-roomnum');
				var hotelroom=new Array();
				if(roomTypeName.value==""){
					alert("请输入商品名称");
					return false;
				}else if(isNaN(roomTypeNum.value)||roomTypeNum.value==""){
					alert("房间数量填写错误");
					return false;
				}else if(isNaN(pricehotel.value)||pricehotel.value==""){
					alert("价格填写错误")
					return false;
				}else{
					//将房间信息以数组形式保存到隐藏表单域
					for(var i=0;i<roomNoMsg.length;i++){
						if(roomNoMsg[i].value){
							hotelroom[i]=roomNoMsg[i].value;
							flag=1;
						}else{
							alert("请正确填写房间号码");
							flag=0;
							break;
						}	
					}
					if(flag==1){
						doajax("admin.php?controller=sellercommodity&method=delete_defaultRoom",{
							rtid:$("#commodity-id").val()
						},"json",function(msg){
							if(!msg){
								submitState=false;
							}
						});
						console.log(submitState);
						if(submitState){
							$("input[name='room-no']").attr("value",hotelroom.join(','));
							document.newcommodityform.submit();
						}
					}	
				}
			});
		}
	<?php echo '</script'; ?>
>
</html><?php }
}
