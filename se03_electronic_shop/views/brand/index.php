
<div class="brands-slider">
	<div class="new-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading-new">
					<a href="" style="color: blue;">
						Thương hiệu
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme">
				    <div class="item"><a href=""><img src="public/img/brands/td1.jpg"></a></div>
				    <div class="item"><a href=""><img src="public/img/brands/td2.jpg"></a></div>
				    <div class="item"><a href=""><img src="public/img/brands/td3.jpg"></a></div>
				    <div class="item"><a href=""><img src="public/img/brands/td4.jpg"></a></div>
				    <div class="item"><a href=""><img src="public/img/brands/td5.jpg"></a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
	});
	})
</script>