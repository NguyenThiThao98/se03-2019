<script src="public/tinymce/tinymce.min.js"></script>
 <script>
  tinymce.init({
  selector: 'textarea',
  height: 200,
  theme: 'modern',
  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [

  ]
 });
</script>
<div class="right_col" role="main">
<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Sủa Thông tin Quảng Cáo</h3>
  </div>

</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
  
      <div class="x_content">

        <form class="form-horizontal form-label-left" novalidate action="" method="post" enctype="multipart/form-data">

          <p> <code>(*)</code> Thông tin bắt buộc
          </p>

          <div class="message">
			<!-- Thông báo lỗi  -->
			<?php 
				if (count($errors) > 0) :
					for ($i = 0; $i < count($errors); $i++) :
			?>
				<p class="errors" style="color: red;"><?php echo $errors[$i];?></p>
				<?php 
					endfor;
				endif ;
			?><!-- end errors -->
		</div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id" readonly="readonly" type="text" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $banner['id'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên quảng cáo<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" type="text" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $banner['name'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <p>
                <img src="<?php echo $banner['img'];?>" style="width: auto;height: 260px;">
              </p>
              
              <input type="file" name="file" id="file" value="<?php echo $banner['img'] ; ?>">
            </div>
          </div>
          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Đường dẫn
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="link" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['link'])) echo $_POST['link']; else echo $banner['link'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Miêu tả
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea   name="description" value="<?php if ($_POST['description']) echo $_POST['description'] ;?>"><?php echo $banner['description']; ?></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Chức vụ
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="position" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['position'])) echo $_POST['position']; else echo $banner['position'] ;?>">
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="checkbox" name="status" value="1" <?php if ($banner['status'] == 1) echo "checked = 'checked'" ;?>> Kích hoạt
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

