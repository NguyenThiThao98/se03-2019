
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Danh sách admin </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <form class="input-group" method="GET">
                        <input type="text" class="form-control" placeholder="username.." name="search">
                        <span class="input-group-btn">
                          <input class="btn btn-primary" type="submit" value="Tìm" name="submit">Go!</input>
                        </span>
                  </form>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <a href="?c=admin&m=add" class="btn btn-primary"> Thêm admin</a>
                      </div>

                      <div class="clearfix"></div>

                      <?php
                        if (count($admins) > 0 && !is_null($admins)) :
                          foreach ($admins as $admin) :
                      ?>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Admin</i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $admin['username']; ?></h2>
                              <p><strong>Fullname: </strong> <?php echo $admin['fullname']; ?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-envelope"></i> Email: <?php echo $admin['email'] ?> </li>
                                <li><i class="fa fa-phone"></i> Phone:<?php echo $admin['phone']; ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="<?php echo $admin['img']; ?>" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                              
                              <a class="btn btn-primary btn-xs" href="?c=admin&m=view&id=<?php echo $admin['id']; ?>">
                                <i class="fa fa-user"> </i> View Profile
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?php  
                          endforeach;
                        else :
                      ?>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <p>
                            Chưa có dữ liệu.
                        </p>
                      </div>
                      <?php  
                        endif;
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->