<?php 

include_once("function/helper.php");
include_once("function/koneksi.php");

$level = "customer";
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$status = "on";

// menampilkan data yang di input pada URL
$dataForm = http_build_query($_POST);

// validasi email
$queryEmail = mysqli_query($koneksi,"SELECT * FROM user WHERE email = '$email' ");


if(
		empty($nama_lengkap) OR empty($email) OR empty($phone) OR
		empty($alamat) OR empty($alamat) OR empty($password)
	){

	// melakukan unset password 
	unset($_POST['password']);
	unset($_POST['re_password']);

	header("location:".BASE_URL."index.php?page=register&notif=require&".$dataForm);
}else if($password != $re_password){
	header("location:".BASE_URL."index.php?page=register&notif=password&".$dataForm);
}else if(mysqli_num_rows($queryEmail) > 0){
	header("location:".BASE_URL."index.php?page=register&notif=email&".$dataForm);
}else {
	$password = md5($_POST['password']);
	$query = mysqli_query($koneksi, "INSERT INTO user
							VALUES ('','$level','$nama_lengkap','$email','$alamat','$phone','$password','$status')");
	if($query){
		header("location:".BASE_URL."index.php?page=login");
	}
}




 ?>