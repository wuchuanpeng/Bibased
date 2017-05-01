<?php header("Content-type: text/html; charset=utf-8"); ?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">   
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/submit-order.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
		    <a class="mui-icon mui-icon-left-nav mui-pull-left mui-action-back"href="javascript:;"id="action-back"style="color: #000;"></a>
		    <p class="remark-add">添加备注</p>
		    <p class="remark-finish"id="remark-finish">完成</p>
		</header>
		<div class="mui-content">
			<div class="remark">
				<textarea name="" rows="3" cols=""placeholder="请输入备注，最多50字哦"class="remark-text"id="remark-text"></textarea>
			    <p class="word-count"><span id="word-count">0</span>/50</p>
			</div>
			<div class="remark-usually">
				<p>常用备注</p>
				<ul class="usual-list">
					<li class="usual-item">不吃辣</li>
					<li class="usual-item">少放辣</li>
					<li class="usual-item">多放辣</li>
					<li class="usual-item">不吃蒜</li>
					<li class="usual-item">不吃香菜</li>
					<li class="usual-item">不吃葱</li>
				</ul>
			</div>
		</div>
	</body>
	 <script src="buyerstyle/js/mui.min.js"></script>
	 <script type="text/javascript">
	 //限制备注的字数
     var remarkTxt=document.getElementById('remark-text');
     var remarkCount=document.getElementById("word-count");
       remarkTxt.oninput=function(){
	     	if(this.value.length>50){
	     		mui.toast('备注最多50个字哟');
	     		remarkTxt.value=remarkTxt.value.substring(0,50);
	     	}else{
	     		remarkCount.innerText=parseInt(remarkTxt.value.length);
	     	}
	     };
	 //引用常用备注
	     mui('.remark-usually').on('tap','.usual-item',function(){
	     	var items=this.parentNode.children;
	     	for(var i=0;i<items.length;i++){
	     		items[i].style.color="#000";
	     		items[i].style.borderColor="#ccc";
	     	}
            this.style.color="#FFCE42";
            this.style.borderColor="#FFCE42";
		 	remarkTxt.value+=this.innerText;
		 	remarkCount.innerHTML=parseInt(remarkCount.innerHTML)+parseInt(this.innerText.length);
		 	if(parseInt(remarkCount.innerHTML)>50){
		 		mui.toast('备注最多50个字哟');
		 		remarkCount.innerHTML=50;
		 		remarkTxt.value=remarkTxt.value.substring(0,50);
		 	}
		 });
	    //点击完成
	    document.getElementById('remark-finish').addEventListener('tap',function(){
	    	 window.location.href="submit-order.php";
	    });
	 </script>
</html>