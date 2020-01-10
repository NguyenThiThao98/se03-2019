<?php  

class Brand extends Database {

	public function addBrand($name, $slug, $logo, $image, $description, $meta_title, $meta_keyword, $meta_description, $status)
	{
		$created_at = date('Y-m-d');
		$sql = "INSERT INTO brands (name, slug, logo, image, description, meta_title, meta_keyword, meta_description, created_at, status) VALUES ('$name', '$slug', '$logo', '$image', '$description', '$meta_title', '$meta_keyword', '$meta_description', '$created_at', '$status')";
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

	public function editBrand($id, $name, $slug, $logo, $image, $description, $meta_title, $meta_keyword, $meta_description, $status)
	{
		$update_at = date('Y-m-d');
		$sql = "UPDATE brands SET name = '$name', logo = '$logo', image = '$image', description = '$description', meta_title = '$meta_title', meta_keyword = '$meta_keyword', meta_description = '$meta_description', update_at = '$update_at', status = '$status' WHERE id = $id";
		//echo $sql; exit();
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

	public function totalBrand()
	{

	}

	public function getBrand($where = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM brands WHERE 1=1 %s LIMIT 1", $condition);
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

	public function getBrandName($where = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM brands WHERE 1=1 %s LIMIT 1", $condition);
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

	public function getBrands($where = '' , $orderby)
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM brands WHERE 1=1 %s %s ", $condition, $orderby);
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

	public function deleteBrand($id)
	{
		
		$sql = "DELETE FROM product_relates WHERE product_id IN (SELECT id FROM products WHERE brand_id = '{$id}')";
		
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		// __________________ Delete product_image ___________________________________
		$sql = "DELETE FROM product_images WHERE product_id IN (SELECT products.id FROM products WHERE products.brand_id = '{$id}')";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		
		// _________________ Delete product_reviews _____________________
		$sql = "DELETE FROM product_reviews WHERE product_id IN (SELECT id FROM products WHERE brand_id = '{$id}')";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		// ____________Delete oder_items______________________________
		$sql = "DELETE FROM order_items WHERE product_id IN (SELECT id FROM products WHERE brand_id = '{$id}')";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}


		// ______________________ Delete products __________________
		$sql = "DELETE FROM products WHERE brand_id = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		// ______________________ Delete brands __________________
		$sql = "DELETE FROM brands WHERE id='{$id}'";
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