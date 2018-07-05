<?php 

	$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : false;
	
	$banner = "";
	$link = "";
	$gambar = "";
	$status = "";
	$input_banner_id = "";

	if($banner_id){
		$input_banner_id = "<input type='hidden' name='banner_id' value='$banner_id'> ";
		$query = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id = $banner_id");

		if(mysqli_num_rows($query) == 1){
			$row = mysqli_fetch_assoc($query);

			$banner = "value='$row[banner]'";
			$link = "value='$row[link]'";
			$gambar = BASE_URL."images/slide/".$row['gambar'];
			$status = $row['status'];	
		}
	}

 ?>

<form action="<?php echo BASE_URL."module/banner/action.php" ?>" method="post" enctype="multipart/form-data">
	<div class="element-form">
			<label>Nama Banner</label>
			<span><input type="text" name="banner" <?php echo $banner; ?>></span>
	</div>
	
	<div class="element-form">
			<label>Link</label>
			<span><input type="text" name="link" <?php echo $link; ?>></span>
	</div>


	<div class="element-form">
			<label>Gambar</label>
			<span><input type="file" name="gambar" <?php echo $gambar; ?>></span>
			<img src="<?php echo $gambar; ?>" alt="" width="200" class="gambar-edit">
	</div>	

	<div class="element-form">
			<label>Status</label>
			<span>
					<input type="radio" name="status" value="on" <?php if($status == "on") echo "checked=true" ?> >On &nbsp;
					<input type="radio" name="status" value="off" <?php if($status == "off") echo "checked=true" ?>>Off &nbsp;
			</span>
	</div>
	
	<?php echo $input_banner_id; ?>

	<div class="element-form">
			<span><input type="submit" name="submit" value="<?php echo ($banner_id) ?  "Update" : "Simpan"; ?>"></span>
	</div>

</form>

