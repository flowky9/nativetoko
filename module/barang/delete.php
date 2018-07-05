<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

$querybarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id = $barang_id");
$getbarang   = mysqli_fetch_assoc($querybarang);
$gambar      = "../../images/barang/".$getbarang['gambar'];

$query = mysqli_query($koneksi,"DELETE FROM barang WHERE barang_id = $barang_id");

if($query){
	if(file_exists($gambar)){
		unlink($gambar);
	}

	header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
}

 ?>