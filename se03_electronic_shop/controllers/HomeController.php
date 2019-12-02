<?php  
	require MODEL_PATH . 'Product.php';
	/**
	 * HomeController
	 */
	class HomeController 
	{
		protected $products;

		public function __construct()
		{
			$this->products = new Product;
		}

		public function index()
		{
			$field 		= "products.id,products.name,products.slug,products.sku,products.price,product_images.img";

			$join 		= " INNER JOIN product_images ON products.id = product_images.product_id ";

			$where 		= " products.is_featured = 1 AND products.qty > 0 AND products.status = 1";

			$orderBy	= "ORDER BY products.name DESC";

			$limit 		= " LIMIT 4 ";

			$whereNew   = $where . " AND is_new = 1 ";

			$productsNew = $this->products->getProducts($field,$join,$whereNew,$orderBy,$limit,'');

			$whereSale 	 = $where . " AND is_promo = 1 " ;

			$productsSale 	 = $this->products->getProducts($field,$join,$whereSale,'',$limit,'');

			$limitHot = " LIMIT 8 ";

			$orderByHot = " ORDER BY views DESC ";

			$productsHot = $this->products->getProducts($field,$join,$where,$orderByHot,$limitHot,'');

			/*---------lấy sản phẩm phụ kiện-------------*/
			$field = "products.*,
					  product_images.img as img";

			$join = "LEFT JOIN product_images ON product_images.product_id = products.id
					 LEFT JOIN product_categories ON product_categories.id = products.product_category_id";

			$where = "product_categories.parent_id = 2";
			$limit = 10;
			$offset = 0;
			$orderBy = "products.id DESC";
			$product = $this->products->getProductExtras($field, $join, $where, $limit, $offset, $orderBy);
			//echo $product; exit();

			$data = [
				'productsNew' => $productsNew,
				'productsSale' =>$productsSale,
				'product' => $product,
				'productsHot'  => $productsHot
			];

			return view('home.index',$data);
			//return view('brand.index',$data);
		}

	}
?>