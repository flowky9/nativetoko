<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form" ?>" class="tombol-action">+ Tambah Kategori</a>
</div>

<?php 

	$query = mysqli_query($koneksi, "SELECT * FROM kategori");

	if(mysqli_num_rows($query)>0){
		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Kategori</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			</tr>
			";

		$no = 1;

		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>
					<td class='kolom-nomor'>".$no++."</td>
					<td class='kiri'>$row[kategori]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=kategori&action=delete&kategori_id=$row[kategori_id]'>Delete</a>
					</td>


				";
		}

		echo "</table>";

	}else {
		echo "<p>Saat ini belum ada kategori</p>";
	}


 ?>