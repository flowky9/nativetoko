<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$query = mysqli_query($koneksi,"DELETE FROM kategori WHERE kategori_id = $kategori_id");

if($query){
	header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
}

 ?>