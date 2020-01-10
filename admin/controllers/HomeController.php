<?php  
	/**
	 * HomeController
	 */
	require MODEL_PATH . 'Customer.php';
	require MODEL_PATH . 'Product.php';
	require MODEL_PATH . 'Order.php';

	class HomeController 
	{

		protected $customerModel;
		protected $productModel;
		protected $orderModel;

		public function __construct()
		{
			$this->customerModel = new Customer();	
			$this->productModel = new Product();
			$this->orderModel = new Order();
		}

		public function index()
		{
			// top 10 order news 
			//filed
			$filed = "orders.*,
					  provinces.name as provinces,
					  GROUP_CONCAT(products.name SEPARATOR '<br>') as products,
					  districts.name as districts
					  ";

			//join 
			$join = "LEFT JOIN provinces ON provinces.id = orders.province_id
					 LEFT JOIN districts ON districts.id = orders.district_id
					 LEFT JOIN order_items ON order_items.order_id  = orders.id
					 LEFT JOIN products ON products.id = order_items.product_id ";

			//order by
			$orderBy = " ORDER BY orders.created_at DESC";

			//limit
			$limit = " LIMIT 10 ";


			$orderNews = $this->orderModel->getOrders($where = null, $filed , $join , $orderBy ,$limit);

			// top 10 customers news
			$field = "customers.*";

			$join = '';

			$where = '1=1 ORDER BY customers.created_at DESC ';

			$customerNews = $this->customerModel->getCustomers($field, $join, $where);

			// Top 10 products new

			$field = "products.*, 
					  product_categories.name as category_name, 
					  brands.name as brand_name,
					  product_images.img as img";

			$join = "LEFT JOIN product_categories ON products.product_category_id = product_categories.id 
					 LEFT JOIN brands ON products.brand_id = brands.id
					 LEFT JOIN product_images ON products.id = product_images.product_id";

			$orderBy = " ORDER BY products.id DESC LIMIT 10"; 

			$where = "";

			// ________________________________
			$products = $this->productModel->getProducts($field, $join, $where, $orderBy);
			$data = [
				'customerNews' => $customerNews,
				'orderNews' => $orderNews

			];
			return view('home.index',$data);
		}
	}
?>