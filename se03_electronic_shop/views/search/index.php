<?php 
	if (count($productsNew) != 0) :

 ?>

<div class="container">
	<div class="products">
			<div class="products-header">
				<div class="row">
					<div class="col-md-12 box-content-left-fix header">
						<a href="">
							Kết quả tìm kiếm
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
</div>
<?php  
	else:
?>
<div class="container">
	<a href="?c=home&m=index" class="btn btn-primary">Không có sản phẩm thỏa mãn. Quay lại trang chủ.</a>
</div>
<?php endif; ?>
