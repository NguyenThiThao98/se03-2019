<?php

class Product extends Database {

	public function addProduct($name, $slug, $price, $colors, $size, $qty, $brand_id, $product_category_id, $description, $content, $views, $is_new, $is_promo, $is_featured, $is_sale, $status)
	{
		$created_at = date('Y-m-d');
		$sql = "INSERT INTO products (name, slug, price, colors, size, qty, brand_id, product_category_id, description, content, views, is_new, is_promo, is_featured, is_sale, created_at, status) VALUES ('$name', '$slug', '$price', '$colors', '$size', '$qty', '$brand_id', '$product_category_id', '$description', '$content', '$views', '$is_new', '$is_promo', '$is_featured', '$is_sale', '$created_at', '$status')";
		
		try {
			$query = $this->_connect->query($sql);

			if ($query) {
				return $this->_connect->insert_id;
				//exit();
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
 		}
		return false;
	}

	public function addProductImages($id, $img, $is_featured)
	{
		$sql = "INSERT INTO product_images (product_id, img, is_featured) VALUES ('$id', '$img', '$is_featured')";
		//echo $sql; exit();
		try {
			$query = $this->_connect->query($sql);

			if ($query) {
				return $this->_connect->insert_id;
				//exit();
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
 		}
		return false;
	}

	public function getBrands()
	{
		$sql = "SELECT * FROM brands";
		$query = $this->_connect->query($sql);
		if ($query) {
			return $query->fetch_all(MYSQLI_ASSOC);
		}
	}

	public function getCategories()
	{
		$sql = "SELECT * FROM product_categories";
		$query = $this->_connect->query($sql);
		if ($query) {
			return $query->fetch_all(MYSQLI_ASSOC);
		}
	}

	public function editProduct($id,$name, $sku, $slug, $price, $colors, $size, $qty, $brand_id, $product_category_id, $description, $content, $views, $is_new, $is_promo, $is_featured, $is_sale, $status)
	{	
		$updated_at = date('Y-m-d');
		$sql = "UPDATE products SET sku = '$sku', name = '$name', slug = '$slug', price = '$price', colors = '$colors', size = '$size', qty = '$qty', brand_id = '$brand_id', product_category_id = '$product_category_id', description = '$description', content = '$content', views = '$views', is_new = '$is_new', is_promo = '$is_promo', is_featured = '$is_featured', is_sale = '$is_sale', updated_at = '$updated_at' WHERE id = '$id'";
		try {
			$query = $this->_connect->query($sql);

			if ($query) {
				return $this->_connect->insert_id;
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
 		}
		return false;
		
	}

	public function editProductImages($id, $img, $is_featured)
	{	
		$sql = "UPDATE product_images SET img = '$img', is_featured = '$is_featured' WHERE product_id = '$id'";
		//echo $sql; exit();
		try {
			$query = $this->_connect->query($sql);

			if ($query) {
				return $this->_connect->insert_id;
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
 		}
		return false;
		
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

	public function getProducts($field = '*',$join = '', $where = '', $orderby = '')
    {

    	$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT %s FROM products %s WHERE 1=1 %s %s ",$field, $join, $condition, $orderby);
		echo $sql; exit();
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

    public function deleteProduct($id)
	{

		$sql = "DELETE FROM product_relates WHERE product_id = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		$sql = "DELETE FROM product_reviews WHERE product_id = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		$sql = "DELETE FROM order_items WHERE product_id = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		$sql = "DELETE FROM product_images WHERE product_id = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		$sql = "DELETE FROM products WHERE id = '{$id}'";
		try {

			$query = $this->_connect->query($sql);
			if ($query) {
				return $this->_connect->insert_id;
			}
		} catch (Exception $ex) {
			die($ex->getMessage());
		}

		return false;
	}

	
}