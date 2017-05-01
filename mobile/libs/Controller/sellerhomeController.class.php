<?php 
	class sellerhomeController{

		public $sellerId;
		public function __construct(){
			if(!(isset($_SESSION['loginseller']))){
				header("Location:admin.php");
				exit;
			}else{
				$this->sellerId=isset($_SESSION['seller_id'])?$_SESSION['seller_id']:array();
			}
		}


		function index(){
			VIEW::display('seller/seller-home.php');
		}

		function location_orderForm(){
			VIEW::display('seller/home-orderDetail.php');
		}
	}
 ?>