<?php header("Content-type: text/html; charset=utf-8"); ?>
<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/restaurant.css"/>
		<style>
			.mui-row.mui-fullscreen>[class*="mui-col-"] {
				height: 100%;
			}
			
			.mui-col-xs-3,
			.mui-col-xs-9 {
				overflow-y: auto;
				height: 100%;
			}
			
			 .mui-segmented-control .mui-control-item {
				line-height: 50px;
				width: 100%;
			}
			
			 .mui-control-content {
				display: block;
			}
			
			 .mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active {
				background-color: #fff;
			}
			#wrapper{
                width:100%;
                height:100%;
                position:absolute;
                z-index:1;
			}
			#scroller{
				 width:100%;
                height:100%;
			}
		</style>
	</head>
	<body>	
		<div class="mui-content">
			<header class="bar-header">
			    <a class="mui-icon mui-icon-arrowleft mui-pull-left left-back mui-action-back"></a>
			    <h1 class="res-title">{$sellerInfo.S_ShopName}</h1>
<!--			    <span class="search-icon"></span> -->
			</header>
			<div class="res-bg"id="res-bg">
		  	   <div class="res-info"id="res-info">
			  	   	<div id="info-res">
				  	   	    <a class="res-detail clearfloat" id="res-detail" href="javascript:;">
				  	   	  	<div class="info-img" id="info-img">
					  	   	  	<img src="{$sellerInfo.S_ShopImgUrl}"/>
				  	   	  	</div>
						    	<span class="res-txt">{$sellerInfo.S_ShopName}</span>
						    	<span></span>
						    	<span></span>
				  	   	    </a>
				    	<div id="collect" class="clearfloat">
				    		<span class="collect-star"id="collect-starx"></span>
				    	    <p class="collect" id="collect-txt">收藏</p>
				    	</div>
			  	   	</div>
			    </div>    
<!--			    <a href="restaurant-detail.php"class="res-activity">-->
			    <a href="javascript:void(0);"class="res-activity" id = "discountInfo">

			    </a>
		    </div>
		   
		    <div style="background-color: #fff;">
					 <div class="res-thrtab" id="res-thrtab2">
				 	 		<a class="control-item item-active common">农产品</a>
							<a class="control-item" id="res-hotel">住宿</a>
				 	</div>  
			 </div>
		</div>
		<div class=" mui-row mui-fullscreen row-tab" id='row1' style="position: absolute;">  
			<!-- 左侧选项卡 -->
			<div class="mui-col-xs-3" style="padding-bottom: 50px;">
				<div id="segmentedControls" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical">
				</div>
			</div>
			<!-- 左侧选项卡对应的内容-->
			<div id="segmentedControlContents" class="mui-col-xs-9" style="padding-bottom: 60px;border-left: 1px solid #c8c7cc;">		
			</div>
		</div>

<!--        酒店界面-->
		<div class="mui-row mui-fullscreen ishide row-tab"style="position: absolute;">
		 	<div class="mui-scroll-wrapper"id="hotel-scroll">
		 		<div class="mui-scroll">
		 			<a class="hotel-bg"id="hotel-bg"href="admin.php?controller=userorder&method=location_hotelImg">
						<div class="hotel-name">株洲9581商务酒店</div>
					</a>
					<div class="hotel-address"id="hotel-address">株洲市天元区泰山路557号</div>
		 		</div>
		 	</div>
		</div>
				
		<div class="mui-popover" id="menu-sheet" style="border-radius:0;background-color: #fff;">
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<div class="clear-carte" id="clear-carte">清空购物车</div>
					<ul class="carte" id="carte">
					</ul>
				</div>
			</div>
		</div>	
			
	    <div class="buycar" id="scar">
	     	<a id="buycar">
		     	<div class="car-img"><img src="buyerstyle/image/buycar-icon1.png"/></div>
		     	<div id="light-icon" class="car-img2 ishide"><img src="buyerstyle/image/buycar-icon2.png"/></div>
		     	<span class="mui-badge mui-badge-danger car-count ishide" id="car-count">0</span>
		     	<p id="car-dollar" class="car-doller ishide">¥<span id="total-dollar">0</span></p>
		     	<span class="car-txt ishide" id="post-money"><span id="post-free" class="ishide">包邮</span><span id="post-pay">邮费 10.00</span></span>
		    </a>
	     	<span class="car-begin2 ishide" id="buycar-settlement">去结算</span>
	    </div>
