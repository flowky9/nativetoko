<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$banner = $_POST['banner'];
$link = $_POST['link'];
$gambar = "";
$status = $_POST['status'];
$submit = $_POST['submit'];
$banner_id = isset($_POST['banner_id']) ? $_POST['banner_id'] : false;
$update_gambar = "";

if(!empty($_FILES['gambar']['name'])){

	// membuat nama file
	$nama_file = $_FILES['gambar']['name'];
	$data = explode(".", $nama_file);
	$nama_baru = sha1(acak(5));
	$file_baru = $nama_baru.".".$data[1];
	// melakukan upload file
	move_uploaded_file($_FILES['gambar']['tmp_name'], '../../images/slide/'.$file_baru);

	$update_gambar = ", gambar = '$file_baru' ";
}



if($submit == "Update"){
	$querybanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id = $banner_id");
	$getbanner   = mysqli_fetch_assoc($querybanner);
	$gambar      = "../../images/slide/".$getbanner['gambar'];

	$query = mysqli_query($koneksi, "UPDATE banner SET  banner = '$banner',
														link =  '$link',
														status = '$status'
														$update_gambar WHERE banner_id = $banner_id ");
	if($query){
		// menghapus gambar lama
		if(file_exists($gambar)){
			unlink($gambar);
		}
	}

}else if($submit == "Simpan") {
	$query = mysqli_query($koneksi, "INSERT INTO banner VALUES ('','$banner','$file_baru','$link','$status')");
}

if($query){
	header("location:".BASE_URL."index.php?page=my_profile&module=banner&action=list");
}else {
	die('Query Error : '. $update_gambar .mysqli_errno($koneksi). 
   ' - '.mysqli_error($koneksi));
	echo "gagal ".$update_gambar;
}



 ?>