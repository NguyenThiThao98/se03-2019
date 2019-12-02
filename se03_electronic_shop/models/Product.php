<?php  
	/**
	 * 
	 */
	class Product extends Database
	{
		
		public function getProducts($field = '*',$join=null,$where = null,$orderBy = null,$limit = null,$offset=null)
		{
			$condition = '';

			if ($where != '') {
				$condition = 'AND' . $where;
			}

			$sql = sprintf("SELECT %s FROM products %s  WHERE 1=1 %s %s %s %s",$field,$join,$condition , $orderBy,$limit,$offset);
			//echo $sql; exit();
			try {
				$query = $this->_connect->query($sql);

				return $query->fetch_all(MYSQLI_ASSOC);

			} catch (Exception $e) {
				$e->getMessage();
			}

			return null;
		}

		public function getProduct($field = '*',$join = '', $where = '')
		{

			$condition = '';
			if ($where != '') {
				$condition = 'AND products.' . $where;
			}

			$sql = sprintf("SELECT %s FROM products %s WHERE 1=1 %s ", $field, $join, $condition);
			//echo $sql; exit();
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_assoc();
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}

			return null;
			
		}

		public function getTheSameBrand($field, $join, $where, $limit, $offset, $orderBy)
		{
			$condition = '';
			if ($where != '') {
				$condition = 'AND ' . $where;
			}
			$sql = sprintf("SELECT %s FROM products %s WHERE 1=1 %s ORDER BY %s LIMIT %s ", $field, $join, $condition, $orderBy, $limit);
			//echo $sql; exit();
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}

			return null;
		}

		public function getTheSameProducts($field, $join, $where, $limit, $offset, $orderBy)
		{
			$condition = '';
			if ($where != '') {
				$condition = 'AND ' . $where;
			}
			$sql = sprintf("SELECT %s FROM products %s WHERE 1=1 %s ORDER BY %s LIMIT %s ", $field, $join, $condition, $orderBy, $limit);
			//echo $sql; exit();
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}

			return null;
		}

		public function getProductExtras($field, $join, $where, $limit, $offset, $orderBy)
		{
			$condition = '';
			if ($where != '') {
				$condition = 'AND ' . $where;
			}
			$sql = sprintf("SELECT %s FROM products %s WHERE 1=1 %s ORDER BY %s LIMIT %s OFFSET %s", $field, $join, $condition, $orderBy, $limit, $offset);
			//echo $sql; exit();
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}

			return null;
		}

	}
?>