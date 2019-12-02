<?php  
	/**
	 * 
	 */
	class Brand extends Database
	{

		public function getBrands($field = '*',$where = '' ,$join = '', $limit = '', $offset = '',$orderBy = null)
		{
			$condition = '';

			if ($where != '') {
				$condition = 'AND' . $where;
			}

			$sql = sprintf("SELECT %s FROM brands  %s WHERE 1=1 %s %s %s %s",$field,$join,$condition , $orderBy,$limit,$offset);
		
			try {
				$query = $this->_connect->query($sql);

				return $query->fetch_all(MYSQLI_ASSOC);

			} catch (Exception $e) {
				$e->getMessage();
			}

			return null;
		}

		public function totalRecordBrand($id)
		{
			$sql = "SELECT brands.id ,COUNT(*) as totalProducts , brands.name 
							FROM brands,products
							WHERE brands.id = products.brand_id
							GROUP BY brands.id 
							HAVING brands.id = '{$id}'";

			try {

				$query = $this->_connect->query($sql);

				return $query->fetch_assoc();

			} catch (Exception $e) {
				$e->getMessage();
			}

			return null;
		}

	}
?>