<?php 

class PostCategory extends Database {

	public function getCategories($where = '')
	{	
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM post_categories WHERE 1=1 %s ", $condition);

	
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