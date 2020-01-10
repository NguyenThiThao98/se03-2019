<?php  
	require MODEL_PATH . 'ProductCategory.php';
	/**
	 * 
	 */
	class ProductCategoryController
	{
		protected $ProductCategoryModel;

		public function __construct()
		{
			$this->ProductCategoryModel = new ProductCategory;
		}

		
	}
?>