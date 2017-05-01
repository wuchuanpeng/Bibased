<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>选择农产品种类</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/apply-page.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff" onclick="window.close();"></a>
	        <h1 class="mui-title" style="color: #fff;">选择农产品种类</h1>
	    </header>
	    <ul class="mui-table-view" style="padding-top: 44px;">
	    	{if $productKinds eq ""}
	    	{else}
	    	{foreach from=$productKinds item=value}
	    	<li class="mui-table-view-cell bbbb mui-checkbox">
	    		<div class="mui-slider-right mui-disabled">
					<a class="mui-btn mui-btn-red">删除</a>
				</div>
				<div class="mui-slider-handle">
					<label>{$value.K_Name}</label>
					<input style="top: -5px;" name="kinds" class="input_check" value="{$value.K_Name}" type="checkbox">
				</div>
			</li>
			{foreachelse}
				当前没有数据
			{/foreach}
			{/if}
			<li class="mui-table-view-cell" id="new-add" style="padding:0;">
				<p id="new-type"  onclick="create_new()">新建分类...</p>
				<div class="input_div display_none" id="input_div">
		    		<input type="text" name="input_text" id="input_text" value="" placeholder="输入分类名称,并点击回车提交">
		   		</div>
			</li>

	    </ul>
	   
	   
	</body>
	<script src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="buyerstyle/js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="buyerstyle/js/func.js" type="text/javascript" charset="utf-8"></script>
	<script src="buyerstyle/js/getUrlAddr.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var nowType=getNowType();//获取url传过来的默认分类
		var checkbox=document.getElementsByClassName('input_check');
		if(nowType!=""){
			for(var i=0;i<checkbox.length;i++){
				if(checkbox[i].value==nowType){
					checkbox[i].checked="true";
					break;
				}
			}
		}
		
//点击选择分类		
		mui('.mui-table-view').on('tap','.mui-slider-handle',function(){
			var value=this.children[1].value;
			valueBack(value);
		});

//返回值到父页面
		function valueBack(value){
 			window.opener.document.getElementById('agr-kind').value = value;
			window.close();
		}

//新建分类
		var newType=document.getElementById('new-type');
		var inputDiv=document.getElementById('input_div');
		function create_new(){
			newType.classList.add('display_none');
			inputDiv.classList.remove('display_none');
		}
		//点击回车保存信息
		$('#input_div').bind('keyup', function(event) {
			if (event.keyCode == "13") {
				//回车执行查询
				var newTypeName=document.getElementById('input_text').value;
				
				doajax("admin.php?controller=sellercommodity&method=save_newType",{
					newTypeName:newTypeName
				},"json",function(msg){
					if(msg['save_success']==1){
						mui.toast('添加成功');
						var table = document.body.querySelector('.mui-table-view');
						var newAdd = document.getElementById('new-add');
						var li=document.createElement('li');
						li.className='mui-table-view-cell bbbb mui-checkbox';
						li.innerHTML = '<div class="mui-slider-right mui-disabled">'+
											'<a class="mui-btn mui-btn-red">删除</a>'+
										'</div>'+
										'<div class="mui-slider-handle">'+
											'<label>'+newTypeName+'</label>'+
											'<input style="top: -5px;" name="kinds" class="input_check" value="'+newTypeName+'" type="checkbox">'+
										'</div>';
						table.insertBefore(li,newAdd);
					}else{
						mui.toast('已有该分类');
					}
				});
				newType.classList.remove('display_none');
				inputDiv.classList.add('display_none');
			}
		});

		mui('.mui-table-view').on('tap', '.mui-btn', function(event) {
			var elem = this;
			var li = elem.parentNode.parentNode;
			event.stopPropagation();//阻止事件冒泡
			mui.confirm('确认删除该条记录？', '', btnArray, function(e) {
				if (e.index == 0) {
					var deleteAgrType=li.children[1].children[1].value;
					doajax("admin.php?controller=sellercommodity&method=delete_AgrType", {
						deleteAgrType:deleteAgrType
					}, "json", function(msg){
						if(msg){
							mui.toast('删除成功');
							li.parentNode.removeChild(li);
						}
					});

				} else {
					setTimeout(function() {
						mui.swipeoutClose(li);
					}, 0);
				}
			});
		});
		var btnArray = ['确认', '取消'];
	</script>

</html>