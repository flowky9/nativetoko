<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : false;

$querybanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id = $banner_id");
$getbanner   = mysqli_fetch_assoc($querybanner);
$gambar      = "../../images/slide/".$getbanner['gambar'];

$query = mysqli_query($koneksi,"DELETE FROM banner WHERE banner_id = $banner_id");

if($query){
	if(file_exists($gambar)){
		unlink($gambar);
	}

	header("location:".BASE_URL."index.php?page=my_profile&module=banner&action=list");
}

 ?>