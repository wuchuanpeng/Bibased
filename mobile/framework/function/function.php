<?php 
/*
*函数库
*/

	function C($name,$method){
		require_once('/libs/Controller/'.$name.'Controller.class.php');
		eval('$obj=new '.$name.'Controller();$obj->'.$method.'();');
	}

	function M($name){
		require_once('/libs/Model/'.$name.'Model.class.php');
		eval('$obj=new '.$name.'Model();');
		return $obj;
	}

	function V($name){
		require_once('/libs/View/'.$name.'View.class.php');
		eval('$obj=new '.$name.'View();');
		return $obj;
	}

	//对非法字符进行转义,addslashes()对单引号等特殊符号进行转义,get_magic_quotes_gpc()系统自动对特殊符号进行转义
	function daddslashes($str){
		return (!get_magic_quotes_gpc())?addslashes($str):$str;
	}

//path是路径,name是第三方类名,params是该类初始化的时候需要指定,赋值的属性,格式为array(属性名=>属性值,属性名2=>属性值2...)
	function ORG($path,$name,$params=array()){//该函数用来调用第三方类
		require_once('libs/ORG/'.$path.$name.'.class.php');
		$obj=new $name();
		if(!empty($params)){
			foreach ($params as $key => $value) {
				$obj->$key=$value;
			}
		}
		return $obj;
	}
 ?>