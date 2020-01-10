<?php  
include('menu_left.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lịch sử mua hàng</h1>
 </div>

<table style="" border="1">
	<thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày mua</th>
            <!-- <th>Địa chỉ</th>  --> 
            <th>Sản phẩm mua</th>              
            <th>Tổng số tiền</th>
            <th>Trang thái đơn hàng</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
        if (count($orders) > 0) : 
            $i = 0;
            foreach ($orders as $item) :
                $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo '#' . $item['id'];?></td>
                    <td><?php echo date('d-m-Y',strtotime($item['created_at']));?></td>
                    <!-- <td><?php echo $item['address'] . ', ' . $item['district'] . ', ' . $item['province'] ;?></td> -->
                    <td><?php echo $item['products'] ;?></td>
                    <td><?php echo number_format($item['price']) . " VND" ;?></td>
                    <td><?php echo displayStatus($item['status']); ?></td>
                    <td>Chi tiết</td>
                <?php
            endforeach;
        else: 
            ?>
            <tr><td colspan="6">Khách hàng chưa mua sản phẩm nào</td></tr>
            <?php
        endif; 
        ?>
    </tbody>
</table>

<?php  
include('footer.php');
?>