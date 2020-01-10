<?php  
	/**
	 * 
	 */
	class ProductReview extends Database
	{
		
		public function createReview($productId,$userId,$content,$rate = 0,$status = 0){

			$created_at = date("Y-m-d");

			$sql = sprintf("INSERT INTO product_review(product_id,user_id,content,rate,created_at,status) VALUES( %s, %s, %s, %s, %s, %s)", "'{$productId}'","'{$userId}'","'{$content}'","'{$rate}'","'{$created_at}'","'{$status}'");

			try {

				$query = $this->_connect->query($sql);

				if ($query) {
					return true;
				}
				
			} catch (Exception $e) {
				$e->getMessage();
			}

			return false;
		}
	}
?>