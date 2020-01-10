
<style type="text/css">
	#home-brand {
		display: none;
	}
	.buyNow {
		background-color: red;
	}
	.caption-cart {
		background-color: blue;
	}
</style>
<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-9 banner" style="padding-left: 25px;">
				
				<img  name="image" src="public/img/banner/example-slide-1.jpg" alt="" style="width: 100%">
			</div>
			
			<div class="col-md-3">
				<img src="public/img/banner/bnleft-min.png" style="width: 390px;">
			</div>
		</div>
	</div>
</div>
<div class="list-brands clearfix" >
	<div class="container">
		<div class="row">
			<p>Hãng</p>
			<a href="?c=brand&m=view&id=1">Apple</a>
			<a href="?c=brand&m=view&id=4">Xiaomi</a>
			<a href="?c=brand&m=view&id=2">Sony</a>
			<a href="?c=brand&m=view&id=3">Asus</a>
			<a href="?c=brand&m=view&id=5">Samsung</a>
			<a href="?c=brand&m=view&id=6">Phụ kiện</a>

		</div>
	</div>
</div>
<div class="content">
	<div class="container">
		<div class="products">
			<div class="products-header">
				<div class="row">
					<div class="col-md-12 box-content-left-fix header">
						<a href="">
							Sản phẩm mới nhất
						</a>
						<hr>
					</div>
				</div>
			</div>
			<div class="main-products" >
				<div class="row">
					<?php  
						foreach ($productsNew as $item) :
					?>
					<div class="col-md-3 item-product">
						<div class="thumbnail">
							<div class="image-product">
								<a href="?c=product&m=view&id=<?php echo $item['id']; ?>">
									<img src="<?php echo $item['img']; ?>">
								</a>
							</div>
							<div class="caption text-center">
								<div class="caption-name">
									<h2>
										<a href="?c=product&m=view&id=<?php echo $item['id']; ?>" style="font-size: 14px;" >
											<?php  
												echo $item['name'];
											?> 
										</a>
									</h2>
									<b>
										<strong>
											<span class="text-danger">
												Giá: <?php echo number_format($item['price']); ?>	
											</span>
										</strong>
									</b>
								</div>
								<div class="caption-cart btn-group  btn-group-justified" role="group">
									<a href="?c=product&m=view&id=<?php echo $item['id']; ?>" class="btn btn-primary">
										<i class="far fa-eye"></i>
										Chi Tiết
									</a>

									<button type="button" class="btn btn-success buyNow" role="button" product="<?php echo $item['id']; ?>">
										<i class="fas fa-cart-plus"></i>
										Thêm vào giỏ
									</button>
								</div>
							</div>
						</div>

					</div>
					<?php  
						endforeach;
					?>
					
				</div>
			</div>
		</div>

		<div class="products">
			<div class="products-header">
				<div class="row">
					<div class="col-md-12 box-content-left-fix header">
						<a href="">
							Sản phẩm khuyến mại
						</a>
						<hr>
					</div>
				</div>

			</div>
            <div class="main-products" >
                <div class="row">
                    <?php
                    foreach ($productsNew as $item) :
                        ?>
                        <div class="col-md-3 item-product">
                            <div class="thumbnail">
                                <div class="image-product">
                                    <a href="?c=product&m=view&id=<?php echo $item['id']; ?>">
                                        <img src="<?php echo $item['img']; ?>" style="height: 255px;" >
                                    </a>
                                </div>
                                <div class="caption text-center">
                                    <div class="caption-name">
                                        <h2>
                                            <a href="?c=product&m=view&id=<?php echo $item['id']; ?>" style="font-size: 14px;"><?php echo $item['name']; ?></a>
                                        </h2>
                                        <b>
                                            <strong>
											<span class="text-danger">
												Giá: <?php echo number_format($item['price']); ?>
											</span>
                                            </strong>
                                        </b>
                                    </div>
                                    <div class="caption-cart btn-group  btn-group-justified" role="group">
                                        <a href="?c=product&m=view&id=<?php echo $item['id']; ?>" class="btn btn-primary">
                                            <i class="far fa-eye"></i>
                                            Chi Tiết
                                        </a>

                                        <button type="button" class="btn btn-success buyNow" role="button" product="<?php echo $item['id']; ?>">
                                            <i class="fas fa-cart-plus"></i>


                                            Thêm vào giỏ
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
		</div>
		<div class="products">
			<div class="products-header">
				<div class="row">
					<div class="col-md-12 box-content-left-fix header">
						<a href="">
							Sản phẩm HOT 
						</a>
						<hr>
					</div>
				</div>
			</div>
			<div class="main-products">
				<div class="row">
					<?php  
						foreach ($productsHot as $item) :
					?>
					<div class="col-md-3 item-product">
						<div class="thumbnail">
							<div class="image-product">
								<a href="?c=product&m=view&id=<?php echo $item['id']; ?>">
									<img src="<?php echo $item['img']; ?>" style="height: 255px;" >
								</a>
							</div>
							<div class="caption text-center">
								<div class="caption-name">
									<h2>
										<a href="?c=product&m=view&id=<?php echo $item['id']; ?>" style="font-size: 14px;"><?php echo $item['name']; ?></a>
									</h2>
									<b>
										<strong>
											<span class="text-danger">
												Giá: <?php echo number_format($item['price']); ?>	
											</span>
										</strong>
									</b>
								</div>
								<div class="caption-cart btn-group  btn-group-justified" role="group">
									<a href="?c=product&m=view&id=<?php echo $item['id']; ?>" class="btn btn-primary">
										<i class="far fa-eye"></i>
										Chi Tiết
									</a>

									<button type="button" class="btn btn-success buyNow" role="button" product="<?php echo $item['id']; ?>">
										<i class="fas fa-cart-plus"></i>


										Thêm vào giỏ
									</button>
								</div>
							</div>
						</div>

					</div>
					<?php  
						endforeach;
					?>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.buyNow').click(function(){

			let idProduct = $(this).attr("product");

			$.ajax({
				url:"index.php?c=cart&m=addCart",

				method:"GET",

				dataType:"json",

				data:{id:idProduct},

				success:function(res){
					alert("Đã thêm vào giỏ hàng");
					console.log(res);
				}
			});

		})
	});
</script>