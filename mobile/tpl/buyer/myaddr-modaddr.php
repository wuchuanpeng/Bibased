<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/mui.picker.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/mui.poppicker.css"/>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
	        <h1 class="mui-title">详细资料</h1>
	        <a href="javascript:keepmodaddr()" id="btn-modaddr"><span>保存</span></a>
	    </header>
	    <div class="mui-content">
			<form class="mui-input-group">
			    <div class="mui-input-row">
			    	<label>收货人</label>
			        <input type="text" id="modaddr-name" class="mui-input-clear mui-input" value="LILI">
			    </div>
			    <div class="mui-input-row">
			    	<label>联系电话</label>
			        <input type="text" id="modaddr-tel" class="mui-input-clear mui-input" value="1873218638">
			    </div>
			    <div class="mui-input-row">
			    	<label>所在地区</label>
			        <input type="text" id="modaddr-city" class="mui-input-clear mui-input" value="湖南省-株洲市">
			    </div>
			    <div class="mui-input-row">
			    	<label>详细地址</label>
			        <input type="text" id="modaddr-detail" class="mui-input-clear mui-input" value="天元区湖南工业大学">
			    </div>
			</form>
	    </div>
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script src="buyerstyle/js/jquery.js"></script>
	<script src="buyerstyle/js/mui.picker.js"></script>
	<script src="buyerstyle/js/mui.poppicker.js"></script>
	<script src="buyerstyle/js/city.data.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.init()
		mui.ready(function() {
			var cityPicker = new mui.PopPicker({
				layer: 2
			});
			cityPicker.setData(cityData);
			var showCityPickerButton = document.getElementById('modaddr-city');
			var cityResult = document.getElementById('modaddr-city');
			showCityPickerButton.addEventListener('tap', function(event) {
				cityPicker.show(function(items) {
					cityResult.value=(items[0] || {}).text+"-"+(items[1] || {}).text;
					//返回 false 可以阻止选择框的关闭
					//return false;
				});
			}, false);
		});
	</script>
	<script type="text/javascript">
		function keepmodaddr(){
			mui.toast("保存");
		}
	</script>
</html>