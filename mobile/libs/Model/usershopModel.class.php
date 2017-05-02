<?php 
	class usershopModel{
        /**
         * 获取商户列表
         * @param $startItem 数据库中第几个
         * @param $listNum  查出几个
         * @return mixed
         */
        function getSellerList($startItem, $listNum) {
            $sql = "SELECT S_ID,S_ShopName,S_ShopImgUrl,S_Coordinate FROM `r_seller` WHERE S_Status = 1 LIMIT $startItem,$listNum";
            $result = DB::findAll($sql); //取出商家基本信息
            foreach ($result as $key => $item) {
                $SID = $item['S_ID'];
                //查询订单数量
                $sql = "SELECT count(*) `count` FROM `r_order`,r_farmshop WHERE O_Status = 1 AND F_Status = 1 AND O_FID = F_ID AND F_SID = $SID";
                $orderCount = DB::findOne($sql);
                $result[$key]['orderCount'] = $orderCount['count'];
                //查询评分
                $sql2 = "SELECT AVG(E_Score) `score` FROM r_evaluate,`r_order`,r_farmshop WHERE E_Status = 1 AND O_Status = 1 AND F_Status = 1 AND E_ReplyID = -1 AND E_OID = O_ID AND O_FID = F_ID AND F_SID = $SID";
                $score = DB::findOne($sql2);
                $result[$key]["score"] = (int) $score['score'];
                //优惠信息
                $sql3 = "SELECT d.D_FID,d.D_Type,d.D_Type1Full,d.D_Type1Reduce,d.D_Type2Reduce FROM `r_discount` d,r_farmshop WHERE D_Status = 1 AND F_Status = 1 AND D_FID = F_ID AND F_SID = $SID ORDER BY d.D_Type,D_Type2Reduce";
                $discount = DB::findAll($sql3);
                $result[$key]["discount"] = $discount;
            }
            return $result;
        }

        /**
         * 获取商户信息
         * @param $sid
         * @param $uid
         * @return mixed
         */
        function getSellerInfoById ($sid, $uid) {
            $sql = "SELECT S_ID,S_ShopName,S_ShopImgUrl,S_Coordinate,S_Address FROM `r_seller` WHERE S_Status = 1 AND S_ID = $sid ";
            $result = DB::findOne($sql);
            //是否收藏
            $sql2 = "SELECT count(*) `count` FROM r_collection,r_buyer WHERE B_Status = 1 AND L_Status = 1 AND L_BID = B_ID AND B_UID = $uid AND L_FID = $sid ";
            $result2 = DB::findOne($sql2);
            $result['isCollection'] = $result2['count'];
            return $result;
        }

        /**
         * 设置是否收藏
         * @param $sid
         * @param $uid
         * @param $isCollection
         */
        function setCollection ($sid, $uid, $isCollection) {
            $sql = "SELECT B_ID FROM r_buyer WHERE B_UID = $uid AND B_Status = 1 ";
            $result = DB::findOne($sql);
            $bid = $result['B_ID'];
            $table = "r_collection";
            $arr = array();
            if ($isCollection == 1) {
                $arr['L_BID'] = $bid;
                $arr['L_FID'] = $sid;
                $arr['L_Date'] = time();
                $arr['L_Update'] = time();
                DB::insert($table,$arr);
            }else {
                $arr['L_Status'] = -1;
                $arr['L_Update'] = time();
                $where = "L_Status = 1 AND L_BID = $bid AND L_FID = $sid";
                DB::update($table, $arr, $where);
            }
        }

        /**
         * 获取商户优惠列表
         * @param $sid
         */
        function getDiscountBySID ($sid){
            $sql3 = "SELECT d.D_FID,d.D_Type,d.D_Type1Full,d.D_Type1Reduce,d.D_Type2Reduce FROM `r_discount` d,r_farmshop WHERE D_Status = 1 AND F_Status = 1 AND D_FID = F_ID AND F_SID = $sid ORDER BY d.D_Type,D_Type2Reduce";
            $discount = DB::findAll($sql3);
            return $discount;
        }

        /**
         * 获取商品信息
         * @param $sid
         */
        function getProducts ($sid) {
            //1.查询所有商品类型
            $sql = "SELECT K_ID,K_Name FROM `r_productkind`, r_farmshop WHERE K_Status = 1 AND F_Status = 1 AND K_FID = F_ID AND F_SID = $sid";
            $productkis = DB::findAll($sql);
            foreach ($productkis as $key => $productki) {
                $kid = $productki['K_ID'];
                //获取该类型下面的所有商品
                $sql = "SELECT P_ID,P_Name,P_Price,P_Remain, L_ImgUrl FROM r_product, r_uploadfiles  WHERE P_Status = 1 AND P_ID = L_SpecificID AND L_Status = 1 AND L_Type = 0 AND P_KID = $kid";
                $products = DB::findAll($sql);
                //获取商品的销售量
                foreach ($products as $key2 => $product) {
                    $pid = $product['P_ID'];
                    $sql = "SELECT COUNT(*) `count` FROM r_agrorder WHERE A_Status = 1 AND A_PID = $pid";
                    $counts = DB::findOne($sql);
                    $count = $counts['count'];
                    $products[$key2]['count'] = $count;
                }
                $productkis[$key]["products"] = $products;
            }
            return $productkis;
        }
    }
 ?>