<?php  
	require MODEL_PATH . 'Brand.php';
	require MODEL_PATH . 'Product.php';
	/**
	 * BrandController
	 */
	class BrandController 
	{
		
		protected $brandModel;

		protected $Product;

		public function __construct()
		{
			$this->brandModel = new Brand;

			$this->Product = new Product;
		}

		public function index()
		{
			return view('brand.index');
		}

		public function view()
		{
			$id = $_GET['id'];

			$brandInfo = $this->brandModel->totalRecordBrand($id);


			$field = "	products.id,
					    products.name,
					    products.price,
					    products.sku,
					    product_images.img";

			$join = "LEFT JOIN product_images ON products.id = product_images.product_id";


			$where = " products.qty > 0 AND products.status = 1 AND product_images.is_featured = 1 AND products.brand_id = '{$id}' " ;

			$orderBy = '';

			$limit = " LIMIT 6 ";

			
			// Xử lý phân trang :
			// Định nghĩa 1 trang có 6 sp hiện ra
			$totalPages = ceil($brandInfo['totalProducts'] / 6 ); // Tổng số pages

			$currentPage = 1;

			if (isset($_GET['pages']) && $_GET['pages'] != '') {
				$currentPage = $_GET['pages'];
			}

			$offsetLocation = ($currentPage - 1 ) * 6;

			$offset = " OFFSET $offsetLocation";

			// Sp hiển thị ra :
			$products = $this->Product->getProducts($field,$join,$where,$orderBy,$limit,$offset);

			$data = [
				'products' => $products,
				'brands'   => $brandInfo,
				'totalPages' => $totalPages
			];
			return view('brand.view',$data);
		}
	}
?>