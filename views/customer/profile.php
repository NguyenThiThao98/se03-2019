<?php  
include('menu_left.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Thông tin chung</h1>
 </div>

<table style="" border="1">
	<tbody>
		<tr>
			<td>Tên:</td>
			<td><?php echo $customer['fullname']; ?></td>
		</tr>
		<tr>
			<td>Giới tính:</td>

			<td><?php
			 echo displayGender($customer['gender']); ?></td>
		</tr>

		<tr>
			<td>Email:</td>
			<td><?php echo $customer['email']; ?></td>
		</tr>
		<tr>
			<td>Số điện thoại:</td>
			<td><?php echo $customer['phone']; ?></td>
		</tr>
		<tr>
			<td>Thời gian tạo:</td>
			<td><?php echo date("d-m-Y",strtotime($customer['created_at'])); ?></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><?php echo $customer['address']. ' ' . $customer['district'] . ', ' . $customer['province'] ; ?></td>
		</tr>
	</tbody>
</table>

<?php  
include('footer.php');
?>