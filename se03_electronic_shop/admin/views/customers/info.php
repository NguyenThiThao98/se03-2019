<div class="right_col" role="main">
<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Thông tin tài khoản: <?php echo $customer['fullname']; ?></h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <form class="form-horizontal form-label-left" novalidate action="" method="post" enctype="multipart/form-data">
         
          <span class="section"></span>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">ID
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id" readonly="readonly" type="text" value="<?php echo $customer['id'] ;?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" readonly="readonly" type="text" value="<?php echo $customer['fullname'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              
                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" readonly="readonly" type="text" value="<?php echo $customer['email'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" readonly="readonly" type="text" value="<?php echo $customer['phone'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" readonly="readonly" type="text" value="<?php echo $customer['address'] . ' - ' . $customer['districts'] . ' - ' .  $customer['provinces'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php if ($customer['gender'] == 1) echo 'Nam'; else 'Nữ';?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhóm khách hàng thân thiết
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $customer['customers_group'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày lập
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $customer['created_at'] ;?>">
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="status" value="1" <?php if ($customer['status'] == 1) echo "checked = 'checked'" ;?>>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" name="reset" class="btn btn-primary">Cancel</button>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

