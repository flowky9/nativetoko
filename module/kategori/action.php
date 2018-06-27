<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");


$kategori = $_POST['kategori'];
$status = $_POST['status'];
$submit = $_POST['submit'];
$kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : false;



if($submit == "Update"){
	$query = mysqli_query($koneksi, "UPDATE kategori SET kategori = '$kategori' , status = '$status' WHERE kategori_id = $kategori_id ");
}else if($submit == "Simpan") {
	$query = mysqli_query($koneksi, "INSERT INTO kategori VALUES ('','$kategori','$status')");
}

if($query){
	header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
}else {
	echo "gagal";
	echo $submit. $status. $kategori.$kategori_id;
}



 ?>