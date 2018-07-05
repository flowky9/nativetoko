<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");


$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$status = $_POST['status'];
$submit = $_POST['submit'];
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : false;



if($submit == "Update"){
	$query = mysqli_query($koneksi, "UPDATE user SET user = '$user' , status = '$status' WHERE user_id = $user_id ");
}else if($submit == "Simpan") {
	$query = mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$level',
																'$nama','$email',
																'$alamat','$phone',
																'$password','$status')");
}

if($query){
	header("location:".BASE_URL."index.php?page=my_profile&module=user&action=list");
}else {
	echo "gagal";
	echo $submit. $status. $user.$user_id;
}



 ?>