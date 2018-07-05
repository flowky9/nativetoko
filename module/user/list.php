<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=form" ?>" class="tombol-action">+ Tambah User</a>
</div>

<?php 

	$query = mysqli_query($koneksi, "SELECT * FROM user");

	if(mysqli_num_rows($query)>0){
		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Nama</th>
				<th class='kiri'>Email</th>
				<th class='kiri'>Level</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			</tr>
			";

		$no = 1;

		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>
					<td class='kolom-nomor'>".$no++."</td>
					<td class='kiri'>$row[nama]</td>
					<td class='kiri'>$row[email]</td>
					<td class='kiri'>$row[level]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$row[user_id]'>Edit</a>
						<a class='tombol-action' href='".BASE_URL."module/user/delete.php?user_id=$row[user_id]'>Delete</a>
					</td>


				";
		}

		echo "</table>";

	}else {
		echo "<p>Saat ini belum ada user</p>";
	}


 ?>