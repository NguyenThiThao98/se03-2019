<?php  
	class Admin extends Database 
	{
		public function getAdmins($where = null,$orderBy = null,$limit = null)
		{
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}

			$sql = sprintf("SELECT admins.*
							FROM admins 
							WHERE 1=1 %s %s 
							%s ",$condition,$orderBy,$limit);
			
			$query = $this->_connect->query($sql);

			if ($query) {
				return $query->fetch_all(MYSQLI_ASSOC);
			}

			return null;

		}	

		public function getAdmin($field,$where)
		{
			$sql 	= sprintf("SELECT %s FROM admins WHERE %s ",$field,$where);

			$query	= $this->_connect->query($sql);

			if ($query) {
			 	return $query->fetch_assoc();
			}

			return null; 
		}


		public function createAdmin($username,$phone,$fullname,$email,$password,$address,$level,$status)
		{
			$created_at = date("Y-m-d");
			$password = md5($password);
			$sql = sprintf("INSERT INTO admins(username, password, fullname, address,phone,email, role, created_at, status) 
				VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s) ", "'{$username}'"
				,"'{$password}'","'{$fullname}'","'{$address}'","'{$phone}'"
				,"'{$email}'","'{$level}'","'{$created_at}'","'{$status}'");

			$query = $this->_connect->query($sql);

			if ($query) {
				return true;
			}

			return false;
		}

		public function updateAdmin($username,$phone,$fullname,$email,$password,$address,$level,$status,$where = null)
		{

			$updated_at = date("Y-m-d");

			$password 	= md5($password);

			$set = " 
				username 		= '{$username}',

				password 		= '{$password}',

				fullname 		= '{$fullname}',

				address  		= '{$address}',

				phone 		 	= '{$phone}',

				email   	 	= '{$email}',

				level    		= '{$level}',

				updated_at 		= '{$updated_at}',

				status 			= '{$status}'
			
			";

			$sql 		= sprintf("UPDATE admins SET %s 
							WHERE %s",$set,$where);

			$edit 		= $this->_connect->query($sql);

			if ($edit) {
				return true;
			} else {
				return false;
			}

		}

		public function deleteAdmin($where = null)
		{
			$sql = sprintf("DELETE FROM admins WHERE %s",$where);

			$delete = $this->_connect->query($sql);

			if ($delete) {
				return true;
			} else {
				return false;
			}
		}
	}
?>