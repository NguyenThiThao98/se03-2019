<?php  
	/**
	 * Order
	 */
	class Order extends Database
	{
		public function addOrder($userId,$fullname,$email,$amount,$phone,$address,$note,$carts)
		{
			$created_at = date('Y-m-d');
			$updated_at = date('Y-m-d');

			$sql = sprintf("INSERT INTO orders
				(user_id,
				fullname,
				email,
				phone,
				address,
				amount,
				note,
				created_at,
				updated_at
				) 
			VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s)",
						"'{$userId}'",
						"'{$fullname}'",
						"'{$email}'",						
						"'{$phone}'",
						"'{$address}'",
						"'{$amount}'",
						"'{$note}'",
						$created_at,
						$updated_at
					);
			
			try {
				$query = $this->_connect->query($sql);
				if($query){
					// add Record table order_item
					$orderId =  mysqli_insert_id($this->_connect); 
					foreach ($carts as $cart) {
						//var_dump($cart);
						$productId = $cart['id'];
						$price = $cart['price'];
						$qty = $cart['qty'];

						$sql = sprintf("INSERT INTO order_items (
								order_id,
								product_id,
								price,
								qty
							) 
							VALUES
							(%s , %s ,%s ,%s )",
							$orderId,
							$productId,
							$price,
							$qty
						);

						$query = $this->_connect->query($sql);

						if($query){
							return true;
						}
					}


					
				}
			} catch (Exception $e){
				$e->getMessage();
			}
			return "them that bai";
		}
	}

?>