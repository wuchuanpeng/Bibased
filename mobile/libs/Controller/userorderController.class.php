<?php
class userorderController{
    public $userId;
    public $userObj;

    public function __construct(){
        if(!(isset($_SESSION['loginuser']))){
            header("Location:admin.php");
            exit;
        }else{
            $this->userId=isset($_SESSION['buyer_id'])?$_SESSION['buyer_id']:array();
            $this->userObj=M('usershop');
        }
    }

    /**
     * 加载order主页面
     */
    function index(){
        VIEW::display('buyer/orderN.php');
    }

    /**
     * 加载评价页面
     */
    function location_evaluatePage(){
        VIEW::display("buyer/menuaccess.php");
    }

    /**
     * 加载订单详情
     */
    function location_orderDetail(){
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
}
?>