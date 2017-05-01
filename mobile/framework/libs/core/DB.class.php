<?php 
	/*
	*核心库,DB工厂类,通过这个类创建数据库操作类的对象,如mysql.class.php中的mysql类
	*/
	class DB{
	//类名在php中是一个全局变量,在任何地方都可以以DB::$db,DB::方法()来调用变量和方法

		public static $db;//用于保存新建的实例化对象

		public static function init($dbtype,$config){//$dbtype:要初始化的数据库操作类的类型;$config:对这个操作类进行配置的信息
			self::$db=new $dbtype;
			self::$db->connect($config);
		}

		public static function query($sql){
			return self::$db->query($sql);
		}

		public static function findAll($sql){
			$query=self::$db->query($sql);
			return self::$db->findAll($query);
		}

		public static function findOne($sql){
			$query=self::$db->query($sql);
			return self::$db->findOne($query);
		}

		public static function findResult($sql,$row=0,$field=0){
			$query=self::$db->query($sql);
			return self::$db->findResult($query,$row,$field);
		}

		public static function insert($table,$arr){
			return self::$db->insert($table,$arr);
		}

		public static function update($table,$arr,$where){
			return self::$db-> update($table,$arr,$where);
		}

		public static function del($table,$where){
			return self::$db-> del($table,$where);
		}

	}

 ?>