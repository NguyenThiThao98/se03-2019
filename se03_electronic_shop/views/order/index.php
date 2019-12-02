<div class="container" style="margin-top: 20px;">
	<h2>Thông tin đơn hàng</h2>
	<form action="?c=order&m=addOrder" method="POST">
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
		    <input type="text" class="form-control" id="hoten" name="phone">	    
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Địa chỉ</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>	     
		  </div>
		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Tổng tiền</label>
		    <div class="col-sm-10">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $total .'&nbsp;' .'VND'; ?>" name="amount">
		    </div>
		  </div>
		  <div class="form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">thanh toán trực tiếp</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Thanh toán</button>
	</form>
</div>

<script type="text/javascript">
	
</script>