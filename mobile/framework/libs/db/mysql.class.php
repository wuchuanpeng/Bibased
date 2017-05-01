<?php 
	/*
	*DB引擎库
	*/
	class mysql{

		/*
		*报错函数
		*
		*@param string $error
		*/
		function err($error){
			die("对不起,您的操作有误,错误原因为:".$error);//die有两种作用,输出和终止,相当于echo和exit的组合
		}


		/*
		*连接数据库
		*
		*@param string $config 配置数组 array($dbhost,$dbuser,$dbpsw,$dbname,$dbcharset)
		* @param string $dbhost 主机名
		* @param string $dbuser 用户名
		* @param string $dbpsw  密码
		* @param string $dbname 数据库名
		* @param string $dbcharset 字符集/编码
		*@return bool 连接成功不成功
		*/
		function connect($config){
			extract($config);//将数组还原成变量
			if (!($con=mysql_connect($dbhost,$dbuser,$dbpsw))) {//mysql_connect连接数据库
				$this->err(mysql_error());
			}
			if(!mysql_select_db($dbname,$con)){//mysql_select_db选择库
				$this->err(mysql_error());
			}
			mysql_query("set names ".$dbcharset);//mysql_query设置编码格式
			ini_set('display_errors',0);
		}

		/*
		*执行sql语句
		*
		*@param string $sql
		*@return bool 返回执行成功,资源或者执行失败
		*/
		function query($sql){
			if (!($query=mysql_query($sql))) {//mysql_query执行sql命令
				$this->err($sql."<br />".mysql_error());//mysql_error报错
			}else{
				return $query;
			}
		}

		/*
		*列表
		*
		*@param source $query sql语句通过mysql_query执行出来的资源
 		*@return array 返回列表数组
		*/		
 		function findAll($query){
 			while($rs=mysql_fetch_array($query,MYSQL_ASSOC)){//mysql_fetch_array把资源转换成数组.一次转换出一行;MYSQL_ASSOC规定转换出的数组包含哪些信息,这里只包含一个关联数组
 				$list[]=$rs;
 			}
 			return isset($list)?$list:"";//isset 判断$list是否存在
 		}

 		/*
		*单条
		*
		*@param source $query sql语句通过mysql_query执行出来的资源
 		*@return array 返回单条信息数组
		*/	
 		function findOne($query){
 			$rs=mysql_fetch_array($query,MYSQL_ASSOC);
 			return $rs;
 		}

 		/*
		*指定行的指定字段的值
		*
		*@param source $query sql语句通过mysql_query执行出来的资源
 		*@return array 指定行的指定字段的值
		*/		
 		function findResult($query,$row=0,$field=0){
 			$rs=mysql_result($query,$row,$field);//mysql_result 返回指定行指定字段的值
 			return $rs;
 		}

 		/*
		*添加函数
		*
		*@param string $table 表名
 		*@param array $arr 添加数组(包含字段和值的一维数组)
 		*
		*/	
		function insert($table,$arr){

			foreach($arr as $key => $value) {
				$value=mysql_real_escape_string($value);//将字符串里的特殊字符进行过滤转义
				$keyArr[]="`".$key."`";//将键名保存到$keyArr中
				$valueArr[]="'".$value."'";//将键值保存到$valueArr中
			}

			$keys=implode(",",$keyArr);//implode将数组组合成字符串,implode(分隔符,数组)
			$values=implode(",",$valueArr);
			$sql="insert into ".$table." (".$keys.") values (".$values.")";//sql插入语句
			$this->query($sql);
			return mysql_insert_id();
		}	

		/*
		*修改函数
		*
		*@param string $table 表名
 		*@param array $arr 修改数组(包含字段和值的一维数组)
 		*@param string $where 条件
 		*
		*/	
		function update($table,$arr,$where){

			foreach($arr as $key => $value) {
				$value=mysql_real_escape_string($value);
				$keyAndValueArr[]="`".$key."`='".$value."'";//将键名=键值保存到$keyAndValueArr
			}

			$keysAndValues=implode(",",$keyAndValueArr);
			$sql="update ".$table." set ".$keysAndValues." where ".$where;//sql修改语句
			return $this->query($sql);
		}	

		/*
		*删除函数
		*
		*@param string $table 表名
 		*@param string $where 条件
 		*
		*/	
		function del($table,$where){
			$sql="delete from ".$table." where ".$where;
			return $this->query($sql);
		}

	}
 ?>