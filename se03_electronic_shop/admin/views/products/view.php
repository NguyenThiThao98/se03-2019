
<div class="right_col" role="main">
<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Form Product View</h3>
  </div>
  <div class="title_right" style="float: right;">
      <div class="add-product" style="font-size: 14px;border-radius: 10px;padding: 10px;float: right;">
      <a href="index.php?c=productReview&m=index&id=<?php echo $product['id'];?>" style="color: #BA5905;">Review sản phẩm</a>
  </div>
</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Thông tin Sản Phẩm</h2>
        <div class="add-product" style="float: right;">
      <a href="index.php?c=product&m=update&id=<?php echo $product['id'];?>" style="color: #BA5905;">Sửa thông tin sản phẩm</a>
      </div>
        <div class="clearfix"></div>

      <div class="x_content">

        <form class="form-horizontal form-label-left" novalidate action="" method="post" enctype="multipart/form-data">
          <span class="section"> </span>

          <div class="item form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12">ID
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="id" class="form-control col-md-7 col-xs-12" readonly="readonly" data-validate-length-range="6" data-validate-words="2" name="id" readonly="readonly" type="text" value="<?php echo $product['id'] ;?>">
            </div>
          </div>

           <div class="item form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sku 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="sku" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sku" readonly="readonly" type="text" value="<?php echo $product['sku'] ;?>">
            </div>
          </div>
          <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Name 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" readonly="readonly" type="text" value="<?php echo $product['name'] ;?>">
              </div>
          </div>

          <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <p>
                  <img src="<?php echo $product['img'];?>" style="width: auto;height: 260px;">
                </p>
              </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="price" readonly="readonly" type="text" value="<?php echo $product['price'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Màu sắc
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="colors" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="colors" readonly="readonly" type="text" value="<?php echo $product['colors'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích thước
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="size" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="size" readonly="readonly" type="text" value="<?php echo $product['size'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Qty
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="qty" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="qty" readonly="readonly" type="text" value="<?php echo $product['qty'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thương hiệu
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="brand_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="brand_name"  readonly="readonly" type="text" value="<?php echo $product['brand_name'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thư mục
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="category_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="category_name"  readonly="readonly" type="text" value="<?php echo $product['category_name'];?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea  rows="6" type="text" readonly="readonly" name="description" class="form-control col-md-7 col-xs-12" value="<?php echo $product['description'] ;?>"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea  rows="6" type="text" readonly="readonly" name="content" class="form-control col-md-7 col-xs-12" value="<?php echo $product['content'] ;?>"></textarea>
            </div>
          </div>

         <!--  <div class="item form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12">Reviews
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea  rows="6" type="text" readonly="readonly" name="reviews" class="form-control col-md-7 col-xs-12" value="">
                <?php 
                    if (count($customers) > 0) :

                      foreach ($customers as $key=>$value) :
                ?>
                    <?php echo $key  . " - " . $value;?>
                <?php 
                    endforeach;
                  endif ;
                ?>
                
              </textarea>
            </div>
          </div> -->

          <div class="item form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12">Views
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="views" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $product['views'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is New
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="index" name="is_new" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo displayStatus($product['is_new']);?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Promo
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="index" name="is_promo" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo displayStatus($product['is_promo']);?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Featured
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="index" name="is_featured" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo displayStatus($product['is_featured']);?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Sale
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="index" name="is_sale" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo displayStatus($product['is_sale']);?>">
            </div>
          </div>
          
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Created At
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" name="created_at" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $product['created_at'] ;?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Updated At
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" name="updated_at" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $product['updated_at'] ;?>">
            </div>
          </div>

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="index" name="status" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo displayStatus($product['status']);?>">
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

