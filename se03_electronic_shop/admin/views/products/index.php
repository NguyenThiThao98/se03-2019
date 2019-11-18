<!-- NProgress -->
<link href="public/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- Datatables -->
<link href="public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="public/build/css/custom.min.css" rel="stylesheet">

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left" style="clear: both;">
        <h3>Danh sách sản phẩm</small></h3>
    </div>

    <div class="title_right" style="float: right;">
        <div class="add-product" style="font-size: 14px;border-radius: 10px;padding: 10px;float: right;">
        <a href="index.php?c=product&m=create" style="color: #BA5905;">THÊM MỚI</a>
    </div>
</div>
</div>

<div class="clearfix"></div>
<table id="datatable" class="table table-striped table-bordered dataTable no-footer">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá sản phẩm</th>
            <th>Thương hiệu</th> 
            <th>Thư mục</th>               
            <th>Trạng thái</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <th>Chi tiết</th>
        </tr>
    </thead>

    <tbody>
        <?php
        if (count($products) > 0) : 
            $i = 0;
            foreach ($products as $item) :
                $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $item['id'];?></td>
                    <td><?php echo $item['name'];?></td>
                    <td>
                        <img src="<?php if ($item['img'] == null) echo " "; else echo $item['img'] ;?>" style= "width: 40px; height: 40px;">
                    </td>
                    <td><?php if($item['price'] == null) echo '0 VND'; else echo number_format($item['price']) . " VND";?></td>
                    <td><?php echo $item['brand_name'];?></td>
                    <td><?php echo $item['category_name'];?></td>
                    <td><?php echo displayStatus($item['status']);?></td>
                    <td>
                        <a href="index.php?c=product&m=update&id=<?php echo $item['id'];?>" title="">Sửa</a>
                    </td>
                    <td>
                        <a onclick="return checkDelete();" href="index.php?c=product&m=delete&id=<?php echo $item['id'];?>" title="">Xóa</a>
                    </td>
                    <td>
                        <a href="index.php?c=product&m=view&id=<?php echo $item['id'];?>" title="">Thông tin</a>
                    </td>
                </tr>
                <?php
            endforeach;
        else: 
            ?>
            <tr><td colspan="8">Chưa có bản ghi</td></tr>
            <?php
        endif; 
        ?>
    </tbody>
</table>
<div>

</div>
</div>
</div>
<script src="public/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="public/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="public/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="public/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="public/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="public/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="public/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="public/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="public/vendors/jszip/dist/jszip.min.js"></script>
<script src="public/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="public/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script type="text/javascript">
    $('#datatable').DataTable();


    function checkDelete()
    {
        if (!confirm('Bạn chắc chắn muốn xóa ?')) {
            return false;
        }
    }
</script>