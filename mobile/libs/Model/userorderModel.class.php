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

        /**
         * 确认收货
         * @param $oid
         * @return mixed
         */
        function sureOrder($oid) {
            $table = "r_order";
            $arr = array("O_HandleState"=>2, "O_Update" => time());
            $where = "O_ID = $oid";
            return DB::update($table,$arr,$where);
        }

        /**
         * 获取订单详情
         * @param $oid
         * @return array
         */
        function orderDetail($oid) {
            $sql = "SELECT S_ID,S_ShopName,S_ShopImgUrl,F_Tel,O_ID,O_RealPrice,O_PayState,O_HandleState,O_BID,O_No,O_Date,O_Desc FROM r_order,r_farmshop,r_seller WHERE O_ID = $oid AND O_Status = 1 AND O_FID = F_ID AND F_Status = 1 AND F_SID = S_ID AND S_Status = 1";
            $result1 = DB::findOne($sql);
            $bid = $result1["O_BID"];
            $sql = "SELECT B_Tel,B_ReceiptAddr FROM r_buyer WHERE B_Status = 1 AND  B_ID = $bid";
            $result2 = DB::findOne($sql);
            $sql = "SELECT A_Name,A_Count,A_RealPrice FROM r_agrorder WHERE A_OID = 6 AND A_Status = 1";
            $result3 = DB::findAll($sql);
            $sql = "SELECT count(*) `count` FROM r_evaluate WHERE E_OID = $oid AND E_Status = 1 AND E_ReplyID = -1";
            $re = DB::findOne($sql);
            if ($re["count"] > 0) {
                $result1["isEvaluate"] = 1;
            }else {
                $result1["isEvaluate"] = 0;
            }
            return array("sellerInfo" => $result1, "buyerInfo" => $result2, "agrorders" => $result3);
        }

        /**
         * 跳转到评价
         * @param $oid
         * @return array
         */
        function evaluatePage($oid) {
            $sql = "SELECT S_ShopName,S_ShopImgUrl,O_ID FROM r_order,r_farmshop,r_seller WHERE O_ID = $oid AND O_Status = 1 AND O_FID = F_ID AND F_Status = 1 AND F_SID = S_ID AND S_Status = 1";
            $result1 = DB::findOne($sql);
            return array("orderInfo" => $result1);
        }

        /**
         * 评价
         * @param $arr
         * @return mixed
         */
        function submitAccess($arr) {
            $imgurl = $arr["imgurl"];
            unset($arr["imgurl"]);
            DB::query("BEGIN");
            $table = "r_evaluate";
            $arr["E_Date"] = time();
            $arr["E_Update"] = time();
            $eid = DB::insert($table,$arr);
            if ($imgurl == "") {
                DB::query("COMMIT");
                return $eid;
            }
            $table="r_uploadfiles";
            $arr2 = array();
            $arr2["L_Type"] = 2;
            $arr2["L_SpecificID"] = $eid;
            $arr2["L_ImgUrl"]= $imgurl;
            $arr2["L_Date"] = time();
            $arr2["L_Update"] = time();
            $uid = DB::insert($table,$arr2);

            if($eid > 0 && $uid > 0) {
                DB::query("COMMIT");
                return $uid;
            }
            DB::query("ROLLBACK");
        }
    }

?>