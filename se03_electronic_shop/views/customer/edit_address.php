
<?php  
include('menu_left.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Thay đổi địa chỉ</h1>
 </div>

<form action="" method="post">

	<table>
		<div class="message">
			<?php 
				if (count($errors) > 0) :
					for ($i = 0; $i < count($errors); $i++) :
			?>
			<tr>
				<td>
					<p  style="color: red;"><?php echo $errors[$i];?></p>
				</td>
			</tr>
			<?php 
					endfor;
				endif ;
			?>
		</div>
		
		<tr>
			<td>Tỉnh/Thành phố:</td>
			<td>
				<select name="province_id" id="optionProvince">
					<option value="">Chọn</option>
					<?php  
					if (count($provinces) > 0):
						foreach ($provinces as $province):
					?>
					<option value="<?php echo $province['id'] ;?>" 
						<?php if ((isset($_POST['province_id'])) && $_POST['province_id'] == $province['id'] || $customer['province_id'] == $province['id']) echo 'selected = "selected" ' ; ?>

						
					>
						<?php echo $province['name'] ;?>
							
					</option>
					<?php  
						endforeach ;
					endif;
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Huyện/Quận:</td>
			<td>
				<select name="district_id" id="optionDistrict">
					<option value="">Chọn</option>
					
				</select>
			</td>
		</tr>

		<tr>
			<td>Mật khẩu</td>
			<td><input type="password" name="password" ></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit" value="Submit" id="edit"></td>
		</tr>
	</table>
</form>

<?php  
include('footer.php');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#optionProvince').change(function(){
			var provinceId = $(this).val();
			//alert(provinceId);
			$.ajax({
				url: '?c=customer&m=district&province_id=' + provinceId,
				method: 'GET',
				success: function(res)
				{
					$('#optionDistrict').empty().html(res);
				}
			})
		});
	});
</script>

<?php /*if (isset($_POST['product_category_id']) && $_POST['product_category_id'] == $item['id'] || $product['product_category_id'] == $item['id']) echo 'selected = "selected" ' ;*/ ?>