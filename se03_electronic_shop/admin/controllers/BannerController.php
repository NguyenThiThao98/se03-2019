<?php  

require MODEL_PATH . 'Banner.php';

class BannerController {

	protected $bannerModel;

	public function __construct()
	{
		$this->bannerModel = new Banner();
	}

	public function index()
	{
		$data = [];
		$where = '';
		if (isset($_GET['name']) && $_GET['name'] != '') {
			$where = "name LIKE '%" . trim($_GET['name']) . "%'"; 
		}

		$banners = $this->bannerModel->getBanners($where);
		$data['banners'] = $banners;

		return view('banners.index', $data);
	}

	public function create()
	{
		$data = $errors = [];

		$allowedExtention = ['png', 'gif', 'jpg'];
		$targetDir = "public/img/banners/";

		if (isset($_POST['reset'])) {
			redirect('index.php?c=banner');
		}

		if (isset($_POST['submit'])) {
			if (!isset($_POST['name']) || $_POST['name'] == '') {
				$errors[] = 'Tên bạn đang để trống';
			}

			$targetFile = $targetDir . $_FILES["file"]["name"];
		    $imageFileType = @end(explode('.', $_FILES["file"]["name"]));

		    if (!in_array($imageFileType, $allowedExtention)) {
		        $img = '';
		    } else {
		    	$img = trim ($targetFile);
		    }

			if (count ($errors) == 0){
				$name = trim($_POST['name']);
				$link = trim($_POST['link']);
				$description = trim($_POST['description']);
				$position = trim($_POST['position']);
				
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;

				if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
		        } else {
		            $errors[] = "Sorry, there was an error uploading your file.";
		        }
				
				$banner = $this->bannerModel->addBanner($name, $img, $link, $description, $position, $status);
				if ($banner = true){
					header('Location:?c=banner&m=index');
				}
				
			}
		}

		$data['errors'] = $errors;
		return view('banners.create', $data);
	}

	public function update()
	{
		$data = $errors = [];

		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?c=banner');
		}

		$where = 'id = ' . $id;
		$banner = $this->bannerModel->getBanner($where);
		if (is_null($banner)){
			redirect('index.php?c=banner');
		}
		$data['banner'] = $banner;

		if (isset($_POST['reset'])) {
			redirect('index.php?c=banner&m=index');
		}

		if (isset($_POST['submit'])) {
			if (!isset($_POST['name']) || $_POST['name'] == '') {
				$errors[] = 'Tên bạn đang để trống';
			}

			$allowedExtention = ['png', 'gif', 'jpg'];
			$targetDir = "public/img/banners/";

			$targetFile = $targetDir . $_FILES["file"]["name"];
			$imageFileType = @end(explode('.', $_FILES["file"]["name"]));

			if (count($errors) == 0) {
				$id = trim($_POST['id']);
				$name = trim($_POST['name']);
				$link = trim($_POST['link']);
				$description = trim($_POST['description']);
				$position = trim($_POST['position']);
				$status = (isset($_POST['status'])) ? $_POST['status'] : 0;

				if (!in_array($imageFileType, $allowedExtention)) {
					$img = $banner['img'];
				} else {
					$img = trim ($targetFile);

					if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
					} else {
						$errors[] = "Sorry, there was an error uploading your file.";
					}
				}

				$banner = $this->bannerModel->editBanner($id, $name, $img, $link, $description, $position, $status);
				//var_dump($banner); exit();

				if ($banner) {
					redirect('index.php?c=banner&m=index');
				}
			}
		}

		$data['errors'] = $errors;

		return view('banners.update', $data);
	}

	public function delete()
	{
		$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

		if ($id == 0) {
			redirect('index.php?c=banner');
		}

		$where = 'id = ' . $id;
		$banner = $this->bannerModel->getBanner($where);
		if (!is_null($banner)) {
			$this->bannerModel->deleteBanner($id);
		}

		redirect('index.php?c=banner');
	}

}

?>