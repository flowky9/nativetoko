<?php 

	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$value = "";
	$status = "";
	$input_kategori_id = "";

	if($kategori_id){
		$input_kategori_id = "<input type='hidden' name='kategori_id' value='$kategori_id'> ";
		$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id = $kategori_id");

		if(mysqli_num_rows($query) == 1){
			$row = mysqli_fetch_assoc($query);

			$value = "value='$row[kategori]'";
			$status = $row['status'];	
		}
	}

 ?>

<form action="<?php echo BASE_URL."module/kategori/action.php" ?>" method="post">
	<div class="element-form">
			<label>Nama Kategori</label>
			<span><input type="text" name="kategori" <?php echo $value; ?>></span>
	</div>
	<div class="element-form">
			<label>Status</label>
			<span>
					<input type="radio" name="status" value="on" <?php if($status == "on") echo "checked=true" ?> >On &nbsp;
					<input type="radio" name="status" value="off" <?php if($status == "off") echo "checked=true" ?>>Off &nbsp;
			</span>
	</div>

	<?php echo $input_kategori_id; ?>
	
	<div class="element-form">
			<span><input type="submit" name="submit" value="<?php echo ($kategori_id) ?  "Update" : "Simpan"; ?>"></span>
	</div>

</form>