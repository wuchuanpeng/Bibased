<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>惠乡旅</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black"> 

		<link rel="stylesheet" href="buyerstyle/css/mui.min.css">
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/shoppage.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/shop.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/shop-interface.css"/>
	</head>

	<body id="body-content">
		<!-- 底部选项卡 --> 
        <nav class="mui-bar mui-bar-tab" id ="user-item" style="height: 10%;">
            <a class="mui-tab-item mui-active" href="#user-shop" id="user-shop-item">
                <span class="mui-icon mui-icon-home"></span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item" id ="user-order-item">
                <span class="mui-icon mui-icon-bars"></span>
                <span class="mui-tab-label">订单</span>
            </a>
            <a class="mui-tab-item" id="user-home-item">
                <span class="mui-icon mui-icon-person"></span>
                <span class="mui-tab-label">我的</span>
            </a>
        </nav>
        
        <!-- 店铺首页的主要内容 -->
        <div id="user-shop" class="mui-control-content mui-active">
        	<div class="user-shop-content">
        		
				<!--下拉刷新容器-->
				<div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="height: 90%;">
					<div class="mui-scroll pull-content">
						<!--轮播图-->
						<!--图片尺寸固定500*333-->
						<div id="slider" class="mui-slider">
							<div class="mui-slider-group mui-slider-loop">
								<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
								<div class="mui-slider-item mui-slider-item-duplicate">
									<a href="#"><img src="buyerstyle/img/yuantiao.jpg"></a>
								</div>
								<!-- 第一张 -->
								<div class="mui-slider-item">
									<a href="#"><img src="buyerstyle/img/shuijiao.jpg"></a>
								</div>
								<!-- 第二张 -->
								<div class="mui-slider-item">
									<a href="#"><img src="buyerstyle/img/muwu.jpg"></a>
								</div>
								<!-- 第三张 -->
								<div class="mui-slider-item">
									<a href="#"><img src="buyerstyle/img/cbd.jpg"></a>
								</div>
								<!-- 第四张 -->
								<div class="mui-slider-item">
									<a href="#"><img src="buyerstyle/img/yuantiao.jpg"></a>
								</div>
								<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
								<div class="mui-slider-item mui-slider-item-duplicate">
									<a href="#"><img src="buyerstyle/img/shuijiao.jpg"></a>
								</div>
							</div>
							<div class="mui-slider-indicator">
								<div class="mui-indicator mui-active"></div>
								<div class="mui-indicator"></div>
								<div class="mui-indicator"></div>
								<div class="mui-indicator"></div>
							</div>
						</div>
						<ul class="pullsort-item1" id="pull-sort1">
							<li class="item"><a class="shop-sort fontadd">综合排序</a></li>
							<li class="item"><a class="sale-sort">销量最高</a></li>
							<li class="item"><a class="distance-sort">距离最近</a></li>
						</ul>
						<!--数据列表-->
						<ul class="mui-table-view mui-table-view-chevron" id="shop-content">
							<li class="mui-table-view-cell aaaa">
								<a class="aaaa-content" style="padding-right:15px;">
									<img class="mui-media-object mui-pull-left shop-img" src="buyerstyle/img/headimg.jpeg">
									<div class="mui-media-body">
										<div class="clearfloat">
											<span class="shop-name">农家小馆</span>
											<span class="shop-distance">2.6km</span>
										</div>
										<div class="clearfloat">
											<span class="shop-con">月售350单</span>
											<!-- <span class="shop-spendtime">43分钟</span> -->
										</div>
										<div class="shop-star clearfloat">
			                    			<span class="star-word">评分:</span>
			                    			<span class="star-active"></span>
			                    			<span class="star-active"></span>
			                    			<span class="star-active"></span>
			                    			<span class="star-unactive"></span>
			                    			<span class="star-unactive"></span>
			                    		</div>
									</div>
									<div class="shop-discount">
										<p class="discount-item">新用户立减10元</p>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div> 
				<!--顶部搜索框和排序栏-->
				<header id="header-div1" class="mui-bar mui-bar-nav" style="background-color: rgba(255,255,255,0.7);">
					<div class="shop-top" id="shop-top">
						<span id="autoaddr">定位</span>
					</div>
					<input type="text" name="search1" id="search1" placeholder="输入商家或商店名称" />
				</header>
				<ul class="pullsort-item" id="pull-sort">
					<li class="item"><a class="shop-sort fontadd">综合排序</a></li>
					<li class="item"><a class="sale-sort">销量最高</a></li>
					<li class="item"><a class="distance-sort">距离最近</a></li>
				</ul>
				 <header id="header-div" class="mui-bar mui-bar-nav tophidden" style="background-color: rgba(255,255,255,0.9);">
					<input type="text" name="search" id="search" placeholder="请输入关键词"/>
					<input type="button" name="search-icon" id="search-icon" value="搜索"  disabled="disabled" style="background-color: #ccc;color: #fff;"/>
				</header>
        	</div>
        </div>
        <!--点综合排序弹出的顶部菜单-->
    	<div id="menu-wrapper" class="menu-wrapper hidden">
			<div id="menu" class="menu">
				<ul class="mui-table-view mui-table-view-inverted">
					<li class="mui-table-view-cell menu-css">
						<a class="bgchoose"><span>综合排序</span></a>
					</li>
					<li class="mui-table-view-cell menu-css">
						<a><span>评分最高</span></a>
					</li>
					<li class="mui-table-view-cell menu-css">
						<a><span>价格最低</span></a>
					</li>
				</ul>
			</div>
		</div>
		<div id="menu-backdrop" class="menu-backdrop"></div>  
		<iframe id="geoPage" width=0 height=0 frameborder=0  style="display:none;" scrolling="no"
                src="https://apis.map.qq.com/tools/geolocation?key=2LHBZ-GGK3F-XLRJH-JZ6JT-LSEDK-Q3BOY&referer=home">
        </iframe>
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script src="buyerstyle/js/jquery.js"></script>
	<script type="text/javascript">
		
		var gallery = mui('.mui-slider');
		gallery.slider({
		  interval:5000//自动轮播周期，若为0则不自动播放，默认为0；
		});
		  
		mui('.mui-scroll-wrapper').scroll({
			indicators: false //不显示滚动条
		});
		
   
		
