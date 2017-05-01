<?php header("Content-type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="../css/mui.min.css" />
		<link rel="stylesheet" type="text/css" href="css/apply-set.css" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
		    <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"style="color: #000;"></a>
		    <h1 class="mui-title">备注记录</h1>
		</header>
		<div class="mui-content">
			<div class="apply-tab">
				<div id="segmentedControl"class="mui-segmented-control">
					<a class="mui-control-item mui-active"href="#item1mobile">待处理<span>3</span></a>
					<a class="mui-control-item "href="#item2mobile">审核中</a>
					<a class="mui-control-item "href="#item3mobile">已完成</a>
			    </div>
			</div>
				<div id="item1mobile"class="mui-control-content mui-active">
					<ul class="mui-table-view apply-table">
							<li class="mui-table-view-cell apply-tab-content clearfloat">
								<img src="images/seller-bg.png"/>
								<ul class="tab-content clearfloat"i>
									<li class="apply-name">广州荷叶饭</li>
									<li class="apply-other">其他</li>
									<li class="apply-time">创建店铺：<span>2017-03-13</span></li>
									<li class="mui-icon mui-icon-arrowright apply-right"></li>
								    <li class="apply-continue">继续填写</li>
								</ul>
							</li>
							<li class="mui-table-view-cell apply-tab-content clearfloat">
								<img src="images/seller-bg.png"/>
								<ul class="tab-content clearfloat">
									<li class="apply-name">广州荷叶饭</li>
									<li class="apply-other">其他</li>
									<li class="apply-time">创建店铺：<span>2017-03-13</span></li>
									<li class="mui-icon mui-icon-arrowright apply-right"></li>
								    <li class="apply-continue">继续填写</li>
								</ul>
							</li>
							<li class="mui-table-view-cell apply-tab-content clearfloat">
								<img src="images/seller-bg.png"/>
								<ul class="tab-content clearfloat">
									<li class="apply-name">广州荷叶饭</li>
									<li class="apply-other">其他</li>
									<li class="apply-time">创建店铺：<span>2017-03-13</span></li>
									<li class="mui-icon mui-icon-arrowright apply-right"></li>
								    <li class="apply-continue">继续填写</li>
								</ul>
							</li>
					</ul>
				</div>
				<div id="item2mobile"class="mui-control-content">
					<ul class="mui-table-view">
						<!--<li class="mui-table-view-cell">
							
						</li>-->
					</ul>
				</div>
				<div id="item3mobile"class="mui-control-content">
					<ul class="mui-table-view">
						<!--<li class="mui-table-view-cell">
							
						</li>-->
					</ul>
				</div>
			
		</div>
		
		
		
	</body>
	<script src="../js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.init();
		//给图片右边的ul适配宽度
		var ttcon=document.getElementsByClassName('tab-content');
		for(var i=0;i<ttcon.length;i++){
			ttcon[i].style.width=window.innerWidth*0.56+'px';
		}
		//进入继续填写
		mui('.apply-table').on('tap','.apply-tab-content',function(){
			window.location.href='apply-first.php';
		});
	</script>