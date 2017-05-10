<?php
class userorderController{
    public $userId;
    public $userObj;
    public $userOrderObj;

    public function __construct(){
        if(!(isset($_SESSION['loginuser']))){
            header("Location:admin.php");
            exit;
        }else{
            $this->userId=isset($_SESSION['buyer_id'])?$_SESSION['buyer_id']:array();
            $this->userObj=M('usershop');
            $this->userOrderObj = M("userorder");
        }
    }

    /**
     * 加载order主页面
     */
    function index(){
        $back = $this ->userOrderObj ->getAllOrder();
        VIEW::assign(array("orderAll" => $back));
        VIEW::display('buyer/orderN.php');

    }

    /**
     * 加载评价页面
     */
    function location_evaluatePage(){
        $oid = $_GET["oid"];
        $result = $this->userOrderObj->evaluatePage($oid);
        VIEW::assign($result);
        VIEW::display("buyer/menuaccess.php");
    }

    /**
     * 加载订单详情
     */
    function location_orderDetail(){
        $oid = $_GET["oid"];
        $result = $this ->userOrderObj->orderDetail($oid);
        VIEW::assign($result);
        VIEW::display("buyer/order-detail.php");
    }
    /**
     * 加载餐馆详情
     */
    function location_restDetail(){
        VIEW::display("buyer/restaurant-detail.php");
    }
    /**
     * 加载结算页面
     */
    function location_submitOrder(){
        $sid = $_POST['sid'];
        $data = $_POST;
        $result = $this -> userObj -> submitOrder($sid,$data);
        VIEW::assign($result);
        VIEW::display("buyer/submit-order.php");
    }
    /**
     * 加载查看酒店图片
     */
    function location_hotelImg(){
        VIEW::display("buyer/hotel-imgs.php");
    }

    /**
     * 去支付界面
     */
    function orderSubmit() {
        $sid = $_POST['sid'];
        $data = $_POST;
        $result = $this -> userObj -> orderSubmit($sid,$data);
        VIEW::assign($result);
        VIEW::display("buyer/order-pay.php");
    }

    /**
     * 支付
     */
    function orderPay() {
        $oid = $_POST["orderId"];
        $result = $this ->userObj -> orderPay($oid);
        echo 1;
    }

    /**
     *订单页面去支付
     */
    function orderGoPay() {
        $oid = $_GET["oid"];
        $result = $this -> userOrderObj -> orderGoPay($oid);
        VIEW::assign($result);
        VIEW::display("buyer/order-pay.php");
    }
    /**
     * 确认收货
     */
    function sureOrder() {
        $oid = $_POST["oid"];
        $result = $this ->userOrderObj ->sureOrder($oid);
        echo $result;
    }

    /**
     * 提交评价
     */
    function submitAccess() {
        $result = $this->userOrderObj->submitAccess($_POST);
        echo $result;
    }

    /**
     * 文件上传
     */
    function accessFileUpload() {
        $arr = array();
        foreach ($_FILES as $key=>$file) {
            $arr[] = $this->upload_imag($file);
        }
        echo json_encode($arr);
    }
    function upload_imag($pic_msg,$dir='buyerstyle/uploadimgs',$name='',$ext_arr=array('jpg','png','gif','jpeg'),$size=20971520){
        if($pic_msg['size']>0){
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $arrs=explode('.',$pic_msg['name']);
            $ext=$arrs[count($arrs)-1];
            if(!in_array($ext,$ext_arr)){
                echo '文件格式错误！';
                exit;
            }
            if($pic_msg['size']>$size){
                echo '文件大小已超出限制范围！';
                exit;
            }
            if(empty($name)){
                $newname=date('YmdHis',time()).rand(1000,9999).'.'.$ext;
            }else{
                $newname=$name.'.'.$ext;
            }
            $upload_img=copy($pic_msg['tmp_name'],$dir.'/'.$newname);
            if($upload_img==false){
                echo '文件上传失败！';
                exit;
            }
            return $dir.'/'.$newname;//上传成功，返回文件名
        }
    }
}
?>