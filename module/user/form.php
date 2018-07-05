<?php 

	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;
	
	$nama = "";
	$email = "";
	$phone = "";
	$alamat = "";
	$password = "";
	$level = "";
	$status = "";
	$input_user_id = "";

	if($user_id){
		$input_user_id = "<input type='hidden' name='user_id' value='$user_id'> ";
		$query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id = $user_id");

		if(mysqli_num_rows($query) == 1){
			$row = mysqli_fetch_assoc($query);

			$nama = "value='$row[nama]'";
			$email = "value='$row[email]'";
			$phone = "value='$row[phone]'";
			$alamat = "value='$row[alamat]'";
			$password = "value='$row[password]'";
			$level = "value='$row[level]'";
			$status = $row['status'];	
		}
	}

 ?>

<form action="<?php echo BASE_URL."module/user/action.php" ?>" method="post">
	<div class="element-form">
			<label>Nama</label>
			<span><input type="text" name="nama" <?php echo $nama; ?>></span>
	</div>
	<div class="element-form">
			<label>Email</label>
			<span><input type="email" name="email" <?php echo $email; ?>></span>
	</div>
	<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat" id="" rows="7"><?php echo $alamat; ?></textarea></span>
	</div>
	<div class="element-form">
			<label>Phone</label>
			<span><input type="number" name="phone" <?php echo $phone; ?>></span>
	</div>
	<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password"></span>
	</div>
	<div class="element-form">
			<label>Status</label>
			<span>
					<input type="radio" name="status" value="on" <?php if($status == "on") echo "checked=true" ?> >On &nbsp;
					<input type="radio" name="status" value="off" <?php if($status == "off") echo "checked=true" ?>>Off &nbsp;
			</span>
	</div>
	<div class="element-form">
			<label>Level</label>
			<span>
					<select name="level" id="">
						<option value="administrator" <?php echo ($level == "administrator") ? "selected=selected" : ""; ?>>Administrator</option>
						<option value="customer" <?php echo ($level == "customer") ? "selected=selected" : ""; ?>>Customer</option>
					</select>
			</span>
	</div>

	<?php echo $input_user_id; ?>
	
	<div class="element-form">
			<span><input type="submit" name="submit" value="<?php echo ($user_id) ?  "Update" : "Simpan"; ?>"></span>
	</div>

</form>