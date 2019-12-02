<style type="text/css">
  .header {
    display: none;
  }
  .slider {
    display: none;
  }
  .news {
    display: none;
  }
  .footer {
    display: none;
  }
  .brands-slider {
    display: none;
  }
</style>

 <!-- Page Content -->
    <div class="container">

      <!-- slider -->
      <div class="row carousel-holder">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 21px;color: blue;text-align: center;">Đăng ký tài khoản</div>
            <div class="panel-body">
              <form action="" method="POST">
                <?php  
                  if (count($errors) > 0) :
                    foreach ($errors as $key => $value) :
                ?>
                <div class="message">

                  <label style="color: red;">
                    <?php echo $value; ?>
                  </label>
                  
                 </div>
                <br>
                <?php 
                     endforeach;
                  endif;
                ?>
                <div>
                  <label>Họ tên</label>
                  <input type="text" class="form-control" placeholder="Fullname" name="fullname" aria-describedby="basic-addon1">
                 </div>
                <br>
                <div>
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
                    >
                </div>
                <br>
                <div>
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" 
                    name="phone" aria-describedby="basic-addon1"
                    >
                </div>
                <br>    
                <div>
                    <label>Nhập mật khẩu</label>
                    <input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
                </div>
                <br>
                <div>
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="submit">Đăng ký
                </button>

              </form>
            </div>
        </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
