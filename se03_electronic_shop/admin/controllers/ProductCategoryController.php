<?php 

require MODEL_PATH . 'ProductCategory.php';

class ProductCategoryController {

	protected $productCategoryModel;

	public function __construct()
	{
		$this->productCategoryModel = new ProductCategory();
	}

	public function index()
	{
		$data = [];

		$where = '';
		if (isset($_GET['name']) && $_GET['name'] != '') {
			$where = "name LIKE '%" . trim($_GET['name']) . "%'"; 
		}

		$categories = $this->productCategoryModel->getCategories($where);
		$data['categories'] = $categories;
		
		return view('product_categories.index', $data);
	}

	public function create()
	{
		$data = $errors = [];

		$allowedExtention = ['png', 'gif', 'jpg'];
		$targetDir = "public/img/product_categories/";

		if (isset($_POST['reset'])) {
			redirect('index.php?c=productcategory&m=index');
		}

		$categories = $this->productCategoryModel->getCategories($where = '');

		if (isset($_POST['submit'])) {
			if (!isset($_POST['name']) || $_POST['name'] == ''){
				$errors[] = 'Bạn chưa nhập tên Thư Mục';
			}

			/*if (!isset($_POST['parent_id']) || $_POST['parent_id'] == ''){
				$errors[] = 'Bạn chưa chọn Thư Mục Cha';
			}*/

			$targetFile = $targetDir . $_FILES["file"]["name"];
		    $imageFileType = @end(explode('.', $_FILES["file"]["name"]));

		    if (count($errors) == 0){
		    	$name = trim ($_POST['name']);

				$str = $name;
				$slug = slugify($str);

				if (!in_array($imageFileType, $allowedExtention)) {
		        $img = '';
			    } else {
			    	$img = trim ($targetFile);
			    	if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
			        } else {
			            $errors[] = "Sorry, there was an error uploading your file.";
			        }
			    }

				$description = trim ($_POST['description']);
				$parent_id = trim ($_POST['parent_id']);
				$meta_title = trim ($_POST['meta_title']);
				$meta_keyword = trim ($_POST['meta_keyword']);
				$meta_description = trim ($_POST['meta_description']);
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;
				
				$categories = $this->productCategoryModel->addCategory($name, $slug, $img, $description, $parent_id, $meta_title, $meta_keyword, $meta_description, $status);
				if ($categories = true){
					header('Location:?c=productcategory&m=index');
				}
		    }
		    


		}

		$data = [
			'errors' => $errors,
			'categories' => $categories
		];

		return view('product_categories.create', $data);
	}

	public function update()
	{
		$data = $errors = [];

		$categories = $this->productCategoryModel->getCategories($where = '');

		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
		if ($id == 0) {
			redirect('index.php?c=productcategory');
		}
		$where = 'id = ' . $id;
		$product_category = $this->productCategoryModel->getCategory($where);
		if (is_null($product_category)) {
			redirect('index.php?c=productcategory');
		}

		$allowedExtention = ['png', 'gif', 'jpg'];
		$targetDir = "public/img/product_categories/";


		if (isset($_POST['submit'])) {
			if (!isset($_POST['name']) || $_POST['name'] == '') {
				$errors[] = 'Bạn chưa nhập name';
			}

			if (!isset($_POST['parent_id']) || $_POST['parent_id'] == '') {
				$errors[] = 'Bạn chưa nhập Parent Id';
			}

			$targetFile = $targetDir . $_FILES["file"]["name"];
			$imageFileType = @end(explode('.', $_FILES["file"]["name"]));

			if (!in_array($imageFileType, $allowedExtention)) {
				$img = $product_category['img'];
			} else {
				$img = trim ($targetFile);
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
				} else {
					$errors[] = "Sorry, there was an error uploading your file.";
				}
			}
			

			if (count($errors) == 0) {
				$id = trim($_POST['id']);
				$name = trim($_POST['name']);
				$str = $name;
				$slug = slugify($str);
				$description = trim($_POST['description']);
				$parent_id = trim($_POST['parent_id']);
				$meta_title = trim($_POST['meta_title']);
				$meta_keyword = trim($_POST['meta_keyword']);
				$meta_description = trim($_POST['meta_description']);
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;

				$categories = $this->productCategoryModel->editCategory($id, $name, $slug, $img, $description, $parent_id, $meta_title, $meta_keyword, $meta_description, $status);

				if ($categories) {
					redirect('index.php?c=productcategory&m=index');
				}
			}
		}

		$data = [
			'product_category' => $product_category,
			'errors' => $errors,
			'categories' => $categories
		] ;
		return view('product_categories.update', $data);
	}

	public function delete()
	{
		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?productcategory');
		}

		$where = 'id = ' . $id;
		$product_category = $this->productCategoryModel->getCategory($where);
		if (!is_null($product_category)) {
			$this->productCategoryModel->deleteCategory($id);
		}

		redirect('index.php?c=productcategory');
	}
}
?>