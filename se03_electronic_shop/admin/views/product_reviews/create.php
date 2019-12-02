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
    <h3>Sửa nội dung đánh giá</h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

        <form class="form-horizontal form-label-left" novalidate action="" method="post" enctype="multipart/form-data">
            <div class="message">
              <?php if ($success != null) :?>
                <p class="success" style="color: blue;"> <?php echo $success; ?></p>
              <?php endif; ?>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Khách hàng <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" type="text" readonly="readonly" value="<?php echo $review['customers'] ;?>">
                </div>
            </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea   name="content" value="<?php if (isset($_POST['content'])) echo $_POST['content']; else echo $review['content'] ;?>"><?php echo $review['content'] ;?></textarea>
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="status" value="1" <?php if (isset($_POST['status']) && $_POST['status'] == 1 || $review['status'] == 1) echo "checked = 'checked'" ;?>> Kích hoạt
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
