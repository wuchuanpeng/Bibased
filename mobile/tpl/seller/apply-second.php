<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/apply-page.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/image-viewer.css"/>
		<link href="../css/mui.picker.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../css/mui.picker.min.css"/>
		<link href="../css/mui.poppicker.css" rel="stylesheet" />
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">第二步 资质信息</h1>
	        <a id="home-back"><img src="images/home.png" class="head-img"></a>
	    </header>
	    
		<div class="second-content mui-content mui-scroll-wrapper" style="padding-top: 44px;">
			<div class="mui-scroll" style="padding-bottom: 50px;">
				<div class="first-tips">
					<span class="first-tips-content">还差2步,即可完成填写</span>
				</div>
				<p class="photoUpload-tips">填写前,请准备好法人身份证、营业执照、餐饮服务许可证</p>
				<ul class="mui-table-view" style="margin-bottom: 20px;">
					<li class="mui-table-view-cell" style="padding: 0;">
						<div class="shop-appearance">
							<div class="appearance-top">
								<span>法人手持身份证照</span>
							</div>
							<div class="appearance-body"> 
								<div id="legal-person" class="shop-pics">
									<img src="images/shop1.png" data-preview-src="" data-preview-group="1"/>
								</div>
								<div class="upload-tips">
									<p class="tips-text">1.需清晰展示五官和文字信息<br/>2.不可自拍,不可只拍身份证</p>
									<a href="#select-photos" class="select-pic">上传</a>
								</div>
							</div>
						</div>
					</li>
					<li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                	<div class="mui-input-row">
							<label class="shopowner-name">法人姓名</label>  
							<input class="shopowner-tel" type="text" placeholder="输入姓名">
						</div>
	                </li>
	                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                    <div class="mui-input-row">
							<label class="shopowner-name" style="padding-right: 0;">法人身份证号</label>
							<input class="shopowner-tel" type="text" placeholder="输入身份证号">
						</div>
	                </li> 
	                <span id="warn-one" class="first-shopowner-warn" style=""><span class="first-span">!</span><span id="second-span">请填写联系人</span></span>
				</ul>
				
				
				<ul class="mui-table-view" style="margin-bottom: 20px;">
					<li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                	<div class="mui-input-row">
							<label class="shopowner-name">执照类型</label>  
							<div class="shopowner-tel" style="line-height: 37px;margin-right: 10px;color: #848890;">
								<input type="radio" name="license-type" id="radio1" checked="checked"/>营业执照
								<input type="radio" name="license-type" id="radio2"/>特许证件
							</div>
						</div>
	                </li>
					<li class="mui-table-view-cell" style="padding: 0;">
						<div class="shop-appearance">
							<div class="appearance-top">
								<span class="radio1">营业执照</span>
								<span class="radio2" style="display: none;">特许证件图片</span>
							</div>
							<div class="appearance-body"> 
								<div id="legal-person" class="shop-pics">
									<img src="images/shop1.png" data-preview-src="" data-preview-group="1"/>
								</div>
								<div class="upload-tips">
									<p class="radio1 tips-text">1.需清晰完整、露出国徽、真实有效<br/>2.拍复印件需加盖印章</p>
									<p class="radio2 tips-text" style="display: none;">1.需文字清晰、边框完整、真实有效<br/>2.需符合当地的相关规则政策</p>
									<a href="#select-photos" class="select-pic">上传</a>
								</div>
							</div>
						</div>
					</li>
					<li class="mui-table-view-cell radio1 mui-collapse-content" style="padding: 0;">
	                	<div class="mui-input-row">
							<label class="shopowner-name ">执照名称</label>  
							<input class="shopowner-tel " type="text" placeholder="输入执照名称">
						</div>
						</li>
	                <li class="mui-table-view-cell radio2 mui-collapse-content" style="height: 40px;display: none;width: 100%;">
						<a href="#" id="select-lic" class="mui-navigate-right shopowner-name" style="color: #848890;"><span style="float: left;">特许证件名称</span><span id="licence-type"></span></a>
	                </li>
	                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                    <div class="mui-input-row">
							<label class="shopowner-name " style="padding-right: 0;width: 40%;"><span class="radio1">执照注册号</span><span class="radio2" style="display: none;">特许证件注册号</span></label>
							<input class="shopowner-tel " style="width: 60%;" type="text" placeholder="输入证件注册号">
						</div>
	                </li> 
	                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                    <div class="mui-input-row">
							<label class="shopowner-name " style="padding-right: 0;width: 40%;"><span class="radio1">执照所在地</span><span class="radio2" style="display: none;">特许证件所在地</span></label>
							<input class="shopowner-tel " style="width: 60%;" type="text" placeholder="输入证件所在地">
						</div>
	                </li> 
	                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                	<div class="mui-input-row">
							<label class="shopowner-name">证件有效期</label>  
							<div class="shopowner-tel" style="line-height: 37px;margin-right: 10px;color: #848890;">
								<input type="radio" name="limit-time" id="term1" checked="checked"/>长期有效
								<input type="radio" name="limit-time" id="term2" class="select-time" data-options='{"type":"date","beginYear":1980,"endYear":2200}'/>固定有效期
							</div>
						</div>
	                </li>
	                <li class="mui-table-view-cell mui-collapse-content" id="vaild-time" style="padding: 0;display: none;">
	                    <div class="mui-input-row">
							<label class="shopowner-name" style="padding-right: 0;">有效期到</label>
							<input class="shopowner-tel" id="item1" type="text" placeholder="请选择日期">
						</div>
	                </li> 
	                <span id="warn-one" class="first-shopowner-warn"><span class="first-span">!</span><span id="second-span">请填写联系人</span></span>
				</ul>
				
				
				<ul class="mui-table-view" style="margin-bottom: 20px;">
					<li class="mui-table-view-cell" style="padding: 0;">
						<div class="shop-appearance">
							<div class="appearance-top">
								<span>餐饮服务许可证</span>
							</div>
							<div class="appearance-body"> 
								<div id="legal-person" class="shop-pics">
									<img src="images/shop1.png" data-preview-src="" data-preview-group="1"/>
								</div>
								<div class="upload-tips">
									<p class="tips-text">需文字清晰、边框完整、真实有效</p>
									<a href="#select-photos" class="select-pic">上传</a>
								</div>
							</div>
						</div>
					</li>
					<li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                	<div class="mui-input-row">
							<label class="shopowner-name">许可证名称</label>  
							<input class="shopowner-tel" type="text" placeholder="输入许可证名称">
						</div>
	                </li>
	                <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                    <div class="mui-input-row">
							<label class="shopowner-name" style="padding-right: 0;">许可证注册号</label>
							<input class="shopowner-tel" type="text" placeholder="输入许可证注册号">
						</div>
	                </li> 
	                 <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                    <div class="mui-input-row">
							<label class="shopowner-name" style="padding-right: 0;">许可证所在地</label>
							<input class="shopowner-tel" type="text" placeholder="输入许可证所在地">
						</div>
	                </li> 
	                 <li class="mui-table-view-cell mui-collapse-content" style="padding: 0;">
	                    <div class="mui-input-row">
							<label class="shopowner-name" style="padding-right: 0;">许可证有效期</label>
							<input class="shopowner-tel select-time" id="item2" type="text" placeholder="请选择日期" data-options='{"type":"date","beginYear":1980,"endYear":2200}'>
						</div>
	                </li> 
	                <span id="warn-one" class="first-shopowner-warn" style=""><span class="first-span">!</span><span id="second-span">请填写联系人</span></span>
				</ul>
			</div>
             <div class="first-footer">
            	<a class="first-location-next" id="location-next">下一步</a>
            </div>
		</div>
	</body>
	<script src="../js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/mui.zoom.js"></script>
	<script src="../js/mui.previewimage.js"></script>]
	<script src="../js/mui.picker.js"></script>
	<script src="../js/mui.poppicker.js"></script>
	<script src="../js/mui.picker.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.previewImage();
		mui.init();
		mui('.mui-scroll-wrapper').scroll({
			scrollY:true,
			deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
			indicators:false,
			bounce: false
		});
		
		document.getElementById("location-next").addEventListener('tap',function(){
			 window.location.href="apply-third.php"
		});
		
		document.getElementById("home-back").addEventListener('tap',function(){
			window.location.href="apply-settlement.php";
		});
		var bodyhei=document.getElementsByClassName("appearance-body");
		for(var i=0;i<bodyhei.length;i++){
			bodyhei[i].style.height=window.innerWidth*0.25+'px';
		}
		
		
