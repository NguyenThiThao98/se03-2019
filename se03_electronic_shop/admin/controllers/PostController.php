<?php  

require MODEL_PATH . 'Post.php';

class PostController {

	protected $postModel;

	public function __construct()
	{
		$this->postModel = new Post();
	}


	public function index()

}

?>