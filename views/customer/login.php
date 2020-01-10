<link rel="stylesheet" type="text/css" href="public/css/login.css">

<!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập hệ thống</div>
				  	<div class="panel-body">
				    	<form action="" method="POST">
				    		<?php  
				    			if (count($errors) > 0) :
				    				foreach ($errors as $key=>$value) :
				    		?>
				    		<div class="message">
				    			<label style="color: red;">
				    				<?php  
				    					echo $value;
				    				?>
				    			</label>
				    		</div>
				    		<br>
				    		<?php  
				    				endforeach;
				    			endif;
				    		?>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email"  
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<button type="submit" class="btn btn-success" name="submit">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->