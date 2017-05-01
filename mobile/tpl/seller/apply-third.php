<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title>第三步 商品信息</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/apply-page.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<style type="text/css">
			.mui-row.mui-fullscreen>[class*="mui-col-"] {
				height: 100%;   
			}
			.mui-col-xs-3,
			.mui-control-content {
				overflow-y: auto;
				height: 100%;
			}
			.mui-segmented-control .mui-control-item {
				line-height: 50px;
				width: 100%;
			}
			.mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active {
				background-color: #fff;
			}
		</style>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">第三步 商品信息</h1>
	        <a id="home-back"><img src="images/home.png" class="head-img"></a>
	    </header>
	    
		<div class="third-content mui-content" style="padding-top: 44px;">
			<div class="product-detail"id="product-detail">
				<div class="detail-img clearfloat">
					<img src="../image/shop-icon.jpg"id="img-de"/>
					<ul>
						<li class="detail-name">广州荷叶饭</li>
						<li class="detail-other">其他-其他</li>
					</ul>
				</div>
				<div class="detail-text">
					<div class="text-txt">请上传商标图和5个特色商品用于审核，上线后可补偿商品</div>
				</div>
			</div>
             <div class="first-footer">
            	<a class="first-location-next" id="location-next">提交店铺信息</a>
            </div>
		</div>
		<!--添加商品-->
		 <div class="mui-row mui-fullscreen"id='row-add'style="position: absolute;">  
			<div class="mui-col-xs-3">
				<div id="segmentedControls" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical">
				   <a class="mui-control-item mui-active" href="#content"style="color: #000;">商品<span class="mui-badge mui-badge-primary"style="margin-left: 4px;">1</span></a>
				</div>
			</div>
			<div id="segmentedControlContents" class="mui-col-xs-9" style="border-left: 1px solid #c8c7cc;background-color: #fff;">		
			      <div id="content" class="mui-control-content mui-active">
				      	<ul class="mui-table-view product-acontent">
				      		<li class="mui-table-view-cell product-add-content">
				      			<img src="../image/shop-icon.jpg"/>
				      			<ul class="add-content-list clearfloat">
				      				<li>名称</li>
				      				<li>库存100</li>
				      				<li><span class="add-price">¥10</span>/份</li>
				      			</ul>
				      		</li>
				      		<li class="mui-table-view-cell product-add-content">
				      			<img src="../image/shop-icon.jpg"/>
				      			<ul class="add-content-list clearfloat">
				      				<li>名称</li>
				      				<li>库存100</li>
				      				<li><span class="add-price">¥10</span>/份</li>
				      			</ul>
				      		</li>
				      		<li class="mui-table-view-cell product-add-content">
				      			<img src="../image/shop-icon.jpg"/>
				      			<ul class="add-content-list clearfloat">
				      				<li>名称</li>
				      				<li>库存100</li>
				      				<li><span class="add-price">¥10</span>/份</li>
				      			</ul>
				      		</li>
				      		
				      	</ul>
			      </div>
			      <div class="add-prompt">
				      	<p>点击添加，开始添加第<span>1</span>个商品</p>
				      	<span class="add-triangle"></span>
			      </div>
			      <a href="add-product.php"class="add-icon">+</a>
			</div>
	    </div>
	</body>
	<script src="../js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.init();
	</script>	
	<script type="text/javascript">
	     //适配的宽高度
		document.getElementById('product-detail').style.height=window.innerWidth*0.4+'px';
		document.getElementById('img-de').style.width=window.innerWidth*0.3+'px';
		document.getElementById('img-de').style.height=window.innerWidth*0.25+'px';
		var addnum=parseInt(document.getElementById('product-detail').style.height)+45+'px';
		document.getElementById('row-add').style.top=addnum;
	</script>
	<script type="text/javascript">
       mui('.product-acontent').on('tap','.product-add-content',function(){
       	   window.location.href='revise-product.php';
       });
	</script>
</html>