//		选项卡跳转页面
		document.getElementById("user-home-item").addEventListener("tap",function(){
			window.location.href="admin.php?controller=userhome&method=index";
		});
		document.getElementById("user-order-item").addEventListener("tap",function(){
			window.location.href="orderN.php";
		});
		
		//监听shop-content下所有的aaaa的点击事件,跳转进入店铺
		mui("#shop-content").on("tap",".aaaa-content",function(){
			var id=this.getAttribute("id");//获取某个点击的mui-tab-item的id,进而获取当前div的id
			window.location.href="admin.php?controller=usershop&method=clickRestaurant";
        });
		
		var itemState=0;
//		监听点击了销量最高和距离最近的事件
		mui(".item").on("tap",".sale-sort",function(){
			itemState=1;
			checkItem();
		});
		mui(".item").on("tap",".distance-sort",function(){
			itemState=2;
			checkItem();
		});		
//		封装的对排序栏进行css样式
		function checkItem(){
			var fontcss1=document.getElementById("pull-sort1").getElementsByTagName("a");
			for (var i = fontcss1.length - 1; i >= 0; i--) {
				fontcss1[i].classList.remove("fontadd");			
			}
			fontcss1[itemState].classList.add("fontadd");
			var fontcss=document.getElementById("pull-sort").getElementsByTagName("a");
			for (var j = fontcss.length - 1; j >= 0; j--) {
				fontcss[j].classList.remove("fontadd");
			}
			fontcss[itemState].classList.add("fontadd");
		}
		
 
		function styleSet(id1,id2){
			document.getElementById(id1).classList.remove("tophidden");
			document.getElementById(id2).classList.add("tophidden");
		}
		//滚动到一定高度对排序栏操作
		var scroll = mui('.mui-scroll-wrapper').scroll();
		var width=window.innerWidth;
		scollheight=width*213/320-44;
		document.querySelector('.mui-scroll-wrapper').addEventListener('scroll',function (e) {
			var divhei=scroll.y;
			//如果滚动的高度超过了规定高度就将底部的排序栏隐藏掉
		　　if(Math.abs(divhei)>scollheight){
				styleSet("pull-sort","pull-sort1");
				styleSet("header-div","header-div1");
				document.getElementById("pullrefresh").style.paddingTop="30px";
			}else{
				styleSet("pull-sort1","pull-sort");
				styleSet("header-div1","header-div");
				document.getElementById("pullrefresh").style.paddingTop="0";
			}
			checkItem();
		});	
		
		
		//点击首页的搜索框进行搜索的跳转
		document.getElementById("search1").addEventListener("tap",function(){
			styleSet("header-div1","header-div");
			mui('.mui-scroll-wrapper').scroll().scrollTo(0,-scollheight-1,1000);
			mui('#pullrefresh').pullRefresh().scrollTo(0,-scollheight,1000);
			
		});
		//点击排序栏将页面店铺排列展示出来,滚动
		document.getElementById("pull-sort1").addEventListener("tap",function(){
			mui('.mui-scroll-wrapper').scroll().scrollTo(0,-scollheight-1,1000);
			mui('#pullrefresh').pullRefresh().scrollTo(0,-scollheight,1000);
		});
		
		
