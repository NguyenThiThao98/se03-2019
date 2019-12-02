<?php  
	
	class Customer extends Database
	{
		public function getCustomers($field = '*', $join, $where)
		{	
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}
			$sql = sprintf("SELECT %s FROM customers %s WHERE 1=1 %s ",$field, $join, $condition);
			//echo $sql; exit();

			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}
		}

		public function getCustomer($field = '*', $join, $where)
		{	
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}
			$sql = sprintf("SELECT %s FROM customers %s WHERE 1=1 %s ",$field, $join, $condition);
			// echo $sql; exit();

			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_assoc();
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}
		}

		public function getOrders($field = '*', $join, $where)
		{
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}

			$sql = sprintf("SELECT %s FROM orders %s WHERE 1=1 %s ",$field, $join, $condition);
			//echo $sql; exit();
			
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}
		}

		public function getItems($field = '*', $join, $where)
		{
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}

			$sql = sprintf("SELECT %s FROM order_items %s WHERE 1=1 %s ",$field, $join, $condition);
			//echo $sql; exit();
			
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}
		}

		public function getPrices($field = '*', $join, $where)
		{
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}

			$sql = sprintf("SELECT %s FROM order_items %s WHERE 1=1 %s ",$field, $join, $condition);
			// echo $sql; exit();
			
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_assoc();
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}
		}

		public function getReviews($field = '*', $join, $where)
		{
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}

			$sql = sprintf("SELECT %s FROM product_reviews %s WHERE 1=1 %s ",$field, $join, $condition);
			//echo $sql; exit();
			
			try {
				$query = $this->_connect->query($sql);
				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}
		}

	}
?>