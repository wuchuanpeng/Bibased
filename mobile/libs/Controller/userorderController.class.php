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
}
?>