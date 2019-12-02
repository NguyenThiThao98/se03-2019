<?php  

	require MODEL_PATH . 'Customer.php';
	/**
	 * 
	 */
	class CustomerController 
	{

		protected $Customer;

		public function __construct()
		{
			$this->Customer = new Customer;
		}

		public function register()
		{
			$errors = [];

			if (isset($_POST['submit'])) {

				if (!isset($_POST['fullname']) || empty($_POST['fullname'])) {
					$errors[] = 'Vui lòng nhập đầy đủ họ tên.';
				}

				if (!isset($_POST['email']) || empty($_POST['email'])) {
					$errors[] = 'Vui lòng nhập email.';
				}

				if (!isset($_POST['phone']) || empty($_POST['phone'])) {
					$errors[] = 'Vui lòng nhập số điện thoại.';
				}

				if (!isset($_POST['password']) || empty($_POST['password'])) {
					$errors[] = 'Vui lòng nhập mật khẩu.';
				}

				if (!isset($_POST['passwordAgain']) || $_POST['passwordAgain'] != $_POST['password']) {
					$errors[] = 'Vui lòng xác nhận mật khẩu';
				}
				

				if (count($errors) == 0) {

					$fullname 	= trim($_POST['fullname']);

					$email 		= trim($_POST['email']);

					$phone 		= trim($_POST['phone']);

					$password 	= trim($_POST['password']);

					if (!is_numeric($phone)) {
						$errors[] = 'Số điện thoại không hợp lệ';
					}

					$emailCheck = $this->Customer->getCustomer($email);

					if (!is_null($emailCheck) && count($emailCheck) > 0) {
						$errors[] = 'Email đã tồn tại.';
					}

					if (strlen($password) > 20) {
						$errors[] = 'Mật khẩu có tối đa 20 kí tự';
					}

					if (count($errors) == 0) {
						
						$addCustomer = $this->Customer->addCustomer($fullname,$email,$phone,$password);

						if ($addCustomer) {

							$id = $this->Customer->getCustomer($email)['id'];

							$_SESSION['customer'] = ['fullname' => $fullname,'email' => $email,'id'=>$id];

							header('Location:?c=home&m=index');

							exit();

						} else {

							$erors[] = "Xảy ra lỗi, không thể đăng ký. Gọi 911 để nhận trợ giúp.";
						}
					}
				}

			}


			$data = [
				'errors' => $errors
			];

			return view('customer.register',$data);
		}

		public function login()
		{	
			$errors = [];

			if (isset($_POST['submit'])) {
				if (!isset($_POST['email']) || empty($_POST['email'])) {
					$errors[] = 'Vui lòng nhập email đăng nhập';
				}

				if (!isset($_POST['password']) || empty($_POST['password'])) {
					$errors[] = 'Vui lòng nhập mật khẩu';
				}

				if (count($errors) == 0) {
					
					$email = trim($_POST['email']);

					$password = trim($_POST['password']);

					$filed = "*";
					$join = "";
					$where = "email = '{$email}'";

					$emailCheck = $this->Customer->getCustomer($filed, $join, $where);

					if (is_null($emailCheck) || count($emailCheck) == 0) {
						$errors[] = 'Email chưa được đăng ký.';
					}

					if (!is_null($emailCheck)) {

						if ($emailCheck['password'] != $password) {

							$errors[] = 'Mật khẩu không chính xác';

						} else {
							if ($emailCheck['status'] == 0) {
								$errors[] = 'Tài khoản của bạn chưa được kích hoạt';
							}
						}
	
					}

					if (count($errors) == 0) {

						$_SESSION['customer'] = ['fullname'=>$emailCheck['fullname'],'email'=>$email,'id'=>$emailCheck['id']];

						header('Location:?c=home&m=index');
						exit();
					}

				}
			}

			$data = [
				'errors' => $errors
			];
			return view('customer.login',$data);
		}

		public function logout()
		{
			if (isset($_SESSION['customer'])) {
				unset($_SESSION['customer']);

				header('Location:?c=home&m=index');
				exit;
			}
		}

		public function profile()
		{
			$data = [];
			//var_dump($_SESSION['customer']);

			/*$id = isset($_GET['order_id']) ? (int) $_GET['order_id'] : 0;
			if ($id == 0) {
				redirect('index.php?c=customer');
			}*/

			$email = $_SESSION['customer']['email'];

			$emailCheck = isset($_GET['email']) ? $_GET['email'] : null;
			//echo $emailCheck; exit();
			if ($emailCheck == null) {
				//echo $emailCheck; exit();
				redirect('index.php');
			}

			if ($emailCheck != $email) {
				redirect('index.php');
			}

			$filed = "customers.*, 
					  provinces.name as province,
					  districts.name as district";
					  
			$join = " LEFT JOIN provinces ON provinces.id =  customers.province_id
					  LEFT JOIN districts ON districts.id = customers.district_id";
			$where = "email = '{$email}'";

			$customer = $this->Customer->getCustomer($filed, $join, $where);


			$filed = " orders.*, 
					   GROUP_CONCAT(products.name SEPARATOR '<br>') as products,
					   SUM(order_items.price) as price";

			$join = "LEFT JOIN customers ON orders.user_id  = customers.id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 LEFT JOIN products ON products.id = order_items.product_id 
					 LEFT JOIN product_images ON product_images.product_id = products.id";

			$where = "customers.email = '{$email}'";

			$orders = $this->Customer->getOders($filed, $join, $where);



			$data = [
				'customer' => $customer,
				'orders' => $orders
			];

			return view('customer.profile', $data);
		}

		public function edit_info()
		{
			$data = $errors = [];

			$email = $_SESSION['customer']['email'];

			$emailCheck = isset($_GET['email']) ? $_GET['email'] : null;
			//echo $emailCheck; exit();
			if ($emailCheck == null) {
				//echo $emailCheck; exit();
				redirect('index.php');
			}

			if ($emailCheck != $email) {
				redirect('index.php');
			}

			$filed = "customers.*, 
					  provinces.name as province,
					  districts.name as district";
					  
			$join = " LEFT JOIN provinces ON provinces.id =  customers.province_id
					  LEFT JOIN districts ON districts.id = customers.district_id";
			$where = "email = '{$email}'";

			$customer = $this->Customer->getCustomer($filed, $join, $where);


			$filed = " orders.*, 
					   GROUP_CONCAT(products.name SEPARATOR '<br>') as products,
					   SUM(order_items.price) as price";

			$join = "LEFT JOIN customers ON orders.user_id  = customers.id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 LEFT JOIN products ON products.id = order_items.product_id 
					 LEFT JOIN product_images ON product_images.product_id = products.id";

			$where = "customers.email = '{$email}'";

			$orders = $this->Customer->getOders($filed, $join, $where);

			if (isset($_POST['submit'])) {
				if (!isset($_POST['fullname']) || $_POST['fullname'] == '') {
					$errors[] = 'Bạn đang để trống tên tài khoản';
				}

				if (!isset($_POST['gender']) || $_POST['gender'] == '') {
					$errors[] = 'Bạn đang để trống giới tính';
				}

				if (!isset($_POST['email']) || $_POST['email'] == '') {
					$errors[] = 'Bạn đang để trống email';
				}

				if (!isset($_POST['phone']) || $_POST['phone'] == '') {
					$errors[] = 'Bạn đang để trống số điện thoại';
				}

				if (!isset($_POST['password']) || $_POST['password'] == '') {
					$errors[] = 'Bạn đang để trống mật khẩu';
				} else {
					if ($_POST['password'] != $customer['password']) {
						$errors[] = 'Bạn chưa nhập đúng mật khẩu';
					}
				}

				if (count($errors) == 0) {
					$id = $customer['id'];
					$fullname = trim ($_POST['fullname']);
					$email = trim ($_POST['email']);
					$phone = trim ($_POST['phone']);
					$address = $customer['address'];
					$password = $customer['password'];
					$province_id = $customer['province_id'];
					$district_id = $customer['district_id'];
					$gender = trim ($_POST['gender']);

					$link = '?c=customer&m=profile&email=' . $email;
					//echo $link; exit();


					$edit_info = $this->Customer->editCustomer($id, $fullname, $email, $phone,$password, $address, $province_id, $district_id, $gender);
					echo $edit_info;
					if ($edit_info == 0) {
						//echo 1; exit();
						redirect($link);
					}
				}

				
			}

			$data = [
				'customer' => $customer,
				'orders' => $orders,
				'errors' => $errors
			];


			return view('customer.edit_info', $data);
		}

		public function edit_password()
		{
			$data = $errors = [];

			$email = $_SESSION['customer']['email'];

			$emailCheck = isset($_GET['email']) ? $_GET['email'] : null;
			//echo $emailCheck; exit();
			if ($emailCheck == null) {
				//echo $emailCheck; exit();
				redirect('index.php');
			}

			if ($emailCheck != $email) {
				redirect('index.php');
			}

			$filed = "customers.*, 
					  provinces.name as province,
					  districts.name as district";
					  
			$join = " LEFT JOIN provinces ON provinces.id =  customers.province_id
					  LEFT JOIN districts ON districts.id = customers.district_id";
			$where = "email = '{$email}'";

			$customer = $this->Customer->getCustomer($filed, $join, $where);


			$filed = " orders.*, 
					   GROUP_CONCAT(products.name SEPARATOR '<br>') as products,
					   SUM(order_items.price) as price";

			$join = "LEFT JOIN customers ON orders.user_id  = customers.id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 LEFT JOIN products ON products.id = order_items.product_id 
					 LEFT JOIN product_images ON product_images.product_id = products.id";

			$where = "customers.email = '{$email}'";

			$orders = $this->Customer->getOders($filed, $join, $where);

			if (isset($_POST['submit'])) {
				if (!isset($_POST['password_old']) || $_POST['password_old'] == '') {
					$errors[] = 'Bạn đang để trống Mật khẩu hiện tại';
				}

				if (!isset($_POST['password_new']) || $_POST['password_new'] == '') {
					$errors[] = 'Bạn đang để trống Mật khẩu mới';
				} else {
					if (!isset($_POST['password_confirm']) || $_POST['password_confirm'] == '') {
						$errors[] = 'Bạn đang để trống Nhập lại mật khẩu mới';
					} else {
						if ($_POST['password_confirm'] != $_POST['password_new']) {
							$errors[] = 'Mật khẩu mới chưa trùng khớp';
						}
					}
				}


				if (count($errors) == 0) {

					if ($_POST['password_old'] != $customer['password']) {
						$errors[] = 'Mật khẩu chưa đúng';
					}
					$password = trim($_POST['password_new']);
					$id = $customer['id'];
					$fullname =  $customer['fullname'];
					$email =  $customer['email'];
					$phone =  $customer['phone'];
					$address = $customer['address'];
					$province_id = $customer['province_id'];
					$district_id = $customer['district_id'];
					$gender =  $customer['gender'];

					$link = '?c=customer&m=profile&email=' . $email;
					//echo $link; exit();
					$edit_info = $this->Customer->editCustomer($id, $fullname, $email, $password, $phone, $address, $province_id, $district_id, $gender);
					//echo $edit_info;
					if ($edit_info == 0) {
						//echo 1; exit();
						redirect($link);
					}
				}
	
			}

			$data = [
				'customer' => $customer,
				'orders' => $orders,
				'errors' => $errors
			];


			return view('customer.edit_password', $data);
		}

		public function edit_address()
		{
			$data = $errors = [];

			$email = $_SESSION['customer']['email'];

			$emailCheck = isset($_GET['email']) ? $_GET['email'] : null;
			//echo $emailCheck; exit();
			if ($emailCheck == null) {
				//echo $emailCheck; exit();
				redirect('index.php');
			}

			if ($emailCheck != $email) {
				redirect('index.php');
			}

			$filed = "customers.*, 
					  provinces.name as province,
					  districts.name as district";
					  
			$join = " LEFT JOIN provinces ON provinces.id =  customers.province_id
					  LEFT JOIN districts ON districts.id = customers.district_id";
			$where = "email = '{$email}'";

			$customer = $this->Customer->getCustomer($filed, $join, $where);


			$filed = " orders.*, 
					   GROUP_CONCAT(products.name SEPARATOR '<br>') as products,
					   SUM(order_items.price) as price";

			$join = "LEFT JOIN customers ON orders.user_id  = customers.id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 LEFT JOIN products ON products.id = order_items.product_id 
					 LEFT JOIN product_images ON product_images.product_id = products.id";

			$where = "customers.email = '{$email}'";

			$orders = $this->Customer->getOders($filed, $join, $where);

			$provinces = $this->Customer->getProvinces();

			if (isset($_POST['submit'])) {
				if (!isset($_POST['province_id']) || $_POST['province_id'] == '') {
					$errors[] = 'Bạn chưa chọn Tỉnh/Thành phố';
				}

				if (!isset($_POST['district_id']) || $_POST['district_id'] == '') {
					$errors[] = 'Bạn chưa chọn Huyện/Quận';
				}

				if (!isset($_POST['password']) || $_POST['password'] == '') {
					$errors[] = 'Bạn đang để trống mật khẩu';
				} else {
					if ($_POST['password'] != $customer['password']) {
						$errors[] = 'Bạn chưa nhập đúng mật khẩu';
					}
				}

				// echo $_POST['province_id'];

				/*if (count($errors) == 0) {
					$id = $customer['id'];
					$fullname = trim ($_POST['fullname']);
					$email = trim ($_POST['email']);
					$phone = trim ($_POST['phone']);
					$address = $customer['address'];
					$password = $customer['password'];
					$province_id = $customer['province_id'];
					$district_id = $customer['district_id'];
					$gender = trim ($_POST['gender']);

					$link = '?c=customer&m=profile&email=' . $email;
					//echo $link; exit();


					$edit_info = $this->Customer->editCustomer($id, $fullname, $email, $phone,$password, $address, $province_id, $district_id, $gender);
					echo $edit_info;
					if ($edit_info == 0) {
						//echo 1; exit();
						redirect($link);
					}
				}*/
	
			}

			$data = [
				'customer' => $customer,
				'orders' => $orders,
				'errors' => $errors,
				'provinces' => $provinces
			];


			return view('customer.edit_address', $data);
		}

		public function district()
		{
			$provinceId = (isset($_GET['province_id'])) ? (int) $_GET['province_id'] : 0;
			$option = '';

			if ($provinceId > 0) {
				$districts = $this->Customer->getDistricts($provinceId);
				if (count($districts) > 0) {
					foreach ($districts as $district) {
						$option .= '<option value = "' . $district['id'] . '">' . $district['name'] . '</option>';
					}
				}
			}

			echo $option;
		}

		public function bought() 
		{
			$data = [];
			//var_dump($_SESSION['customer']);

			/*$id = isset($_GET['order_id']) ? (int) $_GET['order_id'] : 0;
			if ($id == 0) {
				redirect('index.php?c=customer');
			}*/

			$email = $_SESSION['customer']['email'];

			$emailCheck = isset($_GET['email']) ? $_GET['email'] : null;
			//echo $emailCheck; exit();
			if ($emailCheck == null) {
				//echo $emailCheck; exit();
				redirect('index.php');
			}

			if ($emailCheck != $email) {
				redirect('index.php');
			}

			/*$filed = "customers.*, 
					  provinces.name as province,
					  districts.name as district";
					  
			$join = " LEFT JOIN provinces ON provinces.id =  customers.province_id
					  LEFT JOIN districts ON districts.id = customers.district_id";
			$where = "email = '{$email}'";

			$customer = $this->Customer->getCustomer($filed, $join, $where);*/


			$filed = " orders.*, 
					   GROUP_CONCAT(products.name SEPARATOR '<br>') as products,
					   SUM(order_items.price) as price,
					   provinces.name as province,
					   districts.name as district";

			$join = "LEFT JOIN customers ON orders.user_id  = customers.id
					 LEFT JOIN provinces ON provinces.id =  customers.province_id
					 LEFT JOIN districts ON districts.id = customers.district_id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 LEFT JOIN products ON products.id = order_items.product_id 
					 LEFT JOIN product_images ON product_images.product_id = products.id";

			$where = "customers.email = '{$email}'";

			$orders = $this->Customer->getOders($filed, $join, $where);

			$data = [
				/*'customer' => $customer,*/
				'orders' => $orders
			];

			return view('customer.bought', $data);
		}

	}
?>