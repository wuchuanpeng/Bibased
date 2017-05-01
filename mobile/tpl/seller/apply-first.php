<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/apply-page.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link href="../css/mui.picker.css" rel="stylesheet" />
		<link href="../css/mui.poppicker.css" rel="stylesheet" />
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">第一步 店铺信息</h1>
	        <a href="apply-settlement.php"><img src="images/home.png" class="head-img"></a>
	    </header>
		<div class="first-content" style="padding-top: 44px;">
			<div class="first-tips">
				<span class="first-tips-content">只需3步,轻松开店</span>
			</div>
			<div class="shop-addr">
				<div class="shop-addr-name">
					<span>店铺地址</span>
				</div>
				<ul class="mui-table-view shop-addr-sure">
	                <li class="mui-table-view-cell mui-collapse-content">
	                    <a class="mui-navigate-right" href="#" id="province-city" style="height: 43px;font-size: 15px;color: #848890;"></a>
	                </li>
	                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                    <input type="text" name="specific-address" id="specific-address" value="" style="height: 43px;border: none;margin-bottom: 0;font-size: 14px;"/>
	                </li>
	                 <li class="mui-table-view-cell mui-collapse-content">
	                    <a href="javascript:autoAddrSure()" style="height: 43px;">已添加地图标记</a>
	                </li>
	            </ul>
			</div>
			<ul class="mui-table-view shop-owner-msg" style="margin-top: 10px;">
                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
                	<div class="mui-input-row">
						<label class="shopowner-name">联系人</label>  
						<input class="shopowner-tel" type="text" placeholder="请输入真实姓名">
					</div>
                </li>
                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
                    <div class="mui-input-row">
						<label class="shopowner-name">联系人电话</label>
						<input class="shopowner-tel" type="text" placeholder="输入联系人电话">
					</div>
                </li> 
	        	<span id="warn-one" class="first-shopowner-warn" style=""><span class="first-span">!</span><span id="second-span">请填写联系人</span></span>
            </ul>
           <ul class="mui-table-view shop-photo-upload" style="margin-top: 20px;">
                <li class="mui-table-view-cell mui-collapse-content">
                    <a class="mui-navigate-right" href="first-photoUpload.php" id="shop-photos" style="font-size: 15px;color: #848890;">店铺照片<span class="photo-state">已上传</span></a>
                </li>
            </ul>
            <div class="first-footer">
            	<a class="first-location-next" href="apply-second.php">下一步</a>
            </div>
		</div>
		
	</body>
	<script src="../js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/jquery.js"></script>
	<script src="js/getUrlAddr.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/mui.picker.js"></script>
	<script src="../js/mui.poppicker.js"></script>
	<script src="../js/city.data-3.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.init();
		mui.ready(function() {
			//地址选择器
			var cityPicker = new mui.PopPicker({
				layer: 3
			});
			cityPicker.setData(cityData3);
			var showCityPickerButton = document.getElementById('province-city');
			var cityResult = document.getElementById('province-city');
			showCityPickerButton.addEventListener('tap', function(event) {
				cityPicker.show(function(items) {
					cityResult.innerHTML = (items[0] || {}).text + "-" + (items[1] || {}).text + "-" + (items[2] || {}).text;
					//返回 false 可以阻止选择框的关闭
					//return false;
				});
			}, false);
		});
		
		//通过地图对商家地址定位
		function autoAddrSure(){
			window.location.href="http://apis.map.qq.com/tools/locpicker?search=1&type=0&backurl=http://www.zhishangpark.com/TP_test/Application/Home/View/MT/seller/apply-first.php&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77&referer=myapp";	
		}
		var shopaddr=new Array();
		shopaddr=getAddrData();
		
	    if(shopaddr[2]==undefined){
			document.getElementById("province-city").innerHTML="";
			document.getElementById("specific-address").value="";
		}else{
			document.getElementById("province-city").innerHTML=shopaddr[0];
			document.getElementById("specific-address").value=shopaddr[2];
		}        
	</script>
</html>