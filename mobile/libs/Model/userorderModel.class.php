<?php
    class userorderModel{
        /**
         * 获取用户的所有订单
         */
        function getAllOrder() {
            $buyerInfo = $this->getBuyerInfo();
            $bid = $buyerInfo["B_ID"];
            $sql = "SELECT O_ID,O_FID,O_BID,O_NO,O_RealPrice,O_PayState,O_PayTime,O_HandleState,S_ID,S_ShopImgUrl,S_ShopName,O_Date FROM r_order,r_farmshop,r_seller WHERE O_Status = 1 AND O_BID = 2 AND F_Status = 1 AND S_Status = 1 AND O_FID = F_ID AND F_SID = S_ID";
            $result = DB::findAll($sql);
            //判断是否评价
            foreach ($result as $key => $order) {
                $oid = $order["O_ID"];
                $sql = "SELECT count(*) `count` FROM r_evaluate WHERE E_OID = $oid AND E_Status = 1 AND E_ReplyID = -1";
                $re = DB::findOne($sql);
                if ($re["count"] > 0) {
                    $result[$key]["isEvaluate"] = 1;
                }else {
                    $result[$key]["isEvaluate"] = 0;
                }
            }
            return $result;
        }

        /**
         * 获取买家信息
         * @return mixed
         */
        function getBuyerInfo() {
            $uid = $_SESSION["buyer_id"];
            $sql = "SELECT * FROM r_buyer WHERE B_UID = $uid AND B_Status = 1";
            $result = DB::findOne($sql);
            return $result;
        }

        /**
         * 订单页面去支付
         * @param $oid
         * @return  mixed
         */
        function orderGoPay($oid) {
            $sql = "SELECT O_RealPrice,S_ShopName FROM r_order,r_farmshop,r_seller WHERE O_ID = $oid AND O_Status = 1 AND O_FID = F_ID  AND F_Status = 1 AND F_SID = S_ID AND S_Status = 1";
            $result = DB::findOne($sql);
            return array("sum" => $result["O_RealPrice"], "shopName" => $result["S_ShopName"],
                "orderId" => $oid);
        }

        function sureOrder($oid) {
            $table = "r_order";
            $arr = array("O_HandleState"=>2, "O_Update" => time());
            $where = "O_ID = $oid";
            return DB::update($table,$arr,$where);
        }
    }

?>