<?php 
	//函数命名规则:function代表是一个函数插件,test指这个插件的名称,与目录的要相同.smarty_function_插件名
	function smarty_function_test($params){
		// $params的格式:array('参数1'=>'参数值','参数2'=>'参数值')
		// $参数1=$params['参数1'];
		// $参数2=$params['参数2'];
		$width=$params['width'];
		$height=$params['height'];
		$area=$width*$height;
		return $area;
	}
 ?>