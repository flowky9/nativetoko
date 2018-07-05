<div id="frame-tambah">
	<a style="pointer-events:none;cursor:default;" href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form" ?>" class="tombol-action">+ Tambah kota</a>
</div>

<?php 

	$query = mysqli_query($koneksi, "SELECT * FROM kota");

	if(mysqli_num_rows($query)>0){
		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Kota</th>
				<th class='kiri'>Tarif</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			</tr>
			";

		$no = 1;

		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>
					<td class='kolom-nomor'>".$no++."</td>
					<td class='kiri'>$row[kota]</td>
					<td class='kiri'>$row[tarif]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]'>Edit</a>
						<a class='tombol-action' href='".BASE_URL."module/kota/delete.php?kota_id=$row[kota_id]'>Delete</a>
					</td>


				";
		}

		echo "</table>";

	}else {
		echo "<p>Saat ini belum ada kota</p>";
	}


 ?>