<?php 

require MODEL_PATH . 'ProductReview.php';

class ProductReviewController {

	protected $productReviewModel;

	public function __construct()
	{
		$this->productReviewModel = new ProductReview();
	}

	public function index()
	{
		$data = [];

		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
		if ($id == 0) {
			redirect('index.php?c=product');
		}

		$field = "product_reviews.*,
				  customers.fullname as customers,
				  customers.email as email";

		// join
		$join = "LEFT JOIN customers ON customers.id = product_reviews.user_id
				 LEFT JOIN products ON products.id = product_reviews.product_id";

		$where = 'product_reviews.product_id = ' . $id;

		$reviews = $this->productReviewModel->getReviews($field, $join, $where);

		$field = "products.*,
				  product_images.img  as img";
		$join =	"LEFT JOIN product_images ON product_images.product_id = products.id";
		$product = $this->productReviewModel->getProduct($field, $join, $where = 'id = ' . $id);


		if (is_null($product)) {
			redirect('index.php?c=product');
		}

		$data = [
			'reviews' => $reviews,
			'product' => $product
		];

		return view('product_reviews.index', $data);
	}

	public function create()
	{
		$data = [];
		$success = '';
		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
		if ($id == 0) {
			redirect('index.php?c=product');
		}

		$field = "product_reviews.*,
				  customers.fullname as customers,
				  customers.email as email";

		// join
		$join = "LEFT JOIN customers ON customers.id = product_reviews.user_id";

		$where = 'product_reviews.id = ' . $id;

		$review = $this->productReviewModel->getReview($field, $join, $where);

		// ----------------------------
		if (isset($_POST['submit'])) {
			$content = trim($_POST['content']);
			$status = (isset($_POST['status'])) ? $_POST['status'] : 0;

			$review = $this->productReviewModel->editReview($id, $content, $status);

			if ($product = true) {
				//redirect('index.php?c=product&m=index');
				$success = "Bạn đã sửa thành công";
			}

		}

		if (isset($_POST['reset'])) {
			redirect('index.php?c=product&m=index');
		}

		$data = [
			'review' => $review,
			'success' => $success
		];

		return view('product_reviews.create', $data);
	}

	public function delete()
	{
		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?product');
		}

		$where = 'id = ' . $id;
		$field = "*";
		$join = "";
		$review = $this->productReviewModel->getReview($field, $join, $where);
		// var_dump($review); exit();
		if (!is_null($review)) {
			$this->productReviewModel->deleteReview($id);
		}

		redirect('index.php?c=product');
	}
}
?>