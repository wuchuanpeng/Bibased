<?php 
	class indexController{
		public $loginuser;
		public function __construct(){
		}

		function index(){
			$this->loginuser = isset($_SESSION['reload'])?$_SESSION['loginuser']:"";
			VIEW::assign(array('loginuser' => $this->loginuser));
			VIEW::display('buyer/login.php');
			
		}
		function regApply(){
			VIEW::display('buyer/reg.php');
		}
		//登录验证
		function validateLogon(){
			$backvalue=array();
			$account=$_POST['account'];
			$password=$_POST['password'];
			$buyerobj=M('index');
			$backvalue=$buyerobj->checkContrast($account,$password);
			
			echo json_encode($backvalue);
			
		}
//注册时验证码判断
		function regCodeJudge(){
			$backvalue=array();
			$inputcode=$_POST['inputcode'];
			$code=$_SESSION['password_code'];
			if(strtolower($inputcode)==$code){
				$backvalue['iscode']=1;
			}else{
				$backvalue['iscode']=0;
			}
			echo json_encode($backvalue);
		}
//将注册信息存到数据库
		function regUserSave(){
			$backvalue=array();
			
			$bTel=$_POST['inputtel'];
			$bPassword=$_POST['inputpwd'];
			$bName=$_POST['inputname'];
			if($bName==""){
				$bName=$bTel;
			}
			$bSex=$_POST['inputsex'];
			if($bSex=="女"){
				$bSex=1;
			}else{
				$bSex=0;
			}
			$buyerobj=M('index');
			$backvalue=$buyerobj->saveNewUser($bTel,$bPassword,$bName,$bSex);
			echo json_encode($backvalue);
		}




		function sellerLogin(){
			$backvalue=array();
			$sAccount=$_POST['saccount'];
			$sPassword=$_POST['spassword'];
			$buyerobj=M('index');
			$backvalue=$buyerobj->checkContrast($sAccount,$sPassword);
			
			echo json_encode($backvalue);
		}


		private function showmessage($info){
			echo "<script>console.log(".$info.");</script>";
			exit;
		}
		
	}

 ?>