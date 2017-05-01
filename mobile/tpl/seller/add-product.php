<?php 

header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>商品添加</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/apply-page.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">新建商品</h1>
	    </header>
	    <div class="mui-content">
	    	<form action="admin.php?controller=sellercommodity&method=add_newProduct&operation=add" method="post" enctype="multipart/form-data" name="newcommodityform">
	    		<div class="photo-add">
		    		<div class="photo-detail">	
		    			<input type="file" name="upload-photo" id="upload-photo" value=""/>
		    			<img id="new-photo" src="buyerstyle/images/add-photo.png"/>
		    			<span class="up-left"></span>
			    		<span class="up-right"></span>
			    		<span class="down-left"></span>
			    		<span class="down-right"></span>
		    		</div>
		    	</div>
		    	<ul class="mui-table-view" style="margin-bottom: 51px;">
		    		<li class="mui-table-view-cell new-built">
				        <p class="built-name">商品类型</p>
				        <a style="width:70%;float: right;margin: -5px -15px;" href="#commodity-kind">
				        	<input style="width:100%;" type="text" name="commodity-type" id="commodity-type" value="" placeholder="请输入商品类型"/>
				        </a>
				    </li>
				     <li class="mui-table-view-cell new-built display_none" id="product-type">
	           			<a class="mui-navigate-right" href="#" onclick="selectKind()" style="margin: -5px -15px;text-align: left;color: #767676;font-size: 1.1em;">
	           				农产品分类
	           				<input type="text" id="agr-kind" name="agr-kind" value="{$defaulttype}" style="border:none;float: right;margin-right: 17px;color:#000;font-size: 16px;width:50%;">
	           			</a>
	           		</li>  
				    <li class="mui-table-view-cell new-built">
				        <p class="built-name">商品名称</p>
				        <input type="text" name="commodity-name" id="commodity-name" value="" placeholder="请输入商品名称"/>
				    </li>
				     <li class="mui-table-view-cell new-built">
				         <p class="built-name">商品数量</p>
				        <input type="text" name="commodity-remain" id="commodity-remain" value="" placeholder="100"/>
				    </li>
				    <li class="mui-table-view-cell room-num display_none" id="room-num">

				    </li>
				    <li class="mui-table-view-cell new-built">
				         <p class="built-name">商品价格</p>
				        <input type="text" name="commodity-price" id="commodity-price" value="" placeholder="10.00"/>
				    </li>
				</ul>
				<input type="hidden" value="" name="room-no" id="room-no">
				<input type="hidden" value="" name="agr-hotel" id="agr-hotel">
				<div class="first-footer">
	            	<button type="button" class="first-location-next" id="location-next">完成</button>
	        	</div>
	    	</form>
	    </div>

	    <div id="commodity-kind" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view aaaa">
				<li class="mui-table-view-cell">
					<a href="#">农产品</a>
				</li>
				<li class="mui-table-view-cell">
					<a href="#">酒店房间</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#commodity-kind"><b>取消</b></a>
				</li>
			</ul>
		</div>
	   
	</body>
	<script src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="buyerstyle/js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="buyerstyle/js/func.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
	var roomBelongs=document.getElementById('room-num');
	var productType=document.getElementById('product-type');
		mui(".aaaa").on('tap','.mui-table-view-cell',function(){
			var uploadKind=this.children[0].innerHTML;
			document.getElementById('commodity-type').value=uploadKind;

			if(uploadKind=="农产品"){
				//商店农产品添加
				productType.classList.remove('display_none');
				roomBelongs.classList.add('display_none');
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
					if(document.getElementById('upload-photo').value==""){
						alert("请选择商品图片");
						return false;
					}else if(AgrName.value==""){
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
				//酒店房间商品添加
				document.getElementById('commodity-remain').value="";
				productType.classList.add('display_none');
				document.getElementById('agr-hotel').value="hotel";
				var roomTypeNum=document.getElementById('commodity-remain');
				var roomTypeName=document.getElementById('commodity-name');
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
					if(document.getElementById('upload-photo').value==""){
						alert("请选择商品图片");
						return false;
					}else if(roomTypeName.value==""){
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
							$("input[name='room-no']").attr("value",hotelroom.join(','));
							document.newcommodityform.submit();
						}
					}
				});
			}
			mui('#commodity-kind').popover('toggle');
		});

		$('#upload-photo').change(function(){
	   	  	var fil=this.files;
	   	    var reader=new FileReader();
	   	    reader.readAsDataURL(fil[0]);
	   	    reader.onload=function(){
	   	     	  document.getElementById('new-photo').setAttribute('src',reader.result);
	   	    }
   	  	});

		function selectKind(){
		   var iWidth = window.innerWidth+'px';
			var iHeight = window.innerHeight+'px';
			var iTop =0;
			var iLeft = 0;
			var nowType=document.getElementById('agr-kind').value;
			var win = window.open("admin.php?controller=sellercommodity&method=showpage&nowtype="+nowType,"弹出窗口", "width=" + iWidth + ", height=" + iHeight + ",top=" + iTop + ",left=" + iLeft + ",toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no,alwaysRaised=yes,depended=yes");
		}

	</script>
</html>