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
	.brands-slider {
		display: none;
	}
	.footer {
		display: none;
	}
	th, td {
		padding: 10px;
	}

  #edit{
    height: 35px;
    width: 68px;
    border-radius: 8px;
  }
</style>

<div class="container">
      <div class="row" style="padding-bottom:  10px;">
        <div class="col-md-2" style="padding-right: 0px; padding-top: 40px;">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                  <span data-feather="home">Chung</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?c=customer&m=profile&email=<?php echo $_SESSION['customer']['email']; ?>">
                  <span data-feather="file"></span>
                  Thông tin tài khoản
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?c=customer&m=edit_info&email=<?php echo $_SESSION['customer']['email']; ?>">
                  <span data-feather="shopping-cart"></span>
                  Sửa thông tin
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?c=customer&m=edit_password&email=<?php echo $_SESSION['customer']['email']; ?>">
                  <span data-feather="users"></span>
                  Thay mật khẩu
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?c=customer&m=edit_address&email=<?php echo $_SESSION['customer']['email']; ?>">
                  <span data-feather="bar-chart-2"></span>
                  Thay đổi địa chỉ
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?c=customer&m=bought&email=<?php echo $_SESSION['customer']['email']; ?>">
                  <span data-feather="layers"></span>
                  Lịch sử mua hàng
                </a>
              </li>
            </ul>

          </div>
        </div>

        <div role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

          
