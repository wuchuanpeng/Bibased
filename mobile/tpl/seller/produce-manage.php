<?php 
header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
	</head>
	<body> 
		
		<ul class="hotel-content">
		{foreach from=$agrProduct item=value key=k}
			<li class="hotel-detail clearfloat" id="agrProduct-{$value.P_ID}">
				<div class="detail-left">
					<img src="{foreach from=$agrProductImg item=avalue}
							{if $value.P_ID eq $avalue.L_SpecificID }
								{$avalue.L_ImgUrl}
								{break}
							{/if}
							{/foreach}"/>
				</div>
				<ul class="detail-right">
					<li class="item1 clearfloat">
						<span class="right-item">{$value.P_Name}</span>
						<span class="right-item">
							{foreach from=$productKinds item=pvalue}
							{if $value.P_KID eq $pvalue.K_ID}
								{$pvalue.K_Name}
								{break}
							{/if}
							
							{/foreach}

						</span>
					</li>
					<li class="item2 clearfloat">
						<span class="right-item">¥{$value.P_Price}/斤</span>
						<span class="right-item">{$value.P_Remain}斤</span>
					</li>
				</ul>
			</li>
		{/foreach}
		</ul>
	</body>
</html>