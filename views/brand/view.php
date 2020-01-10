<style type="text/css">
	.aside-menu {
	    list-style: none;
	    background: #f8f8f8;
	    border: 1px solid #e5e4e4;
	    padding: 25px;
	}
	.aside-menu li {
    	padding: 10px 0;
    	border-bottom: 1px solid #e5e4e4;
	}

	.page-item {
		margin-left: 10px !important;
	}
</style>

<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						
						<li class="is-active"><a href="#">Tìm kiếm sản phẩm</a></li>
						<li><a href="#">Từ 1 - 3 triệu</a></li>
						<li><a href="#">Từ 3- 6 triệu</a></li>
						<li><a href="#">Trên 10 triệu</a></li>
						<li><a href="#">Trên 15 triệu</a></li>
						<li><a href="#">Nhập khoảng giá</a></li>
						<li><a href="#">Tất cả</a></li>
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4><?php echo $brands['name']; ?></h4>
						<div class="beta-products-details">
							<p class="pull-left" style="color: green;"><?php echo $brands['totalProducts']; ?> SP</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							<?php  
								foreach ($products as $item) :
							?>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="?c=product&m=view&id=<?php echo $item['id']; ?>"><img src="<?php echo $item['img']; ?>" width="270px"></a>
									</div>
									<div class="single-item-body" style="text-align: center;">
										<p class="single-item-title"><?php echo $item['name']; ?></p>
										<p class="single-item-price">
											<span>Price: <?php echo number_format($item['price']); ?></span>
										</p>
									</div>
									<div class="caption-cart btn-group  btn-group-justified" role="group">
									<a href="?c=product&m=view&id=<?php echo $item['id']; ?>" class="btn btn-primary">
										<i class="far fa-eye"></i>
										Chi Tiết
									</a>

									<button type="button" class="btn btn-success buyNow" role="button" product="<?php echo $item['id']; ?>">
										<i class="fas fa-cart-plus"></i>

										Chọn Mua
									</button>
								</div>
								</div>
							</div>
							<?php  
								endforeach;
							?>
							
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>
					<div class="page" style="width: 200px;">
						<nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-center">
						    <li class="page-item disabled">
						      <a class="page-link" href="#" tabindex="-1">Previous</a>
						    </li>
						    <?php  
						    	for ($i=1; $i <= $totalPages ; $i++) :
						    ?>
						    <li class="page-item"><a class="page-link" href="?c=brand&m=view&id=1&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>

						    <?php  
						    	endfor;
						    ?>

						    <li class="page-item">
						      <a class="page-link" href="#">Next</a>
						    </li>
						  </ul>
						</nav>
					</div>

				</div>

			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
	
</div> <!-- .container -->

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
				}
			});

		})
	});
</script>