<style type="text/css">
	.heading-form {
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.heading-form h2 a {
		background-color: #003ba8;
		color: #fff;
		text-transform: uppercase;
		font-size: 21px;
		font-weight: bold;
		padding: 5px 50px 5px 20px;
		position: relative;
	}
	.heading-form h2 a:after {
		content: '';
	    border-color: transparent transparent transparent transparent;
	    position: absolute;
	    width: 0;
	    height: 0;
	    border-width: 29px;
	    border-style: solid;
	    right: -29px;
	    top: -27px;
	    border-bottom: 51px solid;
	}
	.bill {
		text-align: right;
		margin-right: 20px;
	}
</style>
<div class="cart" style="margin-top: 20px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 cart-info">
				<div class="heading-form">
					<h2>
						<a href="#" style="text-decoration: none;">Đơn hàng của bạn </a>
					</h2>
				</div>
				<?php  
					if (count($cart) > 0) :
				?>	
				<div class="main-form">
					<form action="?c=cart&m=update" method="POST">
						<table class="table table-hover">
						  <thead style="background-color: yellow;">
						    <tr>
						      <th scope="col">Hình ảnh</th>
						      <th scope="col">Tên sản phẩm</th>
						      <th scope="col">Giá</th>
						      <th scope="col">Số lượng</th>
						      <th scope="col">Tổng tiền</th>
						      <th scope="col"></th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php  
						  		foreach ($cart as $item) :
						  	?>
						    <tr>
						      <th scope="row"><img src="<?php echo $item['img']; ?>" width= 50 height = 50></th>

						      <td><?php echo $item['name']; ?></td>

						      <td><?php echo number_format($item['price']); ?></td>

						      <td><input type="text" name="qty[<?php echo $item['id']; ?>]" value="<?php if (isset($_POST['qty'][$item['id']])) {
							echo $_POST['qty'][$item['id']];
						} else {
							echo $item['qty'];
						} ?>"></td>

								<td>
									<?php echo number_format($item['price'] * $item['qty']); ?>
								</td>

								<td>
									<a href="?c=cart&m=delCart&id=<?php echo $item['id']; ?>" class="btn btn-primary" ><i class="far fa-trash-alt"></i></a>
								</td>
						    </tr>
						    <?php  
						    	endforeach;
						    ?>

						    <tr>
						    	<th scope="row"></th>
						    	<td colspan="3"></td>
						    	<td> Tổng : <?php echo number_format($total); ?> VNĐ</td>
						    	<td><input type="submit" name="submit" value="Update" class="btn btn-warning"></td>
						    	
						    </tr>
						    
						  </tbody>
						</table>
						<input type="button" class="btn btn-secondary" id="click_buy" value="Thanh toán"> </input>
					</form>
				</div>
				<div class="bill">
					<!-- <a href="?c=order&m=index" class="btn btn-secondary"> Thanh toán</a>  -->
					
				</div>
				<?php  
					else:
				?>
				<div class="message">
					<a href="?c=home&m=index"><?php  
						echo $message;
					?></a>
				</div>
				<?php  
					endif;
				?>
			</div>
		</div>
	</div>
</div>

<div class="container" style="margin-top: 20px;">
	
	<form action="?c=order&m=addOrder" method="POST" id="form-buy">
		<h2>Thông tin đơn hàng</h2>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Họ tên</label>
		    <input type="text" class="form-control" id="hoten" name="hoten">	    
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Email </label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Số điện thoại</label>
		    <input type="text" class="form-control" id="phone" name="phone">	    
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Địa chỉ</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>	     
		  </div>
		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Tổng tiền</label>
		    <div class="col-sm-10">
		      <input type="text" readonly class="form-control-plaintext" id="amount" value="<?php echo number_format($total) .'&nbsp;' .'VND'; ?>" name="amount">
		    </div>
		  </div>
		  <div class="form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">Thanh toán trực tiếp</label>
		  </div>
		  <div class="form-group" style="display: none;">
		    <label for="exampleInputEmail1">Hidden </label>
		    <input type="text" class="form-control" id="infoUser" value="<?php if(isset($_SESSION['customer'])) echo $_SESSION['customer']['id']; ?>" name="userId" readonly="">
		  </div>
		  <button type="submit" class="btn btn-primary">Thanh toán</button>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	
	// làm mọi thứ biến mất
	$('#form-buy').animate({marginLeft: -300,opacity: 0, height: 0});

	// bắt event và tạo animate
	$('#click_buy').click(function() {
		// form đăng nhập đi vào
		$('#form-buy').animate({marginLeft: 0,opacity: 1, height: 600});  
	});


});
</script>