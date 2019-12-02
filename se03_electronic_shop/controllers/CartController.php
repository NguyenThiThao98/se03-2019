<?php  
	require MODEL_PATH . 'Product.php';
	/**
	 * 
	 */
	class CartController
	{
		protected $Product;

		public function __construct()
		{
			$this->Product = new Product();
		}

		public function index()
		{
			if (count($_SESSION['cart']) == 0) {
				$message = 'Chưa có sản phẩm trong giỏ hàng. Vui lòng mua hàng.';
			}


			$data = [
				'cart' 		=> (isset($_SESSION['cart'])) ? $_SESSION['cart'] : '',
				'message' => (isset($message)) ? $message : ''
			];

			return view('cart.index',$data);
		}

		public function addCart()
		{
			$id 	= $_GET['id'];

			$field 	= " products.id,products.price,products.name,products.is_sale,product_images.img ,products.is_promo "; 

			$join 	= " INNER JOIN product_images ON products.id = product_images.product_id ";

			$where = "id = '{$id}' ";

			$product = $this->Product->getProduct($field,$join,$where);


			if (!isset($_SESSION['cart'][$id]) || $_SESSION['cart'][$id] == null) {
				
				$_SESSION['cart'][$id] = [
					'id'   	=> $id,
					'name' 	=> $product['name'],
					'img'  	=> $product['img'],
					'price' => $product['price'],
					'qty'   => 1
				];

			} else {

				if (array_key_exists($id, $_SESSION['cart'])) {
				
					$_SESSION['cart'][$id]['qty'] += 1;
				}
				
			}

			echo count($_SESSION['cart']);
			//header('Location:?c=cart&m=index');

		}

		public function update()
		{
			
			foreach ($_POST['qty'] as $key => $value) {
				$_SESSION['cart'][$key]['qty'] = $value;
			}

			header('Location:?c=cart&m=index');
		}

		public function delCart()
		{
			
			$id = $_GET['id'];

			unset($_SESSION['cart'][$id]);
			//echo json_encode($_SESSION['cart']);
			header('Location:?c=cart&m=index');

		}
	}

?>