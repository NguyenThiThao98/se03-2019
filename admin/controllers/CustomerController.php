<?php  
	require MODEL_PATH . 'Customer.php';

	class CustomerController 
	{
		protected $customerModel;

		public function __construct()
		{
			$this->customerModel = new Customer();
		}

		public function index()
		{
			$data = [];

			$field = "customers.*";

			$join = '';

			$where = '';

			$customers = $this->customerModel->getCustomers($field, $join, $where);

			$data = [
				'customers' => $customers
			];

			return view('customers.index',$data);
		}

		public function bought()
		{
			$data = [];

			$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
			if ($id == 0) {
				redirect('index.php?c=customer');
			}
			$where = 'customers.id = ' . $id; //id là id của customer

			$field = "orders.*, 
					  SUM(order_items.price) as price";
					 // products.name as products
					  //customers.*"

			$join = "LEFT JOIN customers ON customers.id = orders.user_id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 ";
					 /*LEFT JOIN products ON order_items.product_id  = products.id*/

			$orders = $this->customerModel->getOrders($field, $join, $where);

			$field = "*";
			$join = "";
			$customer  = $this->customerModel->getCustomer($field, $join, $where = 'id = ' . $id);
			// var_dump($customer );

			$data = [
				'orders' => $orders,
				'customer' => $customer
			];
			return view('customers.bought',$data);
		}


		public function view()
		{
			$data = [];

			$id = isset($_GET['order_id']) ? (int) $_GET['order_id'] : 0;
			if ($id == 0) {
				redirect('index.php?c=customer');
			}
			$where = 'orders.id = ' . $id; //id là id của customer

			$field = "order_items.*,
					  products.name as products,
					  customers.fullname, customers.email";
					  //products.*,

			$join = "LEFT JOIN orders ON order_items.order_id  = orders.id
					 LEFT JOIN products ON order_items.product_id  = products.id
					 LEFT JOIN customers ON customers.id = orders.user_id";

			$orders = $this->customerModel->getItems($field, $join, $where);

			$field = "SUM(price) as total_price,
					  order_items.*";
			$join = "";
			$price = $this->customerModel->getPrices($field, $join, $where = 'order_id = ' . $id);
			//var_dump($customers);


			$data = [
				'orders' => $orders,
				'price' => $price
			];

			return view('customers.view',$data);
		}

		public function review()
		{
			$data = [];

			$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
			if ($id == 0) {
				redirect('index.php?c=customer');
			}
			$where = 'product_reviews.user_id = ' . $id; //id là id của customer

			$field = "product_reviews.*,
					  products.name as product  
					  ";
					 

			$join = "LEFT JOIN products ON products.id = product_reviews.product_id ";
					 //LEFT JOIN order_items ON order_items.order_id  = orders.id
					 
					 /*LEFT JOIN products ON order_items.product_id  = products.id*/

			$reviews = $this->customerModel->getReviews($field, $join, $where);

			$field = "*";
			$join = "";
			$customer  = $this->customerModel->getCustomer($field, $join, $where = 'id = ' . $id);
			// var_dump($customer );

			$data = [
				'reviews' => $reviews,
				'customer' => $customer
			];
			return view('customers.review',$data);
		}

		public function info()
		{
			$data = [];

			$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
			if ($id == 0) {
				redirect('index.php?c=customer');
			}

			$field = "customers.*,
					  provinces.name as provinces,
					  districts.name as districts,
					  customers_group.name as customers_group";
			$join = "LEFT JOIN provinces ON provinces.id = customers.province_id
					 LEFT JOIN districts ON districts.id = customers.district_id
					 LEFT JOIN customers_group ON customers_group.id = customers.customer_group_id";
			$where = 'customers.id = ' . $id;

			$customer = $this->customerModel->getCustomer($field, $join, $where);
			$data = [
				'customer' => $customer
			];

			if (isset($_POST['reset'])) {
				redirect('index.php?c=customer&m=index');
			}

			return view('customers.info',$data);
		}
	}
?>