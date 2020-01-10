<?php 

class ProductCategory extends Database {

	public function getCategories($where = '')
	{	
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM product_categories WHERE 1=1 %s ", $condition);

	
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

	public function addCategory($name, $slug, $img, $description, $parent_id, $meta_title, $meta_keyword, $meta_description, $status)
	{
		$sql = "INSERT INTO product_categories (name, slug, img, description, parent_id, meta_title, meta_keyword, meta_description, status) VALUES ('$name', '$slug', '$img', '$description', '$parent_id', '$meta_title', '$meta_keyword', '$meta_description', '$status')";
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

	public function editCategory($id, $name, $slug, $img, $description, $parent_id, $meta_title, $meta_keyword, $meta_description, $status)
	{
		$sql = "UPDATE product_categories SET name = '$name', slug = '$slug', img = '$img', description = '$description', parent_id = '$parent_id', meta_title = '$meta_title', meta_keyword = '$meta_keyword', meta_description = '$meta_description', status = '$status' WHERE id = $id";
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

	public function getCategory($where ='')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM product_categories WHERE 1=1 %s LIMIT 1", $condition);
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

	public function deleteCategory($id)
	{
		
		$sql = "DELETE FROM product_relates WHERE product_id IN (SELECT id FROM products WHERE product_category_id  = '{$id}')";
		
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		// __________________ Delete product_image ___________________________________
		$sql = "DELETE FROM product_images WHERE product_id IN (SELECT id FROM products WHERE product_category_id  = '{$id}')";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		
		// _________________ Delete product_reviews _____________________
		$sql = "DELETE FROM product_reviews WHERE product_id IN (SELECT id FROM products WHERE product_category_id  = '{$id}')";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		// ____________Delete oder_items______________________________
		$sql = "DELETE FROM order_items WHERE product_id IN (SELECT id FROM products WHERE product_category_id  = '{$id}')";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}


		// ______________________ Delete products __________________
		$sql = "DELETE FROM products WHERE product_category_id  = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		// ______________________ Delete product_categories __________________
		$sql = "DELETE FROM product_categories WHERE id='{$id}'";
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