<?php  
	require MODEL_PATH . 'Order.php';
	/**
	 * Order
	 */
	class OrderController
	{
		protected $orderModel;

		public function __construct()
		{
			$this->orderModel = new Order;
		}

		public function index(){

			$data = [];
			return view('order.index',$data);
		}

		public function addOrder(){
			if (isset($_SESSION['cart']) && isset($_SESSION['customer'])) {
				
				
				$errors = [];

				if(!isset($_POST['phone']) || empty($_POST['phone'])){
					$errors[] = "Vui lòng điền số điện thoại";
				}

				if(!isset($_POST['address']) || empty($_POST['address'])){
					$errors[] = "Vui lòng điền Địa chỉ";
				}

				if (count($errors) == 0) {

					$userId = $_POST['userId'];

					$fullname = (isset($_POST['hoten'])) ? $_POST['hoten'] : $_SESSION['customer']['fullname'];

					$email = (isset($_POST['email'])) ? $_POST['email'] : $_SESSION['customer']['email'];

					$phone = trim($_POST['phone']);

					$address = trim($_POST['address']);

					$amount = (float)($_POST['amount']);

					$note = (isset($_POST['note'])) ? : "Chưa có lưu ý";

					$isFlag = $this->orderModel->addOrder($userId,$fullname,$email,$amount,$phone,$address,$note,$_SESSION['cart']);

					if ($isFlag) {
						echo $isFlag;
						header("Location:?c=home&m=index");
					}

				}

				
			}

			if (!isset($_SESSION['customer'])) {
				
				var_dump($_POST);
			}
		}
	}
?>