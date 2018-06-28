<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$nama_barang = $_POST['nama_barang'];
$kategori_id = $_POST['kategori_id'];
$spesifikasi = $_POST['spesifikasi'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$status = $_POST['status'];
$submit = $_POST['submit'];
$barang_id = isset($_POST['barang_id']) ? $_POST['barang_id'] : false;

// membuat nama file
$nama_file = $_FILES['gambar']['name'];
$data = explode(".", $nama_file);
$nama_baru = sha1(acak(5));
$file_baru = $nama_baru.".".$data[1];
// melakukan upload file
move_uploaded_file($_FILES['gambar']['tmp_name'], '../../images/barang/'.$file_baru);



if($submit == "Update"){
	$query = mysqli_query($koneksi, "UPDATE kategori SET kategori = '$kategori' , status = '$status' WHERE kategori_id = $kategori_id ");
}else if($submit == "Simpan") {
	$query = mysqli_query($koneksi, "INSERT INTO barang VALUES ('','$kategori_id','$nama_barang','$spesifikasi','$file_baru',$harga,$stok,'$status')");
}

if($query){
	header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
}else {
	echo "gagal";
}



 ?>