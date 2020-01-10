<?php 
/**
* 
*/
class Order extends Database
{

	public function getOrders($where = '', $filed = '*', $join = '', $orderBy = null,$limit = null)
		{
			$condition = '';

			if ($where != '') {
				$condition = ' AND ' . $where;
			}

			$sql = sprintf("SELECT %s FROM orders %s WHERE 1=1 %s %s 
							%s ",$filed, $join, $condition,$orderBy,$limit);
			//echo $sql;exit();
			
			$query = $this->_connect->query($sql);

			if ($query) {
				return $query->fetch_all(MYSQLI_ASSOC);
			}

			return null;

		}	

		public function getOrder($field,$where)
		{
			$sql 	= sprintf("SELECT %s FROM orders WHERE %s ",$field,$where);

			$query	= $this->_connect->query($sql);

			if ($query) {
			 	return $query->fetch_assoc();
			}

			return null; 
		}
		public function createOrder($user_id,$fullname,$email,$phone,$address,$provicence_id,$district_id,$amount,$note,$created_at,$updated_at,$status)
		{
			$created_at = date("Y-m-d");
			$sql = sprintf("INSERT INTO orders(id, user_id,fullname, email, phone, address, provicence_id, district_id, amount, note, created_at, updated_at,status)
				VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s) ", "'{$user_id}'"
				,"'{$fullname}'","'{$email}'","'{$phone}'","'{$address}'"
				,"'{$provicence_id}'","'{$district_id}'","'{$amount}'","'{$note}'","'{$created_at}'","'{$updated_at}'","'{$status}'");

			$query = $this->_connect->query($sql);

			if ($query) {
				return true;
			}

			return false;
		}
		public function updateOrder($user_id,$fullname,$email,$phone,$address,$provicence_id,$district_id,$amount,$note,$created_at,$updated_at,$status,$where = null)
		{

			$updated_at = date("Y-m-d");

			$set = " 
				user_id 		= '{$user_id}',

				fullname 		= '{$fullname}',

				email   	 	= '{$email}',

				phone 		 	= '{$phone}',

				address  		= '{$address}',

				provicence_id    		= '{$provicence_id}',

				district_id 		= '{$district_id}',

				amount  		= '{$amount}',

				note  		= '{$note}',

				created_at  		= '{$created_at}',

				updated_at  		= '{$updated_at}',

				status 			= '{$status}'
			
			";

			$sql 		= sprintf("UPDATE orders SET %s 
							WHERE %s",$set,$where);

			$edit 		= $this->_connect->query($sql);

			if ($edit) {
				return true;
			} else {
				return false;
			}

		}
		public function deleteOrder($where = null)
		{
			$sql = sprintf("DELETE FROM orders WHERE %s",$where);

			$delete = $this->_connect->query($sql);

			if ($delete) {
				return true;
			} else {
				return false;
			}
		}

		
}
 ?>