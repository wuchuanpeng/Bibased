<?php header("Content-type: text/html; charset=utf-8"); ?>
<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/style.css"/>
	</head>
  <style type="text/css">
  	
  </style>
	<body>
		<header class="mui-bar mui-bar-nav"style="background-color: #fff;">
		    <a id="access-shut"href="javascript:;"><img src="buyerstyle/image/access-shut.png"style="margin-top: 8px;"/></a>
		    <h1 class="mui-title"style="font-size: 18px;color: #000;">评价</h1>
		    <button type="button"class="mui-pull-right put-btn"style="background-color: #CCCCCC;color:#F0F0F0;margin-top: 6px;">提交</button>
		</header>
		<div class="mui-content">
			<!--为配送评分-->
		    <div class="seller-out">
		    	<div class="seller-top"style="width: 94%;margin: 0 auto;">
		    		<img src="buyerstyle/image/seller.jpg"style="width: 40px;height: 40px;"class="seller-icon"/>
		    		<h5 class="seller-name">商家配送</h5>
		    		<p>3月12号<span id="seller-time">12:30</span>左右送达</p>
		    		<a class="seller-correct"href="#time-btn"id="correct-btn">更正<img src="buyerstyle/image/seller-correct.png"/></a>
		    	</div>
		    	<div class="seller-access">
		    		<h5 id="setaccess">为配送打分</h5>
		    		<div id="access-star"class="access-star">
		    			<a href="javascript:;"class="access-unactive"id="active-btn"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		</div>
		    		<div class="access-slide"id="access-slide1">
			    		<div class="mui-slider">
						  <div class="mui-slider-group">
						    <div class="mui-slider-item">
						    	<div>
						    	    <p class="comment">配送慢</p>
						    	     <p class="comment"style="margin-left: 100px;">货品损坏</p>
						    	     <p class="comment">未到指定地点</p>
						        </div>
						    </div>
						    <div class="mui-slider-item">
						    	<div>
						    		<p class="comment">配送慢</p>
						    	     <p class="comment"style="margin-left: 100px;">货品损坏</p>
						    	     <p class="comment">未到指定地点</p>
						    	</div>
						    </div>
						    <div class="mui-slider-item">
						    	<div>
						    		<p class="comment">配送慢</p>
						    	     <p class="comment"style="margin-left: 100px;">货品损坏</p>
						    	     <p class="comment">未到指定地点</p>
						    	</div>
						    </div>
						  </div>
						   <div class="mui-slider-indicator">
						  	  <div class="mui-indicator mui-active"></div>
						  	  <div class="mui-indicator"></div>
						  	  <div class="mui-indicator"></div>
						    </div>
						</div>
				    </div>
		    	</div>
		    	<div class="access-slide"id="access-slide2">
			    		<div class="mui-slider">
						  <div class="mui-slider-group">
						    <div class="mui-slider-item">
						    	<div>
						    	    <p class="comment">送货快</p>
						    	     <p class="comment"style="margin-left: 100px;">整洁卫生</p>
						    	     <p class="comment">准时送达</p>
						        </div>
						    </div>
						    <div class="mui-slider-item">
						    	<div>
						    		<p class="comment">送货快</p>
						    	     <p class="comment"style="margin-left: 100px;">整洁卫生</p>
						    	     <p class="comment">准时送达</p>
						    	</div>
						    </div> 
						  </div>
						   <div class="mui-slider-indicator">
						  	  <div class="mui-indicator mui-active"></div>
						  	  <div class="mui-indicator"></div>
						    </div>
						</div>
				    </div>
		    </div>
		    
		    <!--为商家打分-->
		    <div class="seller-shop seller-out">
		    	<div class="seller-top"style="width: 94%;margin: 0 auto;">
		    		<img src="buyerstyle/image/shop-icon.jpg"style="width: 40px;height: 40px;"class="seller-icon"/>
		    		<h5 style="margin-top: 30px;color: #000;float: left;margin-left: 8px;">家常菜馆</h5>
		    	</div>
		    	<div class="seller-access">
		    		<h5 id="setaccess2">为商家打分</h5>
		    		<div id="access-star2"class="access-star">
		    			<a href="javascript:;"class="access-unactive"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		    <a href="javascript:;"class="access-unactive"></a>
		    		</div>
		    		<div class="access-slide"id="access-slide3">
			    		<div class="mui-slider">
						  <div class="mui-slider-group">
						    <div class="mui-slider-item">
						    	<div>
						    	    <p class="comment">配送慢</p>
						    	     <p class="comment"style="margin-left: 100px;">货品损坏</p>
						    	     <p class="comment">未到指定地点</p>
						        </div>
						    </div>
						    <div class="mui-slider-item">
						    	<div>
						    		<p class="comment">配送慢</p>
						    	     <p class="comment"style="margin-left: 100px;">货品损坏</p>
						    	     <p class="comment">未到指定地点</p>
						    	</div>
						    </div>
						    <div class="mui-slider-item">
						    	<div>
						    		<p class="comment">配送慢</p>
						    	     <p class="comment"style="margin-left: 100px;">货品损坏</p>
						    	     <p class="comment">未到指定地点</p>
						    	</div>
						    </div>
						  </div>
						   <div class="mui-slider-indicator">
						  	  <div class="mui-indicator mui-active"></div>
						  	  <div class="mui-indicator"></div>
						  	  <div class="mui-indicator"></div>
						    </div>
						</div>
				    </div>
		    	</div>
		    	<!---->
		    	<div class="access-slide"id="access-slide4">
			    		<div class="mui-slider">
						  <div class="mui-slider-group">
						    <div class="mui-slider-item">
						    	<div>
						    	    <p class="comment">送货快</p>
						    	     <p class="comment"style="margin-left: 100px;">整洁卫生</p>
						    	     <p class="comment">准时送达</p>
						        </div>
						    </div>
						    <div class="mui-slider-item">
						    	<div>
						    		<p class="comment">送货快</p>
						    	     <p class="comment"style="margin-left: 100px;">整洁卫生</p>
						    	     <p class="comment">准时送达</p>
						    	</div>
						    </div> 
						  </div>
						   <div class="mui-slider-indicator">
						  	  <div class="mui-indicator mui-active"></div>
						  	  <div class="mui-indicator"></div>
						    </div>
						</div>
				    </div>
		    	</div>
		    <div class="gocomment">
		    	<div class="tocomment">
		    		<textarea id='comment-text'name="txt" rows="4" cols="4" placeholder="写下您对配送和商家的评价吧~"class="comment-text"></textarea>
		    	    <!--添加图片-->
		    	    <a href="javascript:;"class="addimg"id="addimg"><img src="buyerstyle/image/addimg-icon.png"/></a>
		    	</div>
		    	<div class="comment-footer">
		    		<p class="footer-text">土豆烧鸡</p>
		    		<p class="footer-icon"id="footer-icon1"><img src="buyerstyle/image/cai-gray.png"id="footer-img1"/>踩</p>
		    		<p class="footer-icon"id="footer-icon2"><img src="buyerstyle/image/zan-gray.png"id="footer-img2"/>赞</p>
		    	</div>
		    </div>
		</div>
		    
		</div>
	</div>
		<!--弹出更正表-->
		<div id="time-btn" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="popover-view">
				<li class="popover-time">
					3月12号
					<div class="mui-scroll-wrapper"id="scroll1"style="top: -5px;left: 80px;">
						<div class="mui-scroll"style="padding-bottom: 50px;">
							<!--这里放置真实显示的DOM内容-->
							<ul id="time-group">
								<li><a href="#time-btn">11:40</a></li>
								<li><a href="#time-btn">11:45</a></li>
								<li><a href="#time-btn">11:50</a></li>
								<li><a href="#time-btn">11:55</a></li>
								<li><a href="#time-btn">12:00</a></li>
								<li><a href="#time-btn">12:05</a></li>
								<li><a href="#time-btn">12:10</a></li>
								<li><a href="#time-btn">12:15</a></li>
								<li><a href="#time-btn">12:20</a></li>
								<li><a href="#time-btn">12:25</a></li>
								<li><a href="#time-btn">12:15</a></li>
								<li><a href="#time-btn">12:20</a></li>
								<li><a href="#time-btn">12:25</a></li>
								<li><a href="#time-btn">12:15</a></li>
								<li><a href="#time-btn">12:20</a></li>
								<li><a href="#time-btn">12:25</a></li>
						    </ul> 
						</div>
					</div>	
				</li>
				<li class="cancel-btn"><a href="#time-btn"style="color: #fff;">取消</a></li>
		</div>
	</body>
    <script src="buyerstyle/js/mui.min.js"></script>
    <script src="buyerstyle/js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			mui.init();
			//从评价页面返回到主页面
