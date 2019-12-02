<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  
<style type="text/css">
	.banner {
		background-image: url('public/img/banner/photo-1519120693210-d47b03b31d77.jpg');
	}
	.header .search {
		text-align: center;
	}
	.header .clearfix {
		border-color: black;
		background-color: black;
	}
	.header-top {
		background-color: whitesmoke;
    	padding: 5px 0px;
    	font-weight: bold;
	}
	.header-top a{
		color: #ED2F2F;
		text-decoration: none;
    	
	}
	.list-brands {
		background-color: #2B281E;
		color: white;
	}
	.list-brands a {
		color: whitesmoke;
		font-weight: 500;
	}

</style>
<div id="support-top" style="display: block;border-bottom: 1px solid #ddd; ">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<div class="address-admin">
								<a href="?c=home&m=index"><i class="fa fa-home"></i> 337 Cầu giấy, Hà nội</a>
							</div>					
						</div>
						<div class="col-md-6">
							<div class="phone-admin">
								<a href=""><i class="fa fa-phone"></i> 0914249694</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6" style="display: block;text-align: right;">
					<?php  
						if (isset($_SESSION['customer'])) :
					?>
					<a href="?c=customer&m=profile&email=<?php echo $_SESSION['customer']['email']; ?>"><i class="fa fa-user"></i> &nbsp;<?php echo $_SESSION['customer']['fullname']; ?></a>
					&nbsp;
					<a href="?c=customer&m=logout"> Đăng xuất</a>
					&nbsp;
					<?php  
						else:
					?>
					<a href="?c=customer&m=register">Đăng kí</a>
					&nbsp;
					<a href="?c=customer&m=login">Đăng nhập</a>
					<?php  
						endif;
					?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
</div> <!-- #header -->
<div id="header" style="background: #edea6a;">
	<div class="container">
		<div class="row">
			<div class="col-md-3 clearfix" id="search_left">
				<div class="row">
					<div class="col-md-2">
						<div class="row">
							<a href="?c=home&m=index"><img src="public/img/logo1.png" style="width:40px; height: 40px;"></a>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="input-group">
								<form action="?c=search&m=index" method="POST">
		    						<input type="text" class="form-control" placeholder="Search" name="str" id="timkiem">
		    						 
		    					 <button class="btn btn-primary" type="submit" name="submit"><i class="glyphicon glyphicon-search"></i></button>  
		    						 
		    					</form>	 
    						</div>
							

						</div>
						
					</div>
					
				</div>
			</div>

			<div class="col-md-8" id="menu_top">
				<div class="row">
					<div class="col-md-2">
						<a href="?c=home&m=index"><i class="fas fa-home"></i><br>Trang chủ</a>
					</div>
					<div class="col-md-2">
						<a href=""><i class="fas fa-headphones"></i><br>Phụ kiện</a>
					</div>
					<div class="col-md-2">
						<a href=""><i class="fas fa-mobile-alt"></i><br>Máy cũ <br>giá rẻ</a>
					</div>
					<div class="col-md-2">
						<a href=""><i class="fas fa-wrench"></i><br>Sửa chữa</a>
					</div>
					<div class="col-md-2">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 110.83px; padding-top: 0px;">
					          <i class="fas fa-cart-plus"></i> (<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
					          	echo count($_SESSION['cart']);
					          } else {
					          	echo "0";
					          } ?>)<br>
					          Giỏ hàng
					        </a>

					         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					        	<?php  
					        		if (isset($_SESSION['cart']) && count($_SESSION['cart'])) :
					        			$total = 0 ;
					        			foreach ($_SESSION['cart'] as $item) :
					        	?>
					          <a class="dropdown-item" href="#"><?php echo $item['name']; ?></a>
					          	
					          <?php  
					          				$total += ($item['price'] * $item['qty']);
					          			endforeach;
					          ?>
					          <div class="dropdown-divider"></div>
					          <a class="dropdown-item" href="?c=cart&m=index">Tổng : <?php echo number_format($total); ?> VND</a>					          
					          <?php  
					          	else :
					          ?>
					          <a href="">No item</a>
					          <?php  
					          	endif;
					          ?>
					        </div>
					</div>
					<div class="col-md-2">
						<a href=""><i class="fas fa-fax"></i><br>Liên hệ</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="list-brands clearfix" id="home-brand">
	<div class="container">
		<div class="row">
			<p>Hãng</p>
			<a href="?c=brand&m=view&id=1">Apple</a>
			<a href="?c=brand&m=view&id=4">Xiaomi</a>
			<a href="?c=brand&m=view&id=2">Sony</a>
			<a href="?c=brand&m=view&id=3">Asus</a>
			<a href="?c=brand&m=view&id=5">Samsung</a>
			<a href="">Phụ kiện</a>

		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		//$('.owl-dots').css('display','none');
		$('#submitSearch').click(function(){
			var str = $('#searchName').val();
			alert(str);
			$.ajax({

				url:"index.php?c=search&m=index",

				method:"POST",

				dataType:"json",

				data:{str:str},

				success: function(res){
					alert("vao den day");
					console.log(res);
				}
			});
		});
	})
</script>

<script type="text/javascript">

  window.onload = function(){
    setTimeout("switch_Image()", 3000);
  }
  var current = 1;
  var num_image = 4;
  function switch_Image(){
      current++;
      document.images['image'].src ='public/img/banner/example-slide-' + current + '.jpg';
     if(current < num_image){
       setTimeout("switch_Image()", 3000);
     }else if(current == num_image){
       current = 0;
       setTimeout("switch_Image()", 3000);
     }
 }
</script>
<script type="text/javascript">

</script>