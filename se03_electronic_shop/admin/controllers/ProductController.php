<?php 

require MODEL_PATH . 'Product.php';

class ProductController {

   protected $productModel;

	public function __construct()
    {        
        $this->productModel = new Product();
    }

	public function index()
	{
		$data = [];

		$where = '';
		if (isset($_GET['name']) && $_GET['name'] != '') {
			$where = "name LIKE '%" . trim($_GET['name']) . "%'"; 
		}
		// field, join, where
		$field = "products.*, 
				  product_categories.name as category_name, 
				  brands.name as brand_name,
				  product_images.img as img";

		$join = "LEFT JOIN product_categories ON products.product_category_id = product_categories.id 
				 LEFT JOIN brands ON products.brand_id = brands.id
				 LEFT JOIN product_images ON products.id = product_images.product_id";

		$orderby = " ORDER BY products.id DESC"; 
		// ________________________________
		$products = $this->productModel->getProducts($field, $join, $where, $orderby);
		$data['products'] = $products;
		

		return view('products.index', $data);
	}

	public function create()
	{
		$data = $errors = [];

		$brands = $this->productModel->getBrands();

		$product_categories = $this->productModel->getCategories();

		$allowedExtention = ['png', 'gif', 'jpg'];
		$targetDir = "public/img/products/";

		if (isset($_POST['reset'])) {
			redirect('index.php?c=product&m=index');
		}

		if (isset ($_POST['submit'])){
			
			if (!isset ($_POST['name']) || empty ($_POST['name'])){
				$errors[] = 'Bạn chưa nhập tên sản phẩm';
			}
			if (!isset($_POST['brand_id']) || $_POST['brand_id'] == ''){
				$errors[] = 'Bạn chưa nhập chọn Thương Hiệu';
			}
			if (!isset($_POST['product_category_id']) || $_POST['product_category_id'] == ''){
				$errors[] = 'Bạn chưa nhập Thư Mục Sản Phẩm';
			}
			if (!is_numeric($_POST['price'])) {
				$errors[] = "Giá sản phẩm phải là số";
			}

			if (!is_numeric($_POST['qty'])) {
				$errors[] = "Số lượng sản phẩm phải là số";
			}

			$targetFile = $targetDir . $_FILES["file"]["name"];
		    $imageFileType = @end(explode('.', $_FILES["file"]["name"]));

		    if (!in_array($imageFileType, $allowedExtention)) {
		        $img = '';
		    } else {
		    	$img = trim ($targetFile);
		    }

			if (count ($errors) == 0){
				//$sku = trim ($_POST['sku']);
				$name = trim ($_POST['name']);

				$str = $name;
				$slug = slugify($str);

				$price = trim ($_POST['price']);
				$colors = trim ($_POST['colors']);
				$size = trim ($_POST['size']);
				$qty = trim ($_POST['qty']);
				$brand_id = trim ($_POST['brand_id']);
				$product_category_id = trim ($_POST['product_category_id']);
				$description = trim ($_POST['description']);
				$content = trim ($_POST['content']);
				$views = trim ($_POST['views']);
				$is_new = (isset($_POST['is_new'])) ? $_POST['is_new'] : 0;
				$is_promo = (isset($_POST['is_promo'])) ? $_POST['is_promo'] : 0;
				$is_featured = (isset($_POST['is_featured'])) ? $_POST['is_featured'] : 0;
				$is_sale = (isset($_POST['is_sale'])) ? $_POST['is_sale'] : 0;
				// $updated_at = trim ($_POST['updated_at']);
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;

				if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
		        } else {
		            $errors[] = "Sorry, there was an error uploading your file.";
		        }

				$product = $this->productModel->addProduct($name, $slug, $price, $colors, $size, $qty, $brand_id, $product_category_id, $description, $content, $views, $is_new, $is_promo, $is_featured, $is_sale, $status);
				//echo $product; exit();

				$id = $product;

				$image = $this->productModel->addProductImages($id, $img, $is_featured);
				if ($product = true) {
					redirect('index.php?c=product&m=index');
				}
			}
		}


