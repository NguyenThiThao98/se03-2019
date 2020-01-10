<?php  
include('menu_left.php');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sửa thông tin</h1>
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
			<td>Tên tài khoản</td>
			<td><input type="text" name="fullname" value="<?php if(isset($_POST['fullname']))echo $_POST['fullname']; else  echo $customer['fullname']; ?>"></td>
		</tr>
		<tr>
			<td>Tên tài khoản</td>
			<td>
				<input type="radio" name="gender" value="1" <?php if (isset($_POST["gender"]) && $_POST["gender"] == 1 || $customer['gender'] == 1) echo "checked = 'checked' "; ?>> Nam
				<input type="radio" name="gender" value="0" <?php if (isset($_POST["gender"]) && $_POST["gender"] == 0 || $customer['gender'] == 0) echo "checked = 'checked' "; ?>> Nữ
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" readonly="readonly" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo $customer['email']; ?>"></td>
		</tr>
		<tr>
			<td>Số điện thoại</td>
			<td><input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; else echo $customer['phone']; ?>"></td>
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