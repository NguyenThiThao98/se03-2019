<?php

class ProductReview extends Database {

	public function getReviews($field = '*',$join = '', $where = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT %s FROM product_reviews %s WHERE 1=1 %s ",$field, $join, $condition);
		// echo $sql; exit();
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

	public function getProduct($field = '*',$join = '', $where = '')
	{

		$condition = '';
		if ($where != '') {
			$condition = 'AND products.' . $where;
		}

		$sql = sprintf("SELECT %s FROM products %s WHERE 1=1 %s ", $field, $join, $condition);

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

	public function getReview($field = '*',$join = '', $where = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT %s FROM product_reviews %s WHERE 1=1 %s LIMIT 1 ",$field, $join, $condition);
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

	public function editReview($id, $content, $status)
	{
		$sql = "UPDATE product_reviews SET content = '$content', status = '$status' WHERE id = '$id'";
		//echo $sql; exit();
		try {
			$query = $this->_connect->query($sql);
			// echo $query; exit();
			if ($query) {
				return true;
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
 		}
		return false;
	}

	public function deleteReview($id)
	{

		$sql = "DELETE FROM product_reviews WHERE id = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			if ($query) {
				return true;
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		return false;
	}
}
?>
