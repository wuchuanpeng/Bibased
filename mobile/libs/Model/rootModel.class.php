<?php
class rootModel{
    /**
     * 获取商家列表
     * @return mixed
     */
    function getSellerList(){
        $sql = "SELECT S_ID sid, S_ShopName shopname, S_Address shopaddress, S_Name sname, S_Tel stel, S_Desc `sdesc` , U_Password `spassword`,U_ID uid,S_Account shopaccount FROM R_Seller, r_user WHERE S_Status =1 AND S_UID = U_ID AND U_Status =1";
        $res = DB::findAll($sql);
        foreach ($res as $key => $value){
            $res[$key]['no'] = $key + 1;
        }
        return $res;
    }

    /**
     * 修改商家数据
     * @param $updateUserArr R_User更新数据
     * @param $uid
     * @param $updateSellerArr R_Seller更新数据
     * @param $sid
     * @return int
     */
    function saveUpdateSeller($updateUserArr,$uid,$updateSellerArr,$sid){
        DB::query("BEGIN");
        $where1 = "U_Status = 1 AND U_ID = ".$uid;
        $table1 = 'R_User';
        $updateRes1 = DB::update($table1,$updateUserArr,$where1);
        $where2 = "S_Status = 1 AND S_ID = ".$sid;
        $table2 = 'R_Seller';
        $updateRes2 = DB::update($table2,$updateSellerArr,$where2);
        if($updateRes1&&$updateRes2){
            DB::query("COMMIT");
            return 1;
        }else{
            DB::query("ROLLBACK");
        }
        DB::query('END');
    }

    /**
     * 新增商家
     * @param $insertUserArr
     * @param $Seller 新增数据
     * @return int
     */
    function saveNewSeller($insertUserArr,$Seller){
        DB::query("BEGIN");
        $table1 = "R_User";
        $insertId1 = DB::insert($table1,$insertUserArr);
        $insertSellerArr = array('S_UID' => $insertId1,
                                'S_ShopName' => $Seller['shopName'],
                                'S_Address' => $Seller['shopAddress'],
                                'S_Coordinate' => $Seller['latlng'],
                                'S_Name' => $Seller['shopOwner'],
                                'S_Tel' => $Seller['shopTel'],
                                'S_Desc' => $Seller['desc'],
                                'S_Date' => time());
        $table2 = 'R_Seller';
        $insertId2 = DB::insert($table2,$insertSellerArr);
        $insertShopArr1 = array('F_SID' => $insertId2,
                                'F_Type' => 0,
                                'F_Tel' => $Seller['shopTel'],
                                'F_Date' => time());
        $insertShopArr2 = array('F_SID' => $insertId2,
                                'F_Type' => 1,
                                'F_Tel' => $Seller['shopTel'],
                                'F_Date' => time());
        $table3 = 'R_FarmShop';
        $insertId3 = DB::insert($table3,$insertShopArr1);
        $insertId4 = DB::insert($table3,$insertShopArr2);
        if($insertId1&&$insertId2&&$insertId3&&$insertId4){
            DB::query("COMMIT");
            return 1;
        }else{
            DB::query("ROLLBACK");
        }
        DB::query('END');
    }
}
?>