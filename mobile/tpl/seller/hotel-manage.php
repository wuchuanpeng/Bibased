<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
	</head>
	<body> 
		
		
		<ul class="hotel-content">
		{foreach from=$hotelRoomType item=value key=k}
			<li class="hotel-detail clearfloat" id="hotel-{$value.T_ID}">
				<div class="detail-left">
					{foreach from=$hotelRoomImg item=Ivalue}
					{if $value.T_ID eq $Ivalue.L_SpecificID}
					<img src="{$Ivalue.L_ImgUrl}"/>
					{break}
					{/if}
					{/foreach}
				</div>
				<ul class="detail-right">
					<li class="item1 clearfloat">
						<span class="right-item">{$value.T_Name}</span>
						<span class="right-item">共{$totalRoomNum.{$k}}间</span>
					</li>
					<li class="item2 clearfloat">
						<span class="right-item">¥{$value.T_Price}</span>
						<span class="right-item">剩{$restRoomNum.{$k}}间</span>
					</li>
				</ul>
			</li>
		{foreachelse}
			nothing
		{/foreach}
		</ul>
	</body>
</html>