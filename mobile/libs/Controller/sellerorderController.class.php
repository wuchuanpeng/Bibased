<?php 
	class sellerorderController{

		public $sellerId;
		public function __construct(){
			if(!(isset($_SESSION['loginseller']))){
				header("Location:admin.php");
				exit;
			}else{
				$this->sellerId=isset($_SESSION['seller_id'])?$_SESSION['seller_id']:array();
			}
		}
//调用seller-order.php页面视图
		function index(){
			VIEW::display('seller/seller-order.php');
		}
//调用seller-order-detail.php页面视图
		function location_orderDetail(){
			VIEW::display('seller/seller-order-detail.php');
		}
	}
 ?>