		$data = [
			'brands' => $brands,
			'product_categories' => $product_categories,
			'errors' => $errors
		];
		return view('products.create', $data);
	}

	public function update()
	{
		$data = $errors = [];

		$brands = $this->productModel->getBrands();

		$product_categories = $this->productModel->getCategories();

		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
		if ($id == 0) {
			redirect('index.php?c=product');
		}
		$field = "products.*, 
				 product_categories.name as category_name, 
				 brands.name as brand_name,
				 product_images.img as img,
				 product_images.id as img_id,
				 GROUP_CONCAT(product_reviews.content SEPARATOR '/////') as reviews";

		$join = "LEFT JOIN product_categories ON products.product_category_id = product_categories.id 
				 LEFT JOIN brands ON products.brand_id = brands.id
				 LEFT JOIN product_images ON products.id = product_images.product_id
				 LEFT JOIN product_reviews ON product_reviews.product_id = products.id";
		$where = 'id = ' . $id;
		// ________________________________
		$product = $this->productModel->getProduct($field, $join, $where);
		
		if (is_null($product)) {
			redirect('index.php?c=product');
		}

		if (isset($_POST['reset'])) {
			redirect('index.php?c=product&m=index');
		}

		if (isset ($_POST['submit'])){
			if (!isset ($_POST['name']) || empty ($_POST['name'])){
				$errors[] = 'Bạn chưa nhập tên sản phẩm';
			}
			
			if (!isset($_POST['brand_id']) || $_POST['brand_id'] == ''){
				$errors[] = 'Bạn chưa nhập Thương Hiệu';
			}
			if (!isset($_POST['product_category_id']) || $_POST['product_category_id'] == ''){
				$errors[] = 'Bạn chưa nhập Danh Mục Sản Phẩm';
			}
			if (!is_numeric($_POST['price'])) {
				$errors[] = "Giá sản phẩm phải là số";
			}

			if (!is_numeric($_POST['qty'])) {
				$errors[] = "Số lượng sản phẩm phải là số";
			}

			$allowedExtention = ['png', 'gif', 'jpg'];
			$targetDir = "public/img/products/";

			$targetFile = $targetDir . $_FILES["file"]["name"];
			$imageFileType = @end(explode('.', $_FILES["file"]["name"]));

			if (count ($errors) == 0){
				$id = trim ($_POST['id']);
				$sku = sku($id);
				$name = trim ($_POST['name']);

				$str = $name;
				$slug = slugify($str);

				$price = trim ($_POST['price']);
				$colors = trim ($_POST['colors']);
				$size = trim ($_POST['size']);
				$qty = trim ($_POST['qty']);
				$brand_id = trim ($_POST['brand_id']);
				$product_category_id = trim ($_POST['product_category_id']);
				$description = trim ($_POST['description']);
				$content = trim ($_POST['content']);
				$views = trim ($_POST['views']);
				$is_new = (isset($_POST['is_new'])) ? $_POST['is_new'] : 0;
				$is_promo = (isset($_POST['is_promo'])) ? $_POST['is_promo'] : 0;
				$is_featured = (isset($_POST['is_featured'])) ? $_POST['is_featured'] : 0;
				$is_sale = (isset($_POST['is_sale'])) ? $_POST['is_sale'] : 0;
				// $updated_at = trim ($_POST['updated_at']);
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;

				if (!in_array($imageFileType, $allowedExtention)) {
					$img = $product['img'];
				} else {
					$img = trim ($targetFile);

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
					} else {
						$errors[] = "Sorry, there was an error uploading your file.";
					}
				}

				$products = $this->productModel->editProduct($id, $name, $sku, $slug, $price, $colors, $size, $qty, $brand_id, $product_category_id, $description, $content, $views, $is_new, $is_promo, $is_featured, $is_sale, $status);

				$id = $product['id'];

				
				//echo $image; exit();

				if ($img != '') {
					if ($product['img'] == '') {
						//echo $id; exit();

						$image = $this->productModel->addProductImages($id, $img, $is_featured);
					} else {
						$image = $this->productModel->editProductImages($id, $img, $is_featured);
					}
				}
				if ($products = true) {
					redirect('index.php?c=product&m=index');
				}
			}

		}
		$data = [
			'errors' => $errors,
			'product' => $product,
			'brands' => $brands,
			'product_categories' => $product_categories
		];
		return view('products.update', $data);
	}

	public function delete()
	{
		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?product');
		}

		$where = 'id = ' . $id;
		$product = $this->productModel->getProduct($where);
		if (!is_null($product)) {
			$this->productModel->deleteProduct($id);
		}

		redirect('index.php?c=product');
	}

	public function view()
	{
		$data = [];

		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
		if ($id == 0) {
			redirect('index.php?c=product');
		}
		// field, join, where
		$field = "products.*, 
				 product_categories.name as category_name, 
				 brands.name as brand_name,
				 product_images.img as img";
				 // GROUP_CONCAT(product_reviews.content SEPARATOR '/////') as reviews,
				 //  GROUP_CONCAT(customers.fullname SEPARATOR '/////') AS customers";

		$join = "LEFT JOIN product_categories ON products.product_category_id = product_categories.id 
				 LEFT JOIN brands ON products.brand_id = brands.id
				 LEFT JOIN product_images ON products.id = product_images.product_id";
				 /*LEFT JOIN product_reviews ON product_reviews.product_id = products.id
				 LEFT JOIN customers ON customers.id = product_reviews.user_id";*/
		$where = 'id = ' . $id;
		// ________________________________
		$product = $this->productModel->getProduct($field, $join, $where);

		// Xử lý reviews của customer:
	/*	$reviewsContent = explode('/////', $product['reviews']);

		$fullname = explode('/////', $product['customers']);
		
		$customers = array_combine($fullname, $reviewsContent);

		$data['customers'] = $customers;*/
		// ___________________

		if (is_null($product)) {
			redirect('index.php?c=product');
		}
		$data['product'] = $product;

		if (isset($_POST['reset'])) {
			redirect('index.php?c=product&m=index');
		}

		return view('products.view', $data);
	}

	
}
?>