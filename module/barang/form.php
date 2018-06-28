<?php 

	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
	
	$barang = "";
	$kategori_id = "";
	$spesifikasi = "";
	$stok = "";
	$harga = "";
	$gambar = "";
	$status = "";
	$input_barang_id = "";

	if($barang_id){
		$input_barang_id = "<input type='hidden' name='barang_id' value='$barang_id'> ";
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id = $barang_id");

		if(mysqli_num_rows($query) == 1){
			$row = mysqli_fetch_assoc($query);

			$barang = "value='$row[nama_barang]'";
			$kategori_id = $row['kategori_id'];
			$spesifikasi = $row['spesifikasi'];
			$stok = "value='$row[stok]'";
			$harga = "value='$row[harga]'";
			$gambar = BASE_URL."images/barang/".$row['gambar'];
			$status = $row['status'];	
		}
	}

 ?>

<form action="<?php echo BASE_URL."module/barang/action.php" ?>" method="post" enctype="multipart/form-data">
	<div class="element-form">
			<label>Nama barang</label>
			<span><input type="text" name="nama_barang" <?php echo $barang; ?>></span>
	</div>

	<div class="element-form">
			<label>Kategori</label>
			<span>
				<select name="kategori_id" id="">
					<?php 

						$queryKategori = mysqli_query($koneksi, "SELECT kategori_id,kategori FROM kategori WHERE status = 'on' ORDER BY kategori ASC");

						while($row = mysqli_fetch_assoc($queryKategori)){
							$selected = "";

							if($kategori_id == $row['kategori_id']){
								$selected = "selected='selected'";
							}

							echo "<option value='$row[kategori_id]' $selected>$row[kategori]</option>";
						}

					 ?>
				</select>
			</span>
	</div>

	<div class="element-form">
			<label>Deskripsi Barang</label>
			<span><textarea name="spesifikasi" id="" <?php echo $spesifikasi; ?> rows="10"><?php echo $spesifikasi; ?></textarea></span>
	</div>
	
	<div class="element-form">
			<label>Stok</label>
			<span><input type="number" name="stok" <?php echo $stok; ?>></span>
	</div>

	<div class="element-form">
			<label>Harga</label>
			<span><input type="number" name="harga" <?php echo $harga; ?>></span>
	</div>

	<div class="element-form">
			<label>Gambar</label>
			<span><input type="file" name="gambar" <?php echo $gambar; ?>></span>
			<img src="<?php echo $gambar; ?>" alt="" width="150" class="gambar-edit">
	</div>	

	<div class="element-form">
			<label>Status</label>
			<span>
					<input type="radio" name="status" value="on" <?php if($status == "on") echo "checked=true" ?> >On &nbsp;
					<input type="radio" name="status" value="off" <?php if($status == "off") echo "checked=true" ?>>Off &nbsp;
			</span>
	</div>
	
	<?php echo $input_barang_id; ?>

	<div class="element-form">
			<span><input type="submit" name="submit" value="<?php echo ($barang_id) ?  "Update" : "Simpan"; ?>"></span>
	</div>

</form>