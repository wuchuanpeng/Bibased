<?php 
	function smarty_modifier_test($utime,$format){//参数单个传入,时间戳和时间格式
		return date($format,$utime);
	}
 ?>