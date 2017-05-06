<?php 
	class sellerorderController{

		public $sellerId;
		public $sellerObj;
		public function __construct(){
			if(!(isset($_SESSION['loginseller']))){
				header("Location:admin.php");
				exit;
			}else{
				$this->sellerId=isset($_SESSION['seller_id'])?$_SESSION['seller_id']:array();
				$this->sellerObj=M('sellerorder');
			}
		}

    /**
     * 调用seller-order.php页面视图
     */
		function index(){
		    $back=$this->sellerObj->orderData($this->sellerId);
		    var_dump(count($back['orderMsg']));
            VIEW::assign(array( 'orderMsg' => $back['orderMsg'],
                                'orderBuyerMsg' => $back['orderBuyerMsg'],
                                'agrOrder' => $back['agrOrder'],
                                'agrOrderImg' => $back['agrOrderImg']));
			VIEW::display('seller/seller-order.php');
		}

		function mod_OrderState(){
		    $orderid=$_POST['orderid'];
            $back=$this->sellerObj->modOrderState($orderid);
            echo json_encode($back);
        }
	}
 ?>