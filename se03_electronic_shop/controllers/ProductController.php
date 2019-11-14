<?php  
	require MODEL_PATH . 'Product.php';

	class ProductController 
	{
		protected $productModel;

		public function __construct()
		{
			$this->productModel = new Product;
		}

		public function view()
		{
			$id = $_GET['id'];

			$field = "products.*, 
				 product_categories.name as category_name, 
				 brands.name as brand_name,
				 product_images.img as img,
				 GROUP_CONCAT(product_reviews.content SEPARATOR '/////') as reviews,
				 GROUP_CONCAT(customers.fullname SEPARATOR '/////') AS customers";

			$join = "LEFT JOIN product_categories ON products.product_category_id = product_categories.id 
					 LEFT JOIN brands ON products.brand_id = brands.id
					 LEFT JOIN product_images ON products.id = product_images.product_id
					 LEFT JOIN product_reviews ON product_reviews.product_id = products.id
					 LEFT JOIN customers ON customers.id = product_reviews.user_id";
			$where = 'id = ' . $id;
			// ________________________________
			$product = $this->productModel->getProduct($field, $join, $where);

			// Xử lý reviews của customer:
			$reviewsContent = explode('/////', $product['reviews']);

			$fullname = explode('/////', $product['customers']);
			
			$customers = array_combine($fullname, $reviewsContent);

			// Xử lý xong thì bỏ đi phần tử  ko cần thiết từ mảng product
			unset($product['reviews'],$product['customers']);

			// Lấy sản phẩm liên quan.
			// 
			$field = "	products.id,
					    products.name,
					    products.slug,
					    products.price,
					    product_images.img";

			$join = " INNER JOIN product_images ON product_images.product_id = products.id ";

			$where = " products.id IN(
					    SELECT
					        product_relates.product_relate_id
					    FROM
					        product_relates
					    WHERE
					        product_relates.product_id = '{$id}' AND product_relates.status  = 1
					) ";

			$limit = " LIMIT 3 ";

			$orderBy = "";
			$productRelates = $this->productModel->getProducts($field,$join,$where,$orderBy,$limit);

			//var_dump($productRelates);
			// Sp best seller = sale + price thấp + status = 1
			$field 		= "products.id,products.name,products.slug,products.sku,products.price,product_images.img";

			$join 		= " INNER JOIN product_images ON products.id = product_images.product_id ";

			$where 		= " products.qty > 0 AND products.status = 1 AND product_images.is_featured = 1 ";

			$orderBy	= "ORDER BY products.price DESC";

			$limit 		= " LIMIT 4 ";

			$whereSale   = $where . " AND is_promo = 1 ";


			$productSale 	 = $this->productModel->getProducts($field,$join,$whereSale,$orderBy,$limit);

			//var_dump($productSale);

			$whereNew 			= $where . " AND is_new = 1 ";

			$productNew	 		= $this->productModel->getProducts($field,$join,$whereNew,$orderBy,$limit);
			

			// Lấy sản phẩm cùng hãng
			$field = "products.*,
					  product_images.img as img";

			$join = "LEFT JOIN product_images ON product_images.product_id = products.id
					 LEFT JOIN product_categories ON product_categories.id = products.product_category_id";

			$where = "products.brand_id = " . $product['brand_id'] ."
					  AND products.id != " . $product['id'];

			$limit = 6;

			$offset = "" ;

			$orderBy = "products.id DESC";

			$products = $this->productModel->getTheSameBrand($field, $join, $where, $limit, $offset, $orderBy);

			// Lấy sản phẩm tương tự

			$field = "products.*,
					  product_images.img as img";

			$join = "LEFT JOIN product_images ON product_images.product_id = products.id
					 LEFT JOIN product_categories ON product_categories.id = products.product_category_id";

			$where = "products.brand_id != " . $product['brand_id'] ."
					  AND products.id != " . $product['id'];

			$limit = 6;

			$offset = "" ;

			$orderBy = "products.id ";

			$productSame = $this->productModel->getTheSameProducts($field, $join, $where, $limit, $offset, $orderBy);
			$data = [
				'product' 		=> $product,

				'customers'    		=> $customers,

				'productRelates' 	=> $productRelates,

				'productSale' 		=> $productSale,

				'productNew'		=> $productNew,

				'products' => $products,

				'productSame' => $productSame
			];

			return view('product.view',$data);
		}

	}
?>