//		对搜索框的input进行事件监听,如果输入框中有内容则点亮搜索按钮
		var searchiInput=document.getElementById("search");
		var searchIcon=document.getElementById("search-icon");
		searchiInput.addEventListener("input",function(){
			searchIcon.style.backgroundColor="#ffd565";
			searchIcon.style.color="#000";
			searchIcon.removeAttribute("disabled");
			if(searchiInput.value==""){
				searchIcon.style.backgroundColor="#ccc";
				searchIcon.style.color="#fff";
				searchIcon.disabled="disabled";
			}
		});
		
		
		

	</script>
	<script type="text/javascript">
		//下拉刷新时将搜索栏隐藏
		var headDiv1=document.getElementById("header-div1");
		mui.init({
			pullRefresh: {
				container: '#pullrefresh',
				down: {
					callback: hidhead
				},
				up: {
					contentrefresh: '正在加载...',
					callback: pullupRefresh
				}
			}
		});
		
		function hidhead(){
			headDiv1.style.display="none"; 
			pulldownRefresh();
		}
		
		//下拉刷新具体业务实现
		function pulldownRefresh() {
			setTimeout(function() {
				mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
				headDiv1.style.display="block";
			}, 1500);
		}
		var count = 0;
		//上拉加载具体业务实现
		function pullupRefresh() {
			setTimeout(function() {
				mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
				var table = document.body.querySelector('.mui-table-view');
				var cells = document.body.querySelectorAll('.aaaa');
				
				for (var i = cells.length, len = i + 20; i < len; i++) {
					var li = document.createElement('li');
					li.className = 'mui-table-view-cell mui-media aaaa';
					li.id="shopcontent"+i;
					li.innerHTML = '<a class="aaaa-content" style="padding-right:15px;">'+
										'<img class="mui-media-object mui-pull-left shop-img" src="buyerstyle/img/headimg.jpeg">'+
										'<div class="mui-media-body">'+
											'<div class="clearfloat">'+
												'<span class="shop-name">山水怡情'+(i+1)+'</span>'+
												'<span class="shop-distance">2.6km</span>'+
											'</div>'+
											'<div class="clearfloat">'+
												'<span class="shop-con">月售350单</span>'+
												// '<span class="shop-spendtime">43分钟</span>'+
											'</div>'+
											'<div class="shop-star clearfloat">'+
				                    			'<span class="star-word">评分:</span>'+
				                    			'<span class="star-active"></span>'+
				                    			'<span class="star-active"></span>'+
				                    			'<span class="star-active"></span>'+
				                    			'<span class="star-unactive"></span>'+
				                    			'<span class="star-unactive"></span>'+
				                    		'</div>'+
										'</div>'+
										'<div class="shop-discount">'+
											'<p class="discount-item">满10减3</p>'+
											'<p class="discount-item">新用户立减10元</p>'+
										'</div>'+
									'</a>';
					table.appendChild(li);
				}
			}, 1500);
		}
	</script>
	<script type="text/javascript">
		var menuWrapper = document.getElementById("menu-wrapper");
		var menuWrapperClassList = menuWrapper.classList;
		
		mui(".item").on("tap",".shop-sort",function(){
			itemState=0;
			checkItem();
			toggleMenu();
		});
		
		//下沉菜单中的点击事件
		mui('#menu').on('tap', 'a', function() {
			var as=document.getElementById("menu").getElementsByTagName("a");
			for (var i = as.length - 1; i >= 0; i--) {
				as[i].classList.remove("bgchoose");
			}
			this.classList.add("bgchoose");
			//将选择后的排序方式显示出来
			var sortshow=document.getElementsByClassName("shop-sort");
			sortshow[0].innerHTML=this.innerHTML;
			sortshow[1].innerHTML=this.innerHTML;
			toggleMenu();
		});
		
		var busying = false;
		
//		重复点击打开关闭下沉菜单
		function toggleMenu() {
			if (busying) {
				return;
			}
			busying = true;
			if (menuWrapperClassList.contains('mui-active')) {
				document.body.classList.remove('menu-open');
				menuWrapper.className = 'menu-wrapper fade-out-up animated';
				setTimeout(function() {
					menuWrapper.classList.add('hidden');
				}, 500);
			} else {
				document.body.classList.add('menu-open');
				menuWrapper.className = 'menu-wrapper fade-in-down animated mui-active';
			}
			setTimeout(function() {
				busying = false;
			}, 500);
		}
	</script>
	<script type="text/javascript">
		document.getElementById("shop-top").addEventListener('tap',function(){
			window.location.href="http://apis.map.qq.com/tools/locpicker?search=1&type=0&backurl=http://localhost/Bibased/mobile/admin.php?controller=usershop&method=index&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77&referer=myapp";
		});
		function getRequest() {   
	       var url = window.location.search; //获取url中"?"符后的字串   
	       var theRequest = new Object();   
	       if (url.indexOf("?") != -1) {   
	          var str = url.substr(1);   
	          strs = str.split("&");   
	          for(var i = 0; i < strs.length; i ++) {   
	             theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]); 
	          }   
	       }   
	       return theRequest;   
	    }
			
		var Request = new Object(); 
		Request = getRequest(); 
		var name,latng,addr,city; //具体地址,坐标,地址,城市
		name = Request['name']; 
		latng = Request['latng']; 
		addr = Request['addr']; 
		city = Request['city'];  

		window.addEventListener('message', function(event) { 
			    // 接收位置信息
			    var loc = event.data; 
			    if(name=='undefined'){
					document.getElementById("autoaddr").innerHTML=loc.city;
				}else{
					document.getElementById("autoaddr").innerHTML=city;
				}        
			}, false);
	
	</script>
</html>