<!--      隐藏 用来提交 订单数据  -->
        <div style="display: none">
            <form action="admin.php?controller=userorder&method=location_submitOrder" method="post" id="order_submit">
                <input type="hidden" name = "sid" value="{$sid}"/>
            </form>
        </div>
	   
	</body>
   	<script src="buyerstyle/js/mui.min.js"></script>
   	<script type="text/javascript" src="buyerstyle/js/jquery.js"></script>
    <script src="buyerstyle/js/func.js"></script>
    <script type="text/javascript">
        var sid = "{$sid}";
		document.getElementById("info-img").style.height=window.innerWidth*0.15+"px";
		document.getElementById("info-img").style.width=window.innerWidth*0.15+"px";
		document.getElementById("info-res").style.height=window.innerWidth*0.15+"px";
		document.getElementById("info-res").style.marginTop=window.innerWidth*0.13+"px";
		
		mui.init();
		//给上部分的背景设置高
		document.getElementById('res-bg').style.height=window.innerWidth*0.5+'px';
		//给左侧选项卡定位
		var ltab=document.getElementsByClassName('row-tab');
		for(var i=0;i<ltab.length;i++){
			ltab[i].style.top=document.getElementById('res-bg').offsetHeight+55+'px';
		}
		document.getElementById('res-detail').addEventListener('tap',function(){
			mui.openWindow({
				url:'admin.php?controller=userorder&method=location_restDetail',
				id:'restaurant'
			});
		})
		//住宿部分  让背景图片适配手机
          document.getElementById('hotel-bg').style.height=window.innerWidth*(2/3)+'px';
		//取消菜单
		//收藏
		var ontrue= {$sellerInfo.isCollection};
		//收藏初始化
        if(ontrue > 0){
            document.getElementById('collect-starx').style.background='url(buyerstyle/image/collect-activestar.png) no-repeat center center / cover';
            document.getElementById('collect-txt').innerHTML='已收藏';
        }else{
            document.getElementById('collect-starx').style.background='url(buyerstyle/image/collect-graystar.png) no-repeat center center / cover';
            document.getElementById('collect-txt').innerHTML='收藏';
        }
        var collect=document.getElementById('collect');
		collect.addEventListener('tap',function(){
			if(ontrue == 0){
				document.getElementById('collect-starx').style.background='url(buyerstyle/image/collect-activestar.png) no-repeat center center / cover';
			    document.getElementById('collect-txt').innerHTML='已收藏';
			    ontrue=1;
                }else{
				document.getElementById('collect-starx').style.background='url(buyerstyle/image/collect-graystar.png) no-repeat center center / cover';
			    document.getElementById('collect-txt').innerHTML='收藏';
			    ontrue=0;
			}

			var option = {
			  isCollection: ontrue,
			  sid:sid
            };
            doajax("admin.php?controller=usershop&method=setCollection",option,'text',function (data) {
               // console.info(data);
            });

        });
        //设定优惠信息内容
        var discountloaded = false;
        var discountOption = {
            sid:sid
        };
        doajax("admin.php?controller=usershop&method=getDiscountBySID",discountOption,'json',function (data) {
            //console.info(data);
            for (var i = 0; i < data.length; i++) {
                var discount = data[i];
                var str;
                if (discount.D_Type == 1) {
                    str = '满' +discount.D_Type1Full +'减' +discount.D_Type1Reduce;
                } else {
                    str = '打折商品' +discount.D_Type2Reduce*10 +'折';
                }
                if (i == 0) {

                    $("#discountInfo").append('<div class="act-item zindex">' + str + '</div>');
                }else {
                    $("#discountInfo").append('<div class="act-item ishide">' + str + '</div>');
                }
            }
            $("#discountInfo").append('<span class="act-num">' +data.length + '个活动</span>');
            discountloaded = true;

        });

		//mui.toast(activi.length);
		var num=0;
		setInterval(function(){
		    if (discountloaded) {
                //活动轮播
                var activi=mui('.act-item');
                for(var i=0;i<activi.length;i++){
                    activi[i].classList.remove('zindex');
                    activi[i].classList.add('ishide');
                }
				activi[num].classList.add('zindex');
				activi[num].classList.remove('ishide');

			    num++;
			    if(num>activi.length-1){
			    	num=num%activi.length;
			    }
            }
		},1500);
		
		//切换顶部选项卡
		var citem=mui('.control-item');
		var rowt=mui('.row-tab');
		mui('.res-thrtab').on('tap','.control-item',function(){
			for(var i=0;i<citem.length;i++){
				citem[i].classList.remove('item-active');
				citem[i].style.color='#000';
				rowt[i].classList.add('ishide');
				citem[i].index=i;
			}
			//mui.toast(this.index);
			this.classList.add('item-active');
			this.style.color='#0050EF';
			rowt[this.index].classList.remove('ishide');
		});
        // 隐藏和显现购物车
        document.getElementById('res-hotel').addEventListener('tap',function(){
        	document.getElementById('scar').style.display='none';
        });
        mui('.res-thrtab').on('tap','.common',function(){
        	document.getElementById('scar').style.display='block';
        });

		//去结算
       document.getElementById('buycar-settlement').addEventListener('tap',function(){
           //把购物车数据存到隐藏表单
           $(".carte-txt").each(function () {
              var pid = $(this).attr("pid");
              var pnum = $(this).find(".carte-count").text();
              var str = '<input type="text" name = "pid' + pid + '" value="' + pnum + '"/>';
              $("#order_submit").append(str)
           });
           $("#order_submit").submit();
       });
       
		//清空购物车
		document.getElementById('clear-carte').addEventListener('tap',function(){
            var clen=carte.children.length;  
		    for(var i=clen-1;i>=0;i--){ //从后往前删除才能删除所有节点
		      	carte.removeChild(carte.children[i]);
		    }
	      clearall();
			mui('#menu-sheet').popover('hide');
		});
		
		function clearall(){
			//清空内容的订单数  
            var mzero=document.getElementsByClassName('menu-count');
		    for(var i=0;i<mzero.length;i++){
		    	mzero[i].innerHTML=0;
		    	mzero[i].classList.add('ishide');
		    	mzero[i].previousSibling.classList.add('ishide');
		    }
		    buyCar.children[4].children[0].classList.add('ishide');
		    buyCar.children[4].children[1].classList.remove('ishide');
			buyCar.children[4].classList.add('ishide');
			buyCar.children[3].classList.add('ishide');
    	    buyCar.children[2].classList.add('ishide');
    	    buyCar.children[1].classList.add('ishide');
    	    buyCar.children[2].innerHTML=0;
    	    buyCar.children[3].children[0].innerHTML=0; 
    	    carSettlement.classList.add('ishide');
		}
		
		//住宿部分
       (function($){
			$('#hotel-scroll').scroll({
				indicators:false
			});
			mui('.mui-scroll-wrapper').scroll({
				deceleration:0.0005
			});
		})(mui);
		//地址定位
		document.getElementById('hotel-address').addEventListener('tap',function(){
			window.location.href="http://apis.map.qq.com/tools/poimarker?type=0&marker=coord:39.96554,116.26719;title:株洲9581商务酒店;addr:北京市海淀区复兴路32号院|coord:39.87803,116.19025;title:成都园;addr:北京市丰台区射击场路15号北京园博园|coord:39.88129,116.27062;title:老成都;addr:北京市丰台区岳各庄梅市口路西府景园六号楼底商|coord:39.9982,116.19015;title:北京园博园成都园;addr:北京市丰台区园博园内&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77&referer=myapp";
		});
	</script>	
	<script type="text/javascript">
		//左侧选项卡
        doajax("admin.php?controller=usershop&method=getProducts", {
            sid:sid
        }, "json", scrollcontent);
		function scrollcontent(data){
		    console.info(data);
		    var str = "content";
			var controls = document.getElementById("segmentedControls");
			var contents = document.getElementById("segmentedControlContents");
			var html = [];
			var i = 1,
				j = 1,
				m = 6, //左侧选项卡数量+1
			    n = 5; //每个选项卡列表数量+1
			for (; i <= data.length; i++) {
			    html.push('<a class="mui-control-item"id="titem" kid ="'+ data[i-1].K_ID +'" data-index="' + (i - 1) + '" href="#'+str + i + '">' + data[i-1].K_Name + '</a>');
			}
			controls.innerHTML = html.join('');

            html = [];
			for (i = 1; i <= data.length; i++) {
				html.push('<div id="'+str+ i + '" class="mui-control-content"><div class="ltitle">' + data[i-1].K_Name + '</div><ul class="mui-table-view">');
				var products = data[i-1].products;
				for (j = 1; j <= products.length; j++) {
					html.push('<li class="mui-table-view-cell test" pid = "'+ products[j-1].P_ID +'"  id="agrCommodity-'+i+'-'+j+'">'+
					 '<img id="agrCommodity-'+i+'-'+j+'-1" class="menu-img" src="'+ products[j-1].L_ImgUrl +'" width="80px" height="80px"/>'+
					 '<p id="agrCommodity-'+i+'-'+j+'-2" class="menu-name">'+ products[j-1].P_Name +'</p>'+
					 '<p id="agrCommodity-'+i+'-'+j+'-3" class="msale">月售'+ products[j-1].count +'</p>'+
					 '<p id="agrCommodity-'+i+'-'+j+'-4" class="praise">&nbsp;&nbsp;&nbsp;&nbsp;</p>'+
					 '<p class="menu-price">¥<span id="agrCommodity-'+i+'-'+j+'-5">'+ products[j-1].P_Price  +'<span></p>'+
					 // '<p class="menu-yprice">预付<span>5</span>元</p>'+
					 '<p id="agrCommodity-'+i+'-'+j+'-6" class="menu-reduce ishide reduce">一</p>'+
					 '<span id="agrCommodity-'+i+'-'+j+'-7" class="menu-count ishide">0</span>'+
					 '<p id="agrCommodity-'+i+'-'+j+'-8" class="menu-add add">+</p>'
					+'</li>');
				}
				html.push('</ul></div>');
			}
			contents.innerHTML = html.join('');
			//默认选中第一个
			controls.querySelector('.mui-control-item').classList.add('mui-active');
            tabscroll('segmentedControls','segmentedControlContents');
            buyCarBind();
		}
	    function tabscroll(obj1,obj2) {
			var controlsElem = document.getElementById(obj1);//左侧类别外围div
			var contentsElem = document.getElementById(obj2);//每类的内容div
			var controlListElem = controlsElem.querySelectorAll('.mui-control-item');//每一个左侧选项卡内容
			var contentListElem = contentsElem.querySelectorAll('.mui-control-content');//每类类别包含的右侧内容的div
			var controlWrapperElem = controlsElem.parentNode;
			var controlWrapperHeight = controlWrapperElem.offsetHeight;//左侧选项卡滚动的高度
			var controlMaxScroll = controlWrapperElem.scrollHeight - controlWrapperHeight;//左侧类别最大可滚动高度
			var maxScroll = contentsElem.scrollHeight - contentsElem.offsetHeight;//右侧内容最大可滚动高度
			var controlHeight = controlListElem[0].offsetHeight;//左侧类别每一项的高度
			var controlTops = []; //存储control的scrollTop值
			var contentTops = [0]; //存储content的scrollTop值
			var length = contentListElem.length;
			for (var i = 0; i < length; i++) {
				controlTops.push(controlListElem[i].offsetTop + controlHeight);
			}

			for (var i = 1; i < length; i++) {
				var offsetTop = contentListElem[i].offsetTop;
				if (offsetTop + 100 >= maxScroll) {
					var height = Math.max(offsetTop + 100 - maxScroll, 100);
					var totalHeight = 0;
					var heights = [];
					for (var j = i; j < length; j++) {
						var offsetHeight = contentListElem[j].offsetHeight;
						totalHeight += offsetHeight;
						heights.push(totalHeight);
					}
					for (var m = 0, len = heights.length; m < len; m++) {
						contentTops.push(parseInt(maxScroll - (height - heights[m] / totalHeight * height)));
					}
					break;
				} else {
					contentTops.push(parseInt(offsetTop));
				}
			}
			contentsElem.addEventListener('scroll', function() {
				var scrollTop = contentsElem.scrollTop;
				for (var i = 0; i < length; i++) {
					var offsetTop = contentTops[i];
					var offset = Math.abs(offsetTop - scrollTop);
					if (scrollTop < offsetTop) {
						if (scrollTop >= maxScroll) {
							onScroll(length - 1);
						} else {
							onScroll(i - 1);
						}
						break;
					} else if (offset < 20) {
						onScroll(i);
						break;
					}else if(scrollTop >= maxScroll){
						onScroll(length - 1);
						break;
					}
				}
			});
			var lastIndex = 0;
			//监听content滚动
			var onScroll = function(index) {
				if (lastIndex !== index) {
					lastIndex = index;
					var lastActiveElem = controlsElem.querySelector('.mui-active');
					lastActiveElem && (lastActiveElem.classList.remove('mui-active'));
					var currentElem = controlsElem.querySelector('.mui-control-item:nth-child(' + (index + 1) + ')');
					currentElem.classList.add('mui-active');
					//简单处理左侧分类滚动，要么滚动到底，要么滚动到顶
					var controlScrollTop = controlWrapperElem.scrollTop;
					if (controlScrollTop + controlWrapperHeight < controlTops[index]) {
						controlWrapperElem.scrollTop = controlMaxScroll;
					} else if (controlScrollTop > controlTops[index] - controlHeight) {
						controlWrapperElem.scrollTop = 0;
					}
				}
			};
			//滚动到指定content
			var scrollTo = function(index) {
				contentsElem.scrollTop = contentTops[index];
			};
			mui(controlsElem).on('tap', '.mui-control-item', function(e) {
				scrollTo(this.getAttribute('data-index'));
				return false;
			});
		} 
		//调用左侧选项卡 农产品
		//scrollcontent('segmentedControls','segmentedControlContents','content');
		//tabscroll('segmentedControls','segmentedControlContents');
		
	    //点击加入购物车 加
	    
	    var buyCar=document.getElementById('buycar');//购物车
	    var carSettlement=document.getElementById('buycar-settlement');//去结算按钮
	    var carte=document.getElementById('carte');//购物车列表ul
	    var lightIcon=document.getElementById('light-icon');//购物车亮图标
	    var carCount=document.getElementById('car-count');//购物车商品数量
	    var carDollar=document.getElementById('car-dollar');//总消费金额所在的父span
	    var totalDollar=document.getElementById('total-dollar');//当前购物车内的总金额
	    var postMoney=document.getElementById('post-money');//是否包邮的父span
	    var postFree=document.getElementById('post-free');//包邮
	    var postPay=document.getElementById('post-pay');//邮费
	    var postLine=100;
	    var preBuyCarCount,preTotalMoney,preAgrCount,agrName,agrUnitPrice;
        function buyCarBind() {

            mui('.mui-table-view-cell').on('tap','.menu-add',function(){
                var menuAddId=this.getAttribute('id');
                var aid=menuAddId.substring(0,menuAddId.length-2);//获得当前点击商品的id
                var productBuyCount=document.getElementById(aid+'-7');//商品li里的已购买商品数
                var curAgrCount;
                var pid = document.getElementById(aid).getAttribute("pid");
                preAgrCount=parseInt(productBuyCount.innerHTML);//原有商品栏里商品数
                agrName=document.getElementById(aid+'-2').innerHTML;//商品名称
                agrUnitPrice=parseInt(document.getElementById(aid+'-5').innerHTML);//单价
                preBuyCarCount=parseInt(carCount.innerHTML);//购物车数量
                preTotalMoney=parseInt(totalDollar.innerHTML);//原有总消费金额

                //元素显示
                if(preAgrCount==0){
                    document.getElementById(aid+'-6').classList.remove('ishide');
                    productBuyCount.classList.remove('ishide');
                }
                if(preBuyCarCount==0){
                    postMoney.classList.remove('ishide');
                    carDollar.classList.remove('ishide');
                    carCount.classList.remove('ishide');
                    carSettlement.classList.remove('ishide');
                    lightIcon.classList.remove('ishide');
                }
                if((preTotalMoney<postLine)&&(preTotalMoney+agrUnitPrice>=postLine)){
                    postFree.classList.remove('ishide');
                    postPay.classList.add('ishide');
                }
                //订单数增加
                curAgrCount=preAgrCount+1;
                productBuyCount.innerHTML=curAgrCount;
                carCount.innerHTML=preBuyCarCount+1;
                //订单实际价格增加
                totalDollar.innerHTML=preTotalMoney+agrUnitPrice;

                //点击加的时候同步购物车的订单数,当某件商品数量为1时添加一个新的购物车li
                 if(curAgrCount==1){
                    var li=document.createElement('li');
                    li.className='carte-txt';
                    li.setAttribute("pid", pid);
                    li.innerHTML='<p class="carte-name">'+agrName+'</p>'+
                                 '<p class="carte-price">¥<span>'+agrUnitPrice+'</span>'+
                                 '<p class="carte-reduce reduce">一</p>'+
                                 '<p class="carte-count">'+curAgrCount+'</p>'+
                                 '<p class="carte-add add">+</p>'
                    li.setAttribute('id',aid+'-f');
                    carte.appendChild(li);
                 }else{
                    document.getElementById(aid+"-f").children[3].innerHTML=curAgrCount;
                 }
            });
            //减
            mui('.mui-table-view-cell').on('tap','.menu-reduce',function(){
                var menuAddId=this.getAttribute('id');
                var aid=menuAddId.substring(0,menuAddId.length-2);//获得当前点击商品的id
                var productBuyCount=document.getElementById(aid+'-7');//商品li里的已购买商品数
                var curAgrCount;

                preAgrCount=parseInt(productBuyCount.innerHTML);//原有商品栏里商品数
                agrUnitPrice=parseInt(document.getElementById(aid+'-5').innerHTML);//单价
                preBuyCarCount=parseInt(carCount.innerHTML);//购物车数量
                preTotalMoney=parseInt(totalDollar.innerHTML);//原有总消费金额

                if(preAgrCount==1){
                    productBuyCount.innerHTML=0;
                    curAgrCount=0;
                    productBuyCount.classList.add('ishide');
                    this.classList.add('ishide');
                }else{
                    curAgrCount=preAgrCount-1;
                    productBuyCount.innerHTML=curAgrCount;
                }
                buyCarJudge();
                if(carte.children.length!=0){
                    if(curAgrCount==0){
                        var delLi=document.getElementById(aid+'-f');
                        carte.removeChild(delLi);
                    }else if(curAgrCount>0){
                        document.getElementById(aid+'-f').children[3].innerHTML=curAgrCount;
                    }
                }
            });
        }
		function buyCarJudge(){
			if(preBuyCarCount==1){
	    		carCount.innerHTML=0;
	    		carCount.classList.add('ishide');
	    		totalDollar.innerHTML=0;
	    		carDollar.classList.add('ishide');
	    		postMoney.classList.add('ishide');
	    		carCount.classList.add('ishide');
	    		carSettlement.classList.add('ishide');
	    		lightIcon.classList.add('ishide');
	    	}else{
		    	carCount.innerHTML=preBuyCarCount-1;
		    	totalDollar.innerHTML=preTotalMoney-agrUnitPrice;
	    	}
	    	if((preTotalMoney>=postLine)&&(preTotalMoney-agrUnitPrice<postLine)){
	    		postFree.classList.add('ishide');
	    		postPay.classList.remove('ishide');
	    	}
		}
      	 //弹出具体的订单
  		buyCar.addEventListener('tap',function(){
			if(carte.children.length!=0){
				mui('#menu-sheet').popover('toggle');
			} 
			//购物车中 减
			var carListLi,preCarListCount;
		  	mui('.carte-txt').on('tap','.carte-reduce',function(){
		  	    var parentLi=this.parentNode;
		  	    var thisid=parentLi.getAttribute('id');
		  	    thisid=thisid.substring(0,thisid.length-2);//获取右侧选项卡商品div的id
		  	    var productBuyCount=document.getElementById(thisid+'-7');
		  	    
		  	    carListLi=this.nextSibling;
		  	    preCarListCount=parseInt(carListLi.innerHTML);//当前点击的购物车li里的数量
		    	agrUnitPrice=parseInt(document.getElementById(thisid+'-5').innerHTML);//单价
		    	preBuyCarCount=parseInt(carCount.innerHTML);//购物车数量
		    	preTotalMoney=parseInt(totalDollar.innerHTML);//原有总消费金额

	            
	            if(preCarListCount==1){
	            	carListLi.innerHTML=0;
	            	productBuyCount.innerHTML=0;
	            	productBuyCount.classList.add('ishide');
	            	document.getElementById(thisid+'-6').classList.add('ishide');
	            	carte.removeChild(parentLi);
	            }else{
	            	carListLi.innerHTML=preCarListCount-1;
	            	productBuyCount.innerHTML=preCarListCount-1;
	            }
	           	buyCarJudge();

	            if(carte.children.length==0){
	            	clearall();
	            	mui('#menu-sheet').popover('hide');
	            }
	          
			});
			
			//购物车中 加
			mui('.carte-txt').on('tap','.carte-add',function(){
				var parentLi=this.parentNode;
		  	    var thisid=parentLi.getAttribute('id');
		  	    thisid=thisid.substring(0,thisid.length-2);//获取右侧选项卡商品div的id
		  	    var productBuyCount=document.getElementById(thisid+'-7');
		  	    
		  	    carListLi=this.previousSibling;
		  	    preCarListCount=parseInt(carListLi.innerHTML);//当前点击的购物车li里的数量
		    	agrUnitPrice=parseInt(document.getElementById(thisid+'-5').innerHTML);//单价
		    	preBuyCarCount=parseInt(carCount.innerHTML);//购物车数量
		    	preTotalMoney=parseInt(totalDollar.innerHTML);//原有总消费金额

		    	if((preTotalMoney<postLine)&&(preTotalMoney+agrUnitPrice>=postLine)){
		    		postFree.classList.remove('ishide');
		    		postPay.classList.add('ishide');
		    	}
		    	totalDollar.innerHTML=preTotalMoney+agrUnitPrice;
				carCount.innerHTML=preBuyCarCount+1;
				productBuyCount.innerHTML=preCarListCount+1;
				carListLi.innerHTML=preCarListCount+1;
			});
		});
		
	</script>
</html>
					
					