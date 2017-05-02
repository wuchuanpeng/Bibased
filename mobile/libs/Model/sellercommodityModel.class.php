<?php 
	class sellercommodityModel{
        /**
         * 商家信息查询
         * @param $uid 商家在登录表的id
         * @return mixed
         */
		function sellerMsg($uid){
			$sql="select * from R_Seller where S_Status>0 and S_UID=".$uid;//查出保存在商家表中的店铺照片和店铺名称
			return DB::findOne($sql);
		}
        /**
         * 查询店铺信息
         * @param $uid 商家在登录表的id
         * @param $shopType 要返回的店铺信息类型 hotel或者agrproduct
         * @return mixed 返回的一条店铺信息
         */
		function shopMsg($uid,$shopType){
			$sellermsg=self::sellerMsg($uid);
			$sid=$sellermsg['S_ID'];
			$shopMsg=self::dataQuery('R_FarmShop','F_Status>0 and F_SID='.$sid,'F_Type DESC');//根据店铺类型查出店铺信息,先排列商店,后酒店
			//会查出两个数据,首先是商店信息,后是酒店信息,根据不同的要求返回不同的数据
			if($shopType=="hotel"){
				return $shopMsg[1];
			}elseif($shopType=="agrProduct") {
				return $shopMsg[0];
			}
		}
        /**
         * 查询多条语句封装
         * @param $table 表名
         * @param $where 条件
         * @param $sort 排序方式
         * @return mixed
         */
		function dataQuery($table,$where,$sort){
			$sql="select * from `".$table."` where ".$where." order by ".$sort;
			return DB::findAll($sql);
		}

		//查询农产品分类信息
		function ProductKind($uid){
			$productmsg=self::shopMsg($uid,'agrProduct');
			$productKinds=self::dataQuery('R_ProductKind','K_Status>0 and K_FID='.$productmsg['F_ID'],'K_ID ASC');
			// var_dump($productKinds);
			return $productKinds;
		}
		//查询农产品分类名为多少的id
		function ProductKind_Name($uid,$agrtype){
			$productmsg=self::shopMsg($uid,'agrProduct');
			$K_FID=$productmsg['F_ID'];//获取农产品所属店铺的ID
			$sql="select * from R_ProductKind where K_Status>0 and K_FID=".$K_FID." and K_Name='".$agrtype."'";
			return DB::findOne($sql);
		}
		//查询房间分类名为多少的id
		function Roomtype_Name($uid,$roomtype){
			$hotelmsg=self::shopMsg($uid,'hotel');
			$sql="select * from R_RomeType where T_Status>0 and T_FID=".$hotelmsg['F_ID']." and T_Name='".$roomtype."'";
			return DB::findOne($sql);
		}


//查出房间的各种信息
		function HotelMsg($uid){
			$hotelmsg=self::shopMsg($uid,'hotel');
			$hotelRoomType=self::dataQuery('R_RomeType','T_Status>0 and T_FID='.$hotelmsg['F_ID'],'T_ID ASC');//查出房间类型
			$roomTypeCount=count($hotelRoomType);
			for($i=0;$i<$roomTypeCount;$i++){
				$roomTid=$hotelRoomType[$i]['T_ID'];
				$restRoom[$i]=self::dataQuery('R_Rome','R_Status>0 and R_State=0 and R_TID='.$roomTid,'R_No ASC');//返回一个三维数组,最外层是房间类型;具体房间详情
				$restRoomNum[$i]=count($restRoom[$i]);//剩余的空房数
				$totalRoom[$i]=self::dataQuery('R_Rome','R_Status>0 and R_TID='.$roomTid,'R_No ASC');
				$totalRoomNum[$i]=count($totalRoom[$i]);//该类型总共的房间数
			}
			$hotelRoomImg=self::dataQuery('R_UploadFiles','L_Status>0 and L_Type=1','L_SpecificID ASC');//不同类型房间的图片
			$back = array('hotelRoomType' => $hotelRoomType,
						  'restRoomNum' => $restRoomNum,
						  'hotelRoomImg' => $hotelRoomImg,
						  'totalRoomNum' => $totalRoomNum);
			return $back;
		}
// 查阅农产品的各种信息
		function ProductMsg($uid){
			$agrProduct=array();
			$$agrProductImg=array();
			$productmsg=self::shopMsg($uid,'agrProduct');
			$productKinds=self::dataQuery('R_ProductKind','K_Status>0 and K_FID='.$productmsg['F_ID'],'K_ID ASC');
			$proKindCount=count($productKinds);
			if($proKindCount!=0){
				for($i=0;$i<$proKindCount;$i++){
					$proKid=$productKinds[$i]['K_ID'];
					$agrProducts[$i]=self::dataQuery('R_Product','P_Status>0 and P_KID='.$proKid,'P_ID ASC');//返回一个三维数组,最外层是农产品类型;具体商品详情
					if($agrProducts[$i]!=""){
						for($j=0;$j<count($agrProducts[$i]);$j++){
							$agrProduct[]=$agrProducts[$i][$j];
							$sql="select * from R_UploadFiles where L_Status>0 and L_Type=0 and L_SpecificID=".$agrProducts[$i][$j]['P_ID'];
							$agrProductImg[]=DB::findOne($sql);
						}
					}		
				}
				$back = array('productKinds' => $productKinds,
						  'agrProduct' => $agrProduct,
						  'agrProductImg' => $agrProductImg);
			}
			return $back;
		}

	
		//保存农产品的新分类
		function saveNewType($newname,$uid){
			$back=array();
			$productmsg=self::shopMsg($uid,'agrProduct');
			$K_FID=$productmsg['F_ID'];//获取农产品所属店铺的ID
			$res=self::ProductKind_Name($uid,$newname);
			if($res){
				$back['save_success']=0;
			}else{
				$dataArr = array('K_FID' => $K_FID,
							 'K_Name' => $newname,
							 'K_Date' => time());
				$insertId=DB::insert('R_ProductKind',$dataArr);
				if($insertId){
					$back['save_success']=1;
				}
			}
			return $back;
		}

//删除分类,并删除分类下的商品
		function deleteAgrType($dtype,$uid){
			$res=self::ProductKind_Name($uid,$dtype);
			$K_ID=$res['K_ID'];
			mysql_query("BEGIN");
			$agrKindArr = array('K_Status' => -1,
								 'K_Update' => time());
			$where1="K_Status>0 and K_ID=".$K_ID;
			$res1=DB::update('R_ProductKind',$agrKindArr,$where1);//更新农产品分类表
			$result=self::dataQuery("R_Product","P_Status>0 and P_KID=".$K_ID,"P_ID ASC");//查看是否有此类的商品
			if($result){
				$agrArr = array('P_Status' => -1,
								'P_Update' => time());
				$where2="P_Status>0 and P_KID=".$K_ID;
				$res2=DB::update('R_Product',$agrArr,$where2);//更新产品表
			}else{
				$res2=true;
			}
			if($res1 && $res2){  
				mysql_query("COMMIT"); 
				$back=true;
			}else{  
			 	mysql_query("ROLLBACK");
			 	$back=false;  
			}
			mysql_query("END");
			return $back;
		}

		//新商品名称的判断,是否重复...酒店
		function HotelNameJudge($hname,$uid){
			$back = array();
			$res=self::Roomtype_Name($uid,$hname);
			if($res){
				$back['is_exist']=1;
			}
			return $back;
		}

		function AgrNameJudge($aname,$uid){
			$back = array();
			$ProKind=self::ProductKind($uid);
			for($i=0;$i<count($ProKind);$i++){
				$res[$i]=self::dataQuery("R_Product","P_Status>0 and P_KID=".$ProKind[$i]['K_ID']." and P_Name='".$aname."'","P_ID ASC");
				if($res[$i]){
					$back['is_exist']=1;
					break;
				}
			}
			return $back;
		}
//添加房间新商品
		function saveNewHotelCommodity($rname,$rremain,$rprice,$rimg,$roomNum,$uid){
			$hotelmsg=self::shopMsg($uid,'hotel');
			$time=time();
			$roomsqlstate=true;
			mysql_query("BEGIN");
			$hotelTypeArr = array('T_FID' => $hotelmsg['F_ID'],
								 'T_Name' => $rname,
								 'T_Price' => $rprice,
								 'T_Date' => $time);
			$insertHotelTypeId=DB::insert('R_RomeType',$hotelTypeArr);
			for($i=0;$i<$rremain;$i++){
				$roomArr[$i] = array('R_TID' => $insertHotelTypeId,
									 'R_No' => $roomNum[$i],
									 'R_State' => 0,
									 'R_Date' => $time);
				$insertId[$i]=DB::insert('R_Rome',$roomArr[$i]);
				$roomsqlstate=$roomsqlstate&&$insertId[$i];
			}
			$hotelImgArr= array('L_Type' => 1,
								'L_SpecificID' => $insertHotelTypeId,
								'L_ImgUrl' => $rimg,
								'L_Name' => $rname,
								'L_Date' => $time);
			$insertHotelImgId=DB::insert('R_UploadFiles',$hotelImgArr);
			if($insertHotelTypeId && $roomsqlstate&&$insertHotelImgId){  
				mysql_query("COMMIT"); 
				$back=true;
			}else{  
			 	mysql_query("ROLLBACK");
			 	$back=false;  
			}
			mysql_query("END");
			return $back;
		}
//保存新的农产品信息
		function saveNewAgrCommodity($aname,$aremain,$aprice,$aimg,$agrtype,$uid){
			$res=self::ProductKind_Name($uid,$agrtype);
			$K_ID=$res['K_ID'];
			$time=time();
			mysql_query("BEGIN");
			$agrArr = array('P_KID' => $K_ID,
							 'P_Name' => $aname,
							 'P_Price' => $aprice,
							 'P_Remain' => $aremain,
							 'P_Date' => $time);
			$insertAgrId=DB::insert('R_Product',$agrArr);
			$agrImgArr= array('L_Type' => 0,
								'L_SpecificID' => $insertAgrId,
								'L_ImgUrl' => $aimg,
								'L_Name' => $aname,
								'L_Date' => $time);
			$insertAgrImgId=DB::insert('R_UploadFiles',$agrImgArr);
			if($insertAgrId && $insertAgrImgId){  
				mysql_query("COMMIT"); 
				$back=true;
			}else{  
			 	mysql_query("ROLLBACK");
			 	$back=false;  
			}
			mysql_query("END");
			return $back;
		}
//查询修改的商品信息
		function reviseAgrMsg($agrId){
			$back=array();
			$sql="select * from R_Product where P_Status>0 and P_ID=".$agrId;
			$result=DB::findOne($sql);
			$back['P_Name']=$result['P_Name'];
			$back['P_Price']=$result['P_Price'];
			$back['P_Remain']=$result['P_Remain'];
			$sql="select * from R_ProductKind where K_Status>0 and K_ID=".$result['P_KID'];
			$res=DB::findOne($sql);
			$back['K_Name']=$res['K_Name'];
			$sql="select * from R_UploadFiles where L_Status>0 and L_Type=0 and L_SpecificID=".$agrId;
			$res=DB::findOne($sql);
			$back['L_ImgUrl']=$res['L_ImgUrl'];
			return $back;
		}

		function reviseHotelMsg($roomTypeId){
			$back=array();
			$sql="select * from R_RomeType where T_Status>0 and T_ID=".$roomTypeId;
			$result=DB::findOne($sql);
			$back['T_Name']=$result['T_Name'];
			$back['T_Price']=$result['T_Price'];
			$res=self::dataQuery("R_Rome","R_Status>0 and R_TID=".$result['T_ID'],"R_ID ASC");
			$roomnumdata=array();
			for($i=0;$i<count($res);$i++){
				$roomnumdata[]=$res[$i]['R_No'];
			}
			$back['roomdata']=$roomnumdata;
			$sql="select * from R_UploadFiles where L_Status>0 and L_Type=1 and L_SpecificID=".$roomTypeId;
			$res=DB::findOne($sql);
			$back['L_ImgUrl']=$res['L_ImgUrl'];
			return $back;
		}
//修改农产品信息
		function modAgrCommodity($aname,$aremain,$aprice,$aimg,$agrtype,$aid,$uid){
			$res=self::ProductKind_Name($uid,$agrtype);
			$K_ID=$res['K_ID'];//获取新的分类的id
			$time=time();
			mysql_query("BEGIN");
			$agrArr = array('P_KID' => $K_ID,
							 'P_Name' => $aname,
							 'P_Price' => $aprice,
							 'P_Remain' => $aremain,
							 'P_Update' => $time);
			$where1="P_Status>0 and P_ID=".$aid;
			$updateRes1=DB::update('R_Product',$agrArr,$where1);
			$agrImgArr= array('L_ImgUrl' => $aimg,
							  'L_Name' => $aname,
							  'L_Update' => $time);
			$where2="L_Status>0 and L_Type=0 and L_SpecificID=".$aid;
			$updateRes2=DB::update('R_UploadFiles',$agrImgArr,$where2);
			if($updateRes1 && $updateRes2){  
				mysql_query("COMMIT"); 
				$back=true;
			}else{  
			 	mysql_query("ROLLBACK");
			 	$back=false;  
			}
			mysql_query("END");
			return $back;
		}

		function modHotelCommodity($rname,$rremain,$rprice,$rimg,$roomNum,$rtid,$uid){
			$time=time();
			$roomsqlstate=true;
			mysql_query("BEGIN");
			$hotelTypeArr = array('T_Name' => $rname,
								 'T_Price' => $rprice,
								 'T_Update' => $time);
			$where1="T_Status>0 and T_ID=".$rtid;
			$updateRes1=DB::update('R_RomeType',$hotelTypeArr,$where1);
			for($i=0;$i<$rremain;$i++){
				$roomArr[$i] = array('R_TID' => $rtid,
									 'R_No' => $roomNum[$i],
									 'R_State' => 0,
									 'R_Date' => $time);
				$insertId[$i]=DB::insert('R_Rome',$roomArr[$i]);
				$roomsqlstate=$roomsqlstate&&$insertId[$i];
			}
			$hotelImgArr= array('L_ImgUrl' => $rimg,
								'L_Name' => $rname,
								'L_Update' => $time);
			$where2="L_Status>0 and L_Type=1 and L_SpecificID=".$rtid;
			$updateRes2=DB::update('R_UploadFiles',$hotelImgArr,$where2);
			if($updateRes1 && $roomsqlstate&&$updateRes2){  
				mysql_query("COMMIT"); 
				$back=true;
			}else{  
			 	mysql_query("ROLLBACK");
			 	$back=false;  
			}
			mysql_query("END");
			return $back;
		}

		function deleteDefaultRoom($rtid){
			$where="R_Status>0 and R_TID=".$rtid;
			$delRes=DB::del('R_Rome',$where);
			if($delRes){
				return true;
			}else{
				return false;
			}
		}

		function deleteCommodity($id,$type){
			$time=time();
			mysql_query("BEGIN");
			if($type=="product"){
				$agrArr = array('P_Status' => -1,
								 'P_Update' => $time);
				$where1="P_Status>0 and P_ID=".$id;
				$updateRes1=DB::update('R_Product',$agrArr,$where1);
				$agrImgArr= array('L_Status' => -1,
								  'L_Update' => $time);
				$where2="L_Status>0 and L_Type=0 and L_SpecificID=".$id;
				$updateRes2=DB::update('R_UploadFiles',$agrImgArr,$where2);
			}else{
				$hotelTypeArr = array('T_Status' => -1,
									 'T_Update' => $time);
				$where1="T_Status>0 and T_ID=".$id;
				$updateRes1=DB::update('R_RomeType',$hotelTypeArr,$where1);

				$hotelArr = array('R_Status' => -1,
								  'R_Update' => $time);
				$where2="R_Status>0 and R_TID=".$id;
				$updateRes2=DB::update('R_Rome',$hotelArr,$where2);
				
				$hotelImgArr= array('L_Status' => -1,
									'L_Update' => $time);
				$where3="L_Status>0 and L_Type=1 and L_SpecificID=".$id;
				$updateRes3=DB::update('R_UploadFiles',$hotelImgArr,$where3);
				$updateRes2=$updateRes2&&$updateRes3;
			}
			if($updateRes1 && $updateRes2){  
				mysql_query("COMMIT"); 
				$back=true;
			}else{  
			 	mysql_query("ROLLBACK");
			 	$back=false;  
			}
			mysql_query("END");
			return $back;
		}
}?>