<?php 
	class sellerorderModel{
        /**
         * 商家信息查询
         * @param $uid 商家在登录表的id
         * @return mixed
         */
        function sellerMsg($uid){
            $sql="select * from R_Seller where S_Status>0 and S_UID=".$uid;
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

        function orderData($uid){
            $AgrData = self::shopMsg($uid,"agrProduct");
            $orderMsg=self::dataQuery("R_Order","O_Status>0 and O_HandleState=0 and O_PayState=1 and O_FID=".$AgrData['F_ID'],"O_Date DESC");
            if($orderMsg!="") {
                $agrOrder = array();
                $orderBuyerMsg=array();
                for ($i = 0; $i < count($orderMsg); $i++) {
                    $sql="select * from R_Buyer where B_Status>0 and B_ID=".$orderMsg[$i]['O_BID'];
                    $orderBuyerMsg[]=DB::findOne($sql);
                    $agrOrder[$i] = self::dataQuery("R_AgrOrder", "A_Status > 0 and A_OID = " . $orderMsg[$i]['O_ID'], "A_Date DESC");
                    for ($j = 0; $j < count($agrOrder[$i]); $j++) {
                        $sql = "select * from R_UploadFiles where L_Status>0 and L_Type=0 and L_SpecificID=" . $agrOrder[$i][$j]['A_PID'];
                        $agrOrderImg[$i][] = DB::findOne($sql);
                    }
                }
            }
            $back = array('orderMsg' => $orderMsg,
                          'orderBuyerMsg' => $orderBuyerMsg,
                          'agrOrder' => $agrOrder,
                          'agrOrderImg' => $agrOrderImg);
            return $back;
        }
		
	}
 ?>



