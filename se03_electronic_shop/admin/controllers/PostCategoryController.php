<?php  

require MODEL_PATH . 'PostCategory.php';

class PostCategoryController {

	protected $postCategoryModel;

	public function __construct()
	{
		$this->postCategoryModel = new PostCategory();
	}


	public function index()
	{
		$data = [];

		$where = "";
		$categories = $this->postCategoryModel->getCategories($where);
		$data['categories'] = $categories;
		
		return view('post_categories.index', $data);
	}

	public function create()
	{
		$data = [];

		return view('post_categories.create', $data);
	}

}

?>