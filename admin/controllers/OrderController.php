<?php 
require MODEL_PATH . 'Order.php';
/**
* 
*/
class OrderController 
{
	protected $orderModel;
	function __construct()
	{
		$this->orderModel = new Order();
	}
	public function index () {
			$where = '';

			if (isset($_GET['search']) && $_GET['search'] != null) {

				$where .= " username LIKE '%" . $_GET['search'] . "%'";
				
				
			}

			//filed
			$filed = "orders.*,
					  provinces.name as provinces,
					  GROUP_CONCAT(products.name SEPARATOR '<br>') as products,
					  districts.name as districts
					  ";

			//join 
<<<<<<< HEAD
			 $join = "LEFT JOIN provinces ON provinces.id = orders.provicence_id
				 LEFT JOIN districts ON districts.id = orders.district_id
			 		 LEFT JOIN order_items ON order_items.order_id  = orders.id
			 		 LEFT JOIN products ON products.id = order_items.product_id ";

			
 
=======
			$join = "LEFT JOIN provinces ON provinces.id = orders.province_id
					 LEFT JOIN districts ON districts.id = orders.district_id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 LEFT JOIN products ON products.id = order_items.product_id ";
>>>>>>> 2aa141ed292d6d86d06efc426ef619946b6edf4f


			$orders = $this->orderModel->getOrders($where, $filed, $join);
			
			$data 	  = [
							'orders' => $orders,
							'total'  => 10
						];

			return view('order.index',$data);

		return view('order.index');
	}
	public function view () {
		$id 		= $_GET['id'];

		$order 	= $this->orderModel->getOrders('*',"id = '{$id}'");

			if ($id == null || $order == null) {

				header('Location:?c=order&m=index');

				exit();
			}

			$data = [
				'order' => $order
			];

			return view('order.view',$data);

	}
	public function add () {
		$errors = [];

			if (isset($_POST['submit'])) {
				
				if ($_POST['user_id'] == null || empty($_POST['user_id'])) {
					$errors[] = 'Vui lòng nhập user_id.';
				}

				if ($_POST['fullname'] == null || empty($_POST['fullname'])) {
					$errors[] = 'Vui lòng nhập tên.';
				}

				if ($_POST['email'] == null || empty($_POST['email'])) {
					$errors[] = 'Vui lòng nhập email.';
				}

				if ($_POST['phone'] == null || empty($_POST['phone'])) {
					$errors[] = 'Vui lòng nhập số điện thoại.';
				}
				if ($_POST['address'] == null || empty($_POST['address'])) {
					$errors[] = 'Vui lòng nhập địa chỉ.';
				}

				if ($_POST['provicence_id'] == null || empty($_POST['provicence_id'])) {
					$errors[] = 'Vui lòng nhập tỉnh.';
				}
				if ($_POST['district_id'] == null || empty($_POST['district_id'])) {
					$errors[] = 'Vui lòng nhập huyện.';
				}
                if ($_POST['amount'] == null || empty($_POST['amount'])) {
					$errors[] = 'Vui lòng nhập số lượng.';
				}
				if ($_POST['note'] == null || empty($_POST['note'])) {
					$errors[] = 'Vui lòng nhập ghi chú.';
				}
				if ($_POST['created_at'] == null || empty($_POST['created_at'])) {
					$errors[] = 'Vui lòng nhập ngày mua.';
				}
				if ($_POST['updated_at'] == null || empty($_POST['updated_at'])) {
					$errors[] = 'Vui lòng nhập ngày xuất.';
				}
				if ($_POST['status'] == null || empty($_POST['status'])) {
					$errors[] = 'Vui lòng nhập trạng thái.';
				}



				if (count($errors) == 0) {

					$user_id 			= trim($_POST['user_id']);

					$fullname 			= trim($_POST['fullname']);

					$email 				= trim($_POST['email']);

					$phone 			= trim($_POST['phone']);

					$address 			= (isset($_POST['address'])) ? trim($_POST['address']) : 'Chưa cập nhật';

					$provicence_id 				= trim($_POST['provicence_id']);
					$district_id 			= trim($_POST['district_id']);
					$amount 			= trim($_POST['amount']);
					$note 			= trim($_POST['note']);
					$created_at 			= trim($_POST['created_at']);
					$updated_at 			= trim($_POST['updated_at']);


					$status 			= (isset($_POST['status'])) ? 1 : 0;

					if (!is_numeric($phone)) {
						$errors[] = 'Số điện thoại không hợp lệ';
					}

					$userCheck 			= $this->adminModel->getOrder('user_id',"user_id = '{$user_id}'");

					$emailCheck 		= $this->adminModel->getOrder('email',"email = '{$email}'");

					if ($userCheck) {

						$errors[] = 'User_id đã tồn tại';

					} elseif ($emailCheck) {

						$errors[] = 'Email đã tồn tại';
					} else {

						$createOrder = $this->orderModel->createAdmin($username,$phone,$fullname,$email,$password,$address,$level,$status);

						if ($createAdmin) {

							$flag = 'Thêm thành công.';

						} else {

							$errors[] = 'Xảy ra lỗi, không thể thêm order';
						}
						
					}
					
					 
				}
			}

			$data = [
				'errors' => $errors
			];

			return view('order.add',$data);
		

	}
	public function delete () {

	}
}
 ?>