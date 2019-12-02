<?php 

class Banner extends Database {

	public function addBanner($name, $img, $link, $description, $position, $status)
	{	
		$created_at = date('Y-m-d');
		$sql = "INSERT INTO banners (name, img, link, description, position, created_at, status) VALUES ('$name', '$img', '$link', '$description', '$position', '$created_at', '$status')";

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

	public function editBanner($id, $name, $img, $link, $description, $position, $status)
	{
		$updated_at = date('Y-m-d');
		$sql = "UPDATE banners SET name = '$name', img = '$img', link = '$link', description = '$description', position = '$position', updated_at = '$updated_at', status = '$status' WHERE id = $id";
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

	public function totalBanner()
	{

	}

	public function getBanner($where = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM banners WHERE 1=1 %s LIMIT 1", $condition);
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

	public function getBanners($where = '')
	{
		$condition = '';
		if ($where != '') {
			$condition = 'AND ' . $where;
		}

		$sql = sprintf("SELECT * FROM banners WHERE 1=1 %s ", $condition);
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

	public function deleteBanner($id)
	{
		$sql = "DELETE FROM banners WHERE id='{$id}'";
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