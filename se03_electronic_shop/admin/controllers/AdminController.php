<?php  
	require MODEL_PATH . 'Admin.php';
	/**
	 * AdminController
	 */
	class AdminController 
	{
		protected $adminModel;

		public function __construct()
		{
			$this->adminModel = new Admin();
		}

		public function index()
		{
			$where = '';

			if (isset($_GET['search']) && $_GET['search'] != null) {

				$where .= " username LIKE '%" . $_GET['search'] . "%'";
				
				
			}

			$admins = $this->adminModel->getAdmins($where);
			
			$data 	  = [
							'admins' => $admins,
							'total'  => 10
						];

			return view('Admin.index',$data);
		}

		public function view()
		{
			$id 		= $_GET['id'];

			$admin 	= $this->adminModel->getAdmin('*',"id = '{$id}'");

			if ($id == null || $admin == null) {

				header('Location:?c=admin&m=index');

				exit();
			}

			$data = [
				'admin' => $admin
			];

			return view('admin.view',$data);
		}

		public function add()
		{
			$errors = [];

			if (isset($_POST['submit'])) {
				
				if ($_POST['username'] == null || empty($_POST['username'])) {
					$errors[] = 'Vui lòng nhập username.';
				}

				if ($_POST['password'] == null || empty($_POST['password'])) {
					$errors[] = 'Vui lòng nhập mật khẩu.';
				}

				if ($_POST['fullname'] == null || empty($_POST['fullname'])) {
					$errors[] = 'Vui lòng nhập đầy đủ họ tên.';
				}

				if ($_POST['email'] == null || empty($_POST['email'])) {
					$errors[] = 'Vui lòng nhập email.';
				}

				if ($_POST['phone'] == null || empty($_POST['phone'])) {
					$errors[] = 'Vui lòng nhập số điện thoại.';
				}

				if (count($errors) == 0) {

					$username 			= trim($_POST['username']);

					$password 			= trim($_POST['password']);

					$email 				= trim($_POST['email']);

					$fullname 			= trim($_POST['fullname']);

					$phone	 			= trim($_POST['phone']);

					$address 			= (isset($_POST['address'])) ? trim($_POST['address']) : 'Chưa cập nhật';

					$level 				= (isset($_POST['role'])) ? 1 : 0;

					$status 			= (isset($_POST['status'])) ? 1 : 0;

					if (!is_numeric($phone)) {
						$errors[] = 'Số điện thoại không hợp lệ';
					}

					if (strlen($password) > 15) {
						$errors[] = 'Mật khẩu chỉ được tối đa 15 kí tự';
					}

					$userCheck 			= $this->adminModel->getAdmin('username',"username = '{$username}'");

					$emailCheck 		= $this->adminModel->getAdmin('email',"email = '{$email}'");

					if ($userCheck) {

						$errors[] = 'Username đã tồn tại';

					} elseif ($emailCheck) {

						$errors[] = 'Email đã tồn tại';
					} else {

						$createAdmin = $this->adminModel->createAdmin($username,$phone,$fullname,$email,$password,$address,$level,$status);

						if ($createAdmin) {

							$flag = 'Thêm thành công.';

						} else {

							$errors[] = 'Xảy ra lỗi, không thể thêm admin';
						}
						
					}
					
					 
				}
			}

			$data = [
				'errors' => $errors
			];

			return view('admin.add',$data);
		}

	}
?>