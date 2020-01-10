<?php  
	require MODEL_PATH . 'Product.php';

	class SearchController 
	{
		protected $productModel;

		public function __construct()
		{
			$this->productModel = new Product();
		}

		public function index(){

			if (isset($_POST['submit'])) {
				$str = $_POST['str'];

				$field 		= "products.id,products.name,products.slug,products.sku,products.price,product_images.img";

				$join 		= " INNER JOIN product_images ON products.id = product_images.product_id ";

				$where 		= " products.is_featured = 1 AND products.qty > 0 AND products.status = 1";

				$orderBy	= "ORDER BY products.name DESC";

				$limit 		= " LIMIT 4 ";

				$whereNew   = $where . " AND products.name LIKE '%" . 
										$str . "%'";

				$productsNew = $this->productModel->getProducts($field,$join,$whereNew,$orderBy,$limit,'');

				$data = [
					'productsNew' => $productsNew
				];

				

				return view('search.index',$data);

			}
		}

	}

?>