<div class="right_col" role="main">
<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Form Order Add</h3>
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

          <p> <code>(*)</code> Thông tin bắt buộc
          </p>
          <span class="section">Order Info</span>

          

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">User_id <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" type="text" value="<?php if (isset($_POST['user_id'])) echo $_POST['user_id'] ;?>">
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fullname
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="fullname" id="fullname">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="email" id="email">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="phone" id="phone">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Adress
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="meta_title" class="form-control col-md-7 col-xs-12" value="">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Provicence_id
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="meta_keyword" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['provicence_id'])) echo $_POST['provicence_id'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">District_id
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="meta_description" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['district_id'])) echo $_POST['district_id'] ;?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="amount" class="form-control col-md-7 col-xs-12" >
            </div>
          </div>
           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Note
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="note" class="form-control col-md-7 col-xs-12" >
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Created_at
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="note" class="form-control col-md-7 col-xs-12" >
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Updated_at
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="note" class="form-control col-md-7 col-xs-12" >
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="status" value="1">
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" name="reset" class="btn btn-primary">Cancel</button>
              <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

