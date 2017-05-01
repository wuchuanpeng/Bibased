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
		<header class="mui-bar mui-bar-nav" style="background-color: #fff;">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
			<h1 class="mui-title">新增地址</h1>
		</header>
		<div class="addr-input mui-input-row" style="width: 100%;">
			<div class="addr-input-div">
				<div class="addr-city-div">
					<input type="text" id="addr-city" value="" class="mui-input">
				</div>
				<div class="addr-detail-div">
					<input type="text" id="addr-detail" class="mui-input-clear mui-input" placeholder="请输入收货地址">
				</div>
			</div>
			<div class="mui-input-group name-tel-msg">
				<div class="mui-input-row">
			    	<label>收货人</label>
			        <input type="text" id="modaddr-name" class="mui-input-clear mui-input" value="LILI">
			    </div>
			    <div class="mui-input-row">
			    	<label>联系电话</label>
			        <input type="text" id="modaddr-tel" class="mui-input-clear mui-input" value="1873218638">
			    </div>
			</div>
		</div>
		<div class="addr-content" style="padding-top: 165px;">
			<button id="autoregistration" onclick="autoAddr()"><span>点击定位当前位置</span></button>
			<div id="addr-show">
			</div>
		</div>
		<div class="addr-add">
			<button id="btn-newaddr" onclick="addradd()" disabled="disabled" style="background-color: #ccc; color: #FFF;">新增地址</button>
		</div>
		
		<iframe id="geoPage" width=0 height=0 frameborder=0  style="display:none;" scrolling="no"
                src="https://apis.map.qq.com/tools/geolocation?key=2LHBZ-GGK3F-XLRJH-JZ6JT-LSEDK-Q3BOY&referer=home">
        </iframe>
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script src="buyerstyle/js/jquery.js"></script>
	<script type="text/javascript" src="https://3gimg.qq.com/lightmap/components/geolocation/geolocation.min.js"></script>
	<script src="buyerstyle/js/mui.picker.js"></script>
	<script src="buyerstyle/js/mui.poppicker.js"></script>
	<script src="buyerstyle/js/city.data.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var btnadd=document.getElementById("btn-newaddr");
		var inputdetail=document.getElementById("addr-detail")
		function lightAdd(){
			btnadd.removeAttribute("disabled");
			btnadd.style.backgroundColor="#ffd565";
			btnadd.style.color="#000";
			
		}
		inputdetail.addEventListener("input",function(){
			lightAdd();
			if(inputdetail.value==""){
				btnadd.disabled="disabled";
				btnadd.style.backgroundColor="#ccc";
				btnadd.style.color="#fff";
			}
		});
		function addradd(){
			mui.toast("已存");
		}
	</script>
	<script type="text/javascript">
		var geolocation = new qq.maps.Geolocation("OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77", "myapp");
        var options = {
        	timeout: 8000
        };
        function autoAddr(){
        	lightAdd();
        	geolocation.getLocation(showPosition, showErr, options);
        }
        function showPosition(position) {
            document.getElementById("addr-detail").value =  position.addr;
            document.getElementById("addr-city").value = position.province+"-"+ position.city;
        };
        function showErr() {
            document.getElementById("addr-show").appendChild(document.createElement('p')).innerHTML = "定位失败！";
        };
        
        window.addEventListener('message', function(event) {
		    // 接收位置信息
		    var loc = event.data; 
		    console.log('location', loc);   
		    document.getElementById("addr-city").value=loc.province+"-"+loc.city;
		}, false); 
	</script>
	<script type="text/javascript">
	mui.ready(function() {
		var cityPicker = new mui.PopPicker({
			layer: 2
		});
		cityPicker.setData(cityData);
		var showCityPickerButton = document.getElementById('addr-city');
		var cityResult = document.getElementById('addr-city');
		showCityPickerButton.addEventListener('tap', function(event) {
			cityPicker.show(function(items) {
				cityResult.value=(items[0] || {}).text+"-"+(items[1] || {}).text;
				//返回 false 可以阻止选择框的关闭
				//return false;
			});
		}, false);
	});
		
	</script>
</html>