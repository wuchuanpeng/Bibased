<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/apply-page.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/image-viewer.css"/>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">上传店铺照片</h1>
	        <a id="save-photo" href="">保存</a>
	    </header>
		<div class="photoUpload-content" style="padding-top: 45px;">
			<p class="photoUpload-tips">
				店铺照片仅用于核实您的店铺是否真实存在,不会对外展示
			</p>
			<div class="shop-appearance">
				<div class="appearance-top">
					<span>门脸图</span>
				</div>
				<div class="appearance-body"> 
					<div id="shop-face" class="shop-pics">
						<img src="images/shop1.png" data-preview-src="" data-preview-group="1"/>
					</div>
					<div class="upload-tips">
						<p class="tips-text">需拍出完整门匾、门框</p>
						<a href="#select-photos" class="select-pic">重新上传</a>
					</div>
				</div>
			</div>
			<div class="shop-appearance">
				<div class="appearance-top">
					<span>店内环境图</span>
				</div>
				<div class="appearance-body">
					<div id="shop-environment" class="shop-pics">
						<img src="images/shop2.png" data-preview-src="" data-preview-group="1"/>
					</div>
					<div class="upload-tips">
						<p class="tips-text">需真实反映用餐环境(收银台、用餐桌椅等)</p>
						<a href="#select-photos" class="select-pic">重新上传</a>
					</div>
				</div>
			</div>
		</div>
		<div id="select-photos" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a>拍照</a>
				</li>
				<li class="mui-table-view-cell">
					<a href="#">从照片选择</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#select-photos"><b>取消</b></a>
				</li>
			</ul>
		</div>
	</body>
	<script src="../js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/mui.zoom.js"></script>
	<script src="../js/mui.previewimage.js"></script>
	<script type="text/javascript">
		mui.previewImage();
		mui.init();
		var bodyhei=document.getElementsByClassName("appearance-body");
		for(var i=0;i<bodyhei.length;i++){
			bodyhei[i].style.height=window.innerWidth*0.25+'px';
		}
	</script>
</html> 