<?php  
	/**
	 * 
	 */
	class Customer extends Database
	{

		public function getCustomer($filed = "*", $join, $where)
		{
			$condition = '';
			if ($where != '') {
				$condition = 'AND customers.' . $where;
			}

			$sql = sprintf("SELECT %s FROM customers %s WHERE 1=1 %s", $filed, $join, $condition);

			//echo $sql;exit();

			try {
				$query = $this->_connect->query($sql);

				if ($query) {
					return $query->fetch_assoc();
				}

			} catch (Exception $e) {
				$e->getMessage();
			}

			return null;
		}

		public function addCustomer($fullname,$email,$phone,$password)
		{
			$created_at = date("Y-m-d");

			$password   = password_hash($password, PASSWORD_DEFAULT);

			$sql = sprintf("INSERT INTO customers(fullname,email,phone,password,created_at) VALUES (%s, %s,%s,%s,%s)" , "'{$fullname}'","'{$email}'","'{$phone}'" ,"'{$password}'","'{$created_at}'");

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

		public function getOders($filed = "*", $join, $where)
		{
			$condition = '';
			if ($where != '') {
				$condition = 'AND ' . $where;
			}

			$sql = sprintf("SELECT %s FROM orders %s WHERE 1=1 %s", $filed, $join, $condition);
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
		
		public function editCustomer($id, $fullname, $email, $password, $phone, $address, $province_id, $district_id, $gender)
		{
			$updated_at = date('Y-m-d');
			$sql = "UPDATE customers SET fullname = '$fullname', email = '$email', password = '$password', address = '$address', province_id = '$province_id', district_id = '$district_id', phone = '$phone', gender = '$gender', updated_at = '$updated_at' WHERE id = $id";
			//echo $sql; exit();
			try {

				$query = $this->_connect->query($sql);
				//echo $query; exit();
				if ($query) {
					return  $this->_connect->insert_id;

				}
			} catch (Exception $ex) {
				die($ex->getMessage());
			}

			return false;
		}

		public function getProvinces()
		{
			$sql = sprintf("SELECT * FROM provinces  WHERE 1=1 ");

			try {
				$query = $this->_connect->query($sql);

				if ($query) {
					return $query->fetch_all(MYSQLI_ASSOC);
				}

			} catch (Exception $e) {
				$e->getMessage();
			}

			return null;
		}

		public function getDistricts($provinceId)
		{
			$sql = sprintf("SELECT * FROM districts WHERE province_id=%s", $provinceId);
			$result = $this->_connect->query($sql);
			if ($result && $result->num_rows > 0) {
				return $result->fetch_all(MYSQLI_ASSOC);
			}

		}


	}
?>