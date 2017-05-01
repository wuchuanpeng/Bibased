<?php 
//核心库,视图引擎工厂类
	class VIEW{
		public static $view;

		public static function init($viewtype,$config){
			self::$view=new $viewtype;
			// $smarty=new Smarty();
			// $smarty->left_delimiter="{";//左定界符
			// $smarty->right_delimiter="}";//右定界符
			// $smarty->template_dir="tpl";//html模板的位置
			// $smarty->compile_dir="template_c";//模板编译生成的文件目录
			// $smarty->cache_dir="cache";//缓存目录
			foreach ($config as $key => $value) {
				self::$view->$key=$value;
			}
		}

		public static function assign($data){
			foreach ($data as $key => $value) {
				self::$view->assign($key,$value);
			}
		}

		public static function display($template){
			self::$view->display($template);
		}

	}
 ?>