<div class="right_col" role="main">
<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Sửa thông tin Sản Phẩm</h3>
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

            <label class="control-label col-md-3 col-sm-3 col-xs-12">ID<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="id" class="form-control col-md-7 col-xs-12" readonly="readonly" data-validate-length-range="6" data-validate-words="2" name="id" placeholder="" type="text" value="<?php if (isset($_POST['id'])) echo $_POST['id']; else echo $product['id'] ;?>">
            </div>
          </div>

	        <div class="item form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên sản phẩm <span class="required">*</span>
	            </label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" type="text" value="<?php if (isset($_POST['name'])) echo $_POST['name']; else echo $product['name'] ;?>">
	            </div>
	        </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <p>
                <img src="<?php echo $product['img'];?>" style="width: auto;height: 260px;">
              </p>
              
              <input type="file" name="file" id="file" value="<?php echo $product['img'] ; ?>">
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="price" placeholder="" type="text" value="<?php if (isset($_POST['price'])) echo $_POST['price']; else echo $product['price'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Màu sắc
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="colors" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="colors" placeholder="" type="text" value="<?php if (isset($_POST['colors'])) echo $_POST['colors']; else echo $product['colors'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích thước
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="size" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="size" placeholder="" type="text" value="<?php if (isset($_POST['size'])) echo $_POST['size']; else echo $product['size'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sô lượng<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="qty" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="qty" placeholder="" type="text" value="<?php if (isset($_POST['qty'])) echo $_POST['qty']; else echo $product['qty'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thương hiệu <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<select name="brand_id">
                <option value="">---Chọn---</option>
                <?php  
                  if (!is_null ($brands) && count ($brands) > 0):
                    foreach ($brands as $item):
                ?>
                <option value="<?php echo $item['id'] ;?>"
                  <?php if (isset($_POST['brand_id']) && $_POST['brand_id'] == $item['id'] || $product['brand_id'] == $item['id']) echo 'selected = "selected" ' ; ?>
                >
                  <?php echo $item['name']  . " - " . $item["id"];?>
                </option>
                <?php  
                  endforeach;
                endif;
                ?>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thư mục sản phẩm <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<select name="product_category_id">
                <option value="">---Chọn---</option>
                <?php  
                  if (!is_null ($product_categories) && count ($product_categories) > 0):
                    foreach ($product_categories as $item):
                ?>
                <option value="<?php echo $item['id'] ;?>"
                  <?php if (isset($_POST['product_category_id']) && $_POST['product_category_id'] == $item['id'] || $product['product_category_id'] == $item['id']) echo 'selected = "selected" ' ; ?>
                >
                  <?php echo $item['name']  . " - " . $item["id"];?>
                </option>
                <?php  
                  endforeach;
                endif;
                ?>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Miêu tả
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<textarea  rows="6" type="text" name="description" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['description'])) echo $_POST['description']; else echo $product['description'] ;?>"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mội dung
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<textarea  rows="6" type="text" name="content" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['content'])) echo $_POST['content']; else echo $product['content'] ;?>"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lượt xem
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="views" class="form-control col-md-7 col-xs-12" value="<?php if (isset($_POST['views'])) echo $_POST['views']; else echo $product['views'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is New
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="checkbox" name="is_new" value="1" <?php if ($product['is_new'] == 1) echo "checked = 'checked'" ;?>>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Promo
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="checkbox" name="is_promo" value="1" <?php if ($product['is_promo'] == 1) echo "checked = 'checked'" ;?>>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Featured
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="checkbox" name="is_featured" value="1" <?php if ($product['is_featured'] == 1) echo "checked = 'checked'" ;?>>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Sale
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="checkbox" name="is_sale" value="1" <?php if ($product['is_sale'] == 1) echo "checked = 'checked'" ;?>>
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="checkbox" name="status" value="1" <?php if ($product['status'] == 1) echo "checked = 'checked'" ;?>>   Kích hoạt
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

