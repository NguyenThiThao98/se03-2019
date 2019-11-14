<style type="text/css">
	.widget-title {
		height: 40px;
		line-height: 40px;
	    font-size: 16px;
	    text-transform: uppercase;
	    border: 1px solid #e1e1e1;
	    padding-left: 20px;
	    border-left: 3px solid #606366;
	    color: #606366;
	}
	.beta-lists>* {
	    padding: 20px;
	    border-bottom: 1px dotted #e1e1e1; 
	}
	img	{
		width: 100%;
	}
	a{
		color: black;
	}
	a:hover{
		background-color: #003ba8;
		color: black;
		text-decoration: none;
	}

</style>

<div class="container" style="margin-top: 20px; margin-bottom: 20px; ">
	<div id="content">
		<div class="row">
			<div class="col-sm-9 col-md-9">

				<div class="row">
					<div class="col-sm-4 col-md-4">
						<a href="#">
							<img src="<?php echo $product['img']; ?>" width=320px>
						</a>
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<h3 class="single-item-title"><?php echo $product['name']; ?></h3>
							<h5 class="single-item-price">
								<span>Giá sản phẩm : <?php echo number_format($product['price']); ?> ₫</span>
							</h5>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

<!--						<div class="promotion">-->
<!--							<div class="name">Khuyến mại đặc biệt (SL có hạn)</div>-->
<!--							<div class="content">-->
<!--								<i>KHÁCH HÀNG ĐƯỢC HƯỞNG NHỮNG QUYỀN LỢI SAU</i><br>-->
<!--								<p class="titkms"> Khuyến mại</p>-->
<!--								<ul>-->
<!--									<li>Trả góp 0%</li>-->
<!--									<li>Tặng PMH Phụ Kiện 500,000đ</li>-->
<!--									<li>Cơ hội trúng 30 Smart Tivi Panasonic 55 inch</li>-->
<!--									<li>Giảm: <span style="color: red;">100K</span> áp dụng HSSV mua BHV tại <span style="color: red;"> 337 Cầu Giấy</span></li>-->
<!--									<li>Mua: Dán cường lực 5D chỉ <span style="color: red;">99K</span></li>-->
<!--								</ul>-->
<!---->
<!---->
<!--								<p class="titkms">Ưu đãi thêm</p>-->
<!--								<ul>-->
<!--									<li>Tặng gói bảo hiểm rơi vỡ trong thời gian 6 tháng (kích hoạt thông qua ứng dụng Galaxy từ 26/05 - 30/06) & Gói Quà tặng Galaxy xem phim & Coffe cuối tuần trị giá 1 triệu</li>-->
<!--									<li>Giao hàng tận nơi miễn phí trong 30 phút.(Địa chỉ ở Hà Nội)</li>-->
<!--								</ul>-->
<!---->
<!--							</div>-->
<!--						</div>-->
						<div class="single-item-desc">
							<?php  
								echo $product['description'];
							?>
						</div>
						<div class="space20">&nbsp;</div>

						
						<div class="single-item-options">
							<a class="btn btn-primary" href="#"><i class="fa fa-shopping-cart"></i> Mua ngay</a>

							<a class="btn btn-danger" href="?c=cart&m=addCart&id=<?php echo $product['id']; ?>"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="comment">
					<p style="font-size: 30px; color: red;">Để lại ý kiến của bạn :</p>
					<?php  
						if (isset($_SESSION['customer'])) :
					?>
					
					<textarea style="width: 100%; height: 114px;" id="comment"
						user="<?php echo $_SESSION['customer']['email']; ?>"

					></textarea>
					<!-- <?php var_dump($_SESSION['customer']); ?> -->
					<button type="button" class="btn btn-primary demo" id="submitReview">Đăng </button>
					
					<?php  
						else:
					?>
					<p> Đăng nhập để gửi bình luận.</p>
					<?php  
						endif;
					?>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<div class="panel" id="tab-description">
						<?php  
							echo $product['content'];
						?>
					</div>
				</div>
				<p style="font-size: 21px; color: black;">Khách hàng nhận xét: </p>
				<div class="review">
					<?php  
						if (count($customers) > 0 ) :
							foreach ($customers as $key => $value) :
					?>
					<p> <?php echo $key; ?></p>
					<blockquote style="width: 100%; display: block;height: 50px; text-indent: 10px;">
						<?php echo $value; ?>
					</blockquote>
					<?php  
							endforeach;
						endif;
					?>
				</div>
				
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list" id="beta-products-list">
					<div class="row">
						<div  class="col-sm-4" id="same_brand">
							<a href="#beta-products-list"><h4>Sản phẩm cùng hãng</h4></a>
						</div>
						<div  class="col-sm-4" id="same_product">
							<a href="#beta-products-list"><h4>Sản phẩm tương tự</h4></a>
						</div>
						<div class="col-sm-4"></div>
						<div class="col-sm-4"></div>
						<div class="col-sm-4"></div>
					</div>
					
					<!-- Sản phẩm cùng hãng -->
					<div class="row" id="list_same_brand">
						<?php  
							foreach ($products as $item) :
						?>
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="?c=product&m=view&id=<?php echo $item['id']; ?>"><img src="<?php echo $item['img']; ?>" alt=""></a>
								</div>
								<div class="single-item-body" style="display: block;text-align: center;">
									<p class="single-item-title"><?php echo $item['name']; ?></p>
									<p class="single-item-price">
										<span>Giá:<?php echo number_format($item['price']); ?> ₫</span>
									</p>
								</div>
								<div class="single-item-caption"style="display: block;text-align: center;" >
									<a class="btn btn-primary" href="#"><i class="fa fa-shopping-cart"></i> Mua ngay</a>

									<a class="btn btn-danger" href="?c=cart&m=addCart&id=<?php echo $item['id']; ?>"><i class="fas fa-shopping-bag"></i></a>
							<div class="clearfix"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

						<?php  
							endforeach;
						?>

						
					</div><!-- end cùng hãng -->

					<!-- Sản phẩm tương tự -->
					<div class="row" id="list_same_product">
						<?php  
							foreach ($productSame as $item) :
						?>
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="?c=product&m=view&id=<?php echo $item['id']; ?>"><img src="<?php echo $item['img']; ?>" alt=""></a>
								</div>
								<div class="single-item-body" style="display: block;text-align: center;">
									<p class="single-item-title"><?php echo $item['name']; ?></p>
									<p class="single-item-price">
										<span>Giá:<?php echo number_format($item['price']); ?> ₫</span>
									</p>
								</div>
								<div class="single-item-caption"style="display: block;text-align: center;" >
									<a class="btn btn-primary" href="#"><i class="fa fa-shopping-cart"></i> Mua ngay</a>

									<a class="btn btn-danger" href="?c=cart&m=addCart&id=<?php echo $item['id']; ?>"><i class="fas fa-shopping-bag"></i></a>
							<div class="clearfix"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

						<?php  
							endforeach;
						?>

						
					</div><!-- end tương tự -->
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Khuyến mại shock</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<?php  
								foreach ($productSale as $item) :
							?>
							<div class="media beta-sales-item">
								<a class="pull-left" href="?c=product&m=view&id=<?php echo $item['id']; ?>"><img style="width: 100%;" src="<?php echo $item['img']; ?>" alt=""></a>
								<div class="media-body">
									<a href="?c=product&m=view&id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a><br>
									<span class="beta-sales-price"><?php echo number_format($item['price']); ?></span>
								</div>
							</div>
							<?php  
								endforeach;
							?>
							
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">Sản phẩm mới</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<?php  
								foreach ($productNew as $item) :
							?>
							<div class="media beta-sales-item">
								<a class="pull-left" href="?c=product&m=view&id=<?php echo $item['id']; ?>"><img src="<?php echo $item['img']; ?>" alt=""></a>
								<div class="media-body">
									<a href="?c=product&m=view&id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a><br>
									<span class="beta-sales-price"><?php echo number_format($item['price']); ?></span>
								</div>
							</div>
							<?php  
								endforeach;
							?>
							
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.single-item-title').css('color','red');
		$('.single-item-header img').css('width','270px');
		$('.beta-sales-item img').css('width','50px');
		$('.pull-left').css('margin-right','20px');
	})

	$(document).ready(function(){
		$('.demo').click(function(){

			var content = $('#comment').val();

			var email = $('#comment').attr("user");

			$.ajax({
				url:"index.php?c=productReview&m=addReview",

				method:"GET",

				dataType:"json",

				data:{email:email,content:content},

				success:function(res){
					
					console.log(res);
				}
			});

		})
	});
</script>


<script type="text/javascript">
	$(document).ready(function() {

	document.getElementById('same_brand').style.borderBottom= '3px solid #ff001f';
	// làm mọi thứ biến mất
	$('#list_same_product').animate({marginLeft: -300,opacity: 0, height: 0});

	// bắt event và tạo animate
	$('#same_product').click(function() {
		// form đăng nhập đi vào
		document.getElementById('same_brand').style.borderBottom= '3px solid #ffff';

		document.getElementById('same_product').style.borderBottom= '3px solid #ff001f';

		$('#list_same_product').animate({marginLeft: 0,opacity: 1,height: 855});
		// form đăng ký đi ra
		$('#list_same_brand').animate({marginLeft: -100000,opacity: 1, height: 0});
	});

	$('#same_brand').click(function() {

		document.getElementById('same_product').style.borderBottom= '3px solid #ffff';

		document.getElementById('same_brand').style.borderBottom= '3px solid #ff001f';
		
		// form đăng nhập đi vào
		$('#list_same_brand').animate({marginLeft: 0,opacity: 1,height: 855});
		// form đăng ký đi ra
		$('#list_same_product').animate({marginLeft: -100000,opacity: 1, height: 0});
	});


});
</script>