//			var old_back=mui.back;
			document.getElementById('access-shut').addEventListener('tap',function(e){
				mui.confirm('关闭后当前评价信息不会保留','确认关闭评价',new Array('关闭评价','再想想'),function(e){
					if(e.index==0){
                        history.go(-1);
					}	
				})
			});
			//点击关闭时间修改表
			var aul=document.getElementById('time-group');
			var oli=aul.getElementsByTagName('li');
			var sellerT=document.getElementById('seller-time');
			for(var i=0;i<oli.length;i++){
				oli[i].addEventListener('tap',function(){
				     sellerT.innerText=this.innerText;
				     mui('#time-btn').popover('toggle');
			   })
			}
			//滚动
			(function($){
				$('#scroll1').scroll({
					indicators:true
				});
				mui('.mui-scroll-wrapper').scroll({
					deceleration:0.0005
				});
			})(mui);
			//星星打分
			var starul=document.getElementById('access-star');
			var astar=starul.getElementsByTagName('a');
			var aset=document.getElementById('setaccess');
			var aslide1=document.getElementById('access-slide1');
			var aslide2=document.getElementById('access-slide2');
			var starul2=document.getElementById('access-star2');
			var astar2=starul2.getElementsByTagName('a');
			var aset2=document.getElementById('setaccess2');
			var aslide3=document.getElementById('access-slide3');
			var aslide4=document.getElementById('access-slide4');
			var otext=document.getElementById('comment-text');
			var arr=['非常差','很差','一般','很好','非常好'];
			function getAccess(obj){
				for(var i=0;i<obj.length;i++){
					 obj[i].index=i;
					obj[i].addEventListener('tap',function(){
						for(var i=0;i<obj.length;i++){
							obj[i].className='access-unactive';
						}
						if(obj==astar){
							getColor(this.index);
						}else{
							getColor2(this.index);
						}
						
					});
			    }
			}
			getAccess(astar);
			getAccess(astar2);
			function getColor(num){
				for(var j=0;j<=num;j++){
					astar[j].className='access-active';	
				}
				if(num<=2){
					console.log(num);
					aslide1.className='show';
					aslide2.className='hide';
					otext.placeholder='亲亲，哪里不满意吗？写评论告诉我们';
				}else{
					aslide1.className='hide';
					aslide2.className='show';
					otext.placeholder='写下您对配送和商家的评价吧~';
				}
				aset.innerText=arr[num];
			}
			function getColor2(num){
				for(var j=0;j<=num;j++){
					astar2[j].className='access-active';	
				}
				if(num<=2){
					aslide3.className='show';
					aslide4.className='hide';
					otext.placeholder='亲亲，哪里不满意吗？写评论告诉我们';
				}else{
					aslide3.className='hide';
					aslide4.className='show';
					otext.placeholder='写下您对配送和商家的评价吧~';
				}
				aset2.innerText=arr[num];
			}
			//星星结束
			//选择评论
			var ocomment=mui('.comment');
			for(var i=0;i<ocomment.length;i++){
				ocomment[i].addEventListener('tap',function(){
					this.className='comment'+' '+'comment-select';
					this.style.borderColor='#FCDC89';
				})
			}
			//赞和踩
			var onoff1=0;
			var onoff2=0;
			var ficon1=document.getElementById('footer-icon1');
			var ficon2=document.getElementById('footer-icon2');
			var aimg=['buyerstyle/image/cai-gray.png','buyerstyle/image/cai-active.png','buyerstyle/image/zan-gray.png','buyerstyle/image/zan-active.png'];
				ficon2.addEventListener('tap',function(){
						if(onoff1==0){
							this.className='footer-icon'+' '+'footer-icon-spe2';
							this.style.borderColor='#FDE8B3';
							document.getElementById('footer-img2').src=aimg[3];
						
							onoff1=1;
							if(onoff2==1){
								ficon1.className='footer-icon';
								document.getElementById('footer-img1').src=aimg[0];
								ficon1.style.borderColor='#ccc';
								onoff2=0;
							}
						}else{
							this.className='footer-icon';
							document.getElementById('footer-img2').src=aimg[2];
							this.style.borderColor='#ccc';
							onoff1=0;
						}
					});
					ficon1.addEventListener('tap',function(){
						if(onoff2==0){
							this.className='footer-icon'+' '+'footer-icon-spe1';
							this.style.borderColor='#868686';
							document.getElementById('footer-img1').src=aimg[1];
							onoff2=1;
							if(onoff1==1){
								ficon2.className='footer-icon';
							   document.getElementById('footer-img2').src=aimg[2];
							   ficon2.style.borderColor='#ccc';
							   onoff1=0;
							}
						}else{
							this.className='footer-icon';
							document.getElementById('footer-img1').src=aimg[0];
							this.style.borderColor='#ccc';
							onoff2=0;
						}
					});
			

		</script>
</html>