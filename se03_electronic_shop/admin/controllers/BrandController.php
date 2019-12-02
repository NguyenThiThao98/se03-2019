<?php  
	require MODEL_PATH . 'Brand.php';

	class BrandController {

	protected $brandModel;

	public function __construct()
	{
		$this->brandModel = new Brand();
	}

	public function index()
	{
		$data = [];
		$where = '';
		$orderby = "ORDER by id DESC";
		if (isset($_GET['name']) && $_GET['name'] != '') {
			$where = "name LIKE '%" . trim($_GET['name']) . "%'"; 
		}

		$brands = $this->brandModel->getBrands($where, $orderby);
		$data['brands'] = $brands;

		return view('brands.index', $data);
	}

	public function create()
	{	
		$data = $errors = [];

		$allowedExtention = ['png', 'gif', 'jpg'];
		$targetDir = "public/img/brands/";
		// $flagSize = [];

		if (isset($_POST['reset'])) {
			redirect('index.php?c=brand&m=index');
		}

		if (isset($_POST['submit'])){
			if (!isset($_POST['name']) || empty($_POST['name'])){
				$errors[] = 'Bạn chưa nhập tên';
			}

			// Image
			$targetFile = $targetDir . $_FILES["file"]["name"];
		    $imageFileType = @end(explode('.', $_FILES["file"]["name"]));

		    if (!in_array($imageFileType, $allowedExtention)) {
		        $image = '';
		    } else {
		    	$image = trim ($targetFile);
		    	if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
		        } else {
		            $errors[] = "Sorry, there was an error uploading your file.";
		        }
		    }
		    

		    // logo
			$targetFile_logo = $targetDir . $_FILES["file_logo"]["name"];
		    $imageFileType_logo = @end(explode('.', $_FILES["file_logo"]["name"]));

		    if (!in_array($imageFileType_logo, $allowedExtention)) {
		        $logo = '';
		    } else {
		    	$logo = trim ($targetFile_logo);
		    	if (move_uploaded_file($_FILES["file_logo"]["tmp_name"], $targetFile_logo)) {
		        } else {
		            $errors[] = "Sorry, there was an error uploading your logo.";
		        }
		    }

			if (count ($errors) == 0){
				$name = trim ($_POST['name']);
				// $slug = trim ($_POST['slug']);
				// $image = trim ($_POST['image']);

				$str = $name;
				$slug = slugify($str);
				$description = trim ($_POST['description']);
				$meta_title = trim ($_POST['meta_title']);
				$meta_keyword = trim ($_POST['meta_keyword']);
				$meta_description = trim ($_POST['meta_description']);
				
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;
				
				$brands = $this->brandModel->addBrand($name, $slug, $logo, $image, $description, $meta_title, $meta_keyword, $meta_description, $status);
				if ($brands = true){
					header('Location:?c=brand&m=index');
				}
				
			}
		}

		$data['errors'] = $errors;

		return view('brands.create', $data);
	}

	public function update() 
	{
		$data = $errors = [];

		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?c=brand');
		}

		$where = 'id = ' . $id;
		$brand = $this->brandModel->getBrand($where);
		if (is_null($brand)) {
			redirect('index.php?c=brand');
		}
		$data['brand'] = $brand;

		if (isset($_POST['reset'])) {
			redirect('index.php?c=brand&m=index');
		}

		if (isset($_POST['submit'])) {
			if (!isset($_POST['name']) || $_POST['name'] == '') {
				$errors[] = 'Vui lòng nhập tên thương hiệu';
			}
			$allowedExtention = ['png', 'gif', 'jpg'];
			$targetDir = "public/img/brands/";

			// logo
			$targetFile_logo = $targetDir . $_FILES["file_logo"]["name"];
			$imageFileType_logo = @end(explode('.', $_FILES["file_logo"]["name"]));

			// image
			
			$targetFile = $targetDir . $_FILES["file"]["name"];
			$imageFileType = @end(explode('.', $_FILES["file"]["name"]));

			if (count($errors) == 0) {
				$id = trim ($_POST['id']);
				$name = trim ($_POST['name']);
				$str = $name;
				$slug = slugify($str);
				$description = trim ($_POST['description']);
				$meta_title = trim ($_POST['meta_title']);
				$meta_keyword = trim ($_POST['meta_keyword']);
				$meta_description = trim ($_POST['meta_description']);
				
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;


				// LOGO
		        if (!in_array($imageFileType_logo, $allowedExtention)) {
			        $logo = $brand['logo'];
			    } else {
			    	$logo = trim ($targetFile_logo);
			    	if (move_uploaded_file($_FILES["file_logo"]["tmp_name"], $targetFile_logo)) {
			        } else {
			            $errors[] = "Sorry, there was an error uploading your file logo.";
			        }
			    }
		    
			    // image
				if (!in_array($imageFileType, $allowedExtention)) {
			        $image = $brand['image'];
			    } else {
			    	$image = trim ($targetFile);
			    	if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
			        } else {
			            $errors[] = "Sorry, there was an error uploading your file.";
			        }
			    }

				$brand = $this->brandModel->editBrand($id, $name, $slug, $logo, $image, $description, $meta_title, $meta_keyword, $meta_description, $status);
				if ($brand) {
					redirect('index.php?c=brand&m=index');
				}
				
			}
		}

		$data['errors'] = $errors;
		return view('brands.update', $data);
	}

	public function delete()
	{
		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?c=brand');
		}

		$where = 'id = ' . $id;
		$brand = $this->brandModel->getBrand($where);
		if (!is_null($brand)) {
			$this->brandModel->deleteBrand($id);
		}

		redirect('index.php?c=brand');
	}

}
?>