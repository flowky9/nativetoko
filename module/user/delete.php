<?php 

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;

$query = mysqli_query($koneksi,"DELETE FROM user WHERE user_id = $user_id");

if($query){
	header("location:".BASE_URL."index.php?page=my_profile&module=user&action=list");
}

 ?>