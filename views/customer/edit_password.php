<?php  
include('menu_left.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Thay đổi mật khẩu</h1>
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
			<td>Mật khẩu hiện tại</td>
			<td><input type="password" name="password_old" ></td>
		</tr>
		<tr>
			<td>Mật khẩu mới</td>
			<td><input type="password" name="password_new" ></td>
		</tr>
		<tr>
			<td>Nhập lại mật khẩu mới</td>
			<td><input type="password" name="password_confirm" ></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Submit" id="edit"></td>
		</tr>
	</table>
</form>

<?php  
include('footer.php');
?>