//		切换营业执照和特许证填写界面
		var clickradio1=document.getElementsByClassName("radio1");
		var clickradio2=document.getElementsByClassName("radio2");
		document.getElementById("radio1").addEventListener('tap',function(){
			for(var i=0;i<clickradio1.length;i++){
				clickradio2[i].style.display="none";
				clickradio1[i].style.display="block";
			}
		});
		document.getElementById("radio2").addEventListener('tap',function(){
			for(var i=0;i<clickradio2.length;i++){
				clickradio1[i].style.display="none";
				clickradio2[i].style.display="block";
			}
		});
		
//		执照有效期时点固定有效期时显示的input
		document.getElementById("term2").addEventListener("tap",function(){
			document.getElementById("vaild-time").style.display="block";
		});
		document.getElementById("term1").addEventListener("tap",function(){
			document.getElementById("vaild-time").style.display="none";
		});
	</script>
	<script type="text/javascript">
	(function($, doc) {
//		特许证件名称选择器
		$.ready(function() {
			var userPicker = new $.PopPicker();
			userPicker.setData([{
				value: 'lic1',
				text: '民办非企业单位登记证书'
			}, {
				value: 'lic2',
				text: '事业单位法人证书'
			}, {
				value: 'lic3',
				text: '军队单位对外有偿服务许可证'
			}, {
				value: 'lic4',
				text: '社会团体法人登记证书'
			}, {
				value: 'lic5',
				text: '食品安全许可证'
			}, {
				value: 'lic6',
				text: '食品流通许可证'
			}, {
				value: 'lic7',
				text: '灵活就业证'
			}, {
				value: 'lic8',
				text: '卫生许可证'
			}, {
				value: 'lic9',
				text: '灵活就业(营业)辅导证'
			}, {
				value: 'lic10', 
				text: '灵活就业(营业)辅导意见'
			}, {
				value: 'lic11', 
				text: '小微餐饮分级证'
			}, {
				value: 'lic12', 
				text: '餐饮服务达标证'
			}, {
				value: 'lic13', 
				text: '食品药品生产经营使用单位分级证'
			}, {
				value: 'lic14', 
				text: '餐饮登记证'
			}, {
				value: 'lic15', 
				text: '食品生产经营登记证'
			}, {
				value: 'lic16', 
				text: '小作坊许可证'
			}, {
				value: 'lic17', 
				text: '全国工业产品生产许可证'
			}, {
				value: 'lic18', 
				text: '药品营业许可证'
			}, {
				value: 'lic19', 
				text: '药品经营质量管理规范认证证书'
			}, {
				value: 'lic20', 
				text: '食品经营许可证'
			}
			]);
			var showUserPickerButton = doc.getElementById('select-lic');
			var userResult = doc.getElementById('licence-type');
			showUserPickerButton.addEventListener('tap', function(event) {
				userPicker.show(function(items) {
					userResult.innerText = items[0].text;
					//返回 false 可以阻止选择框的关闭
					//return false;
				});  
			}, false);
			
//			有效期事件选择器
			var result=new Array();
			result[0] = $('#item1')[0];
			result[1]=$('#item2')[0];
			var btns = $('.select-time');
			btns.each(function(i, btn) {
				btn.addEventListener('tap', function() {
					var optionsJson = this.getAttribute('data-options') || '{}';
					var options = JSON.parse(optionsJson);
//					var id = this.getAttribute('id');
					var picker = new $.DtPicker(options);
					picker.show(function(rs) {
						result[i].value = rs.text;
						picker.dispose();
					});
				}, false);
			});
			
		});
	})(mui, document);
	</script>
</html>