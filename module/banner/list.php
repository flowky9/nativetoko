<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=form" ?>" class="tombol-action">+ Tambah Banner</a>
</div>

<?php 

	$query = mysqli_query($koneksi, "SELECT * FROM banner");

	if(mysqli_num_rows($query)>0){
		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Banner</th>
				<th class='kiri'>Gambar</th>
				<th class='kiri'>Link</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			</tr>
			";

		$no = 1;

		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>
					<td class='kolom-nomor'>".$no++."</td>
					<td class='kiri'>$row[banner]</td>
					<td class='kiri'><img height='40' src='".BASE_URL."images/slide/$row[gambar]'></td>
					<td class='kiri'>".$row['link']."</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$row[banner_id]'>Edit</a>
						<a class='tombol-action' href='".BASE_URL."module/banner/delete.php?banner_id=$row[banner_id]'>Delete</a>
					</td>


				";
		}

		echo "</table>";

	}else {
		echo "<p>Saat ini belum ada banner</p>";
	}


 ?>