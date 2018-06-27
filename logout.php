<?php 

session_start();
include_once("function/helper.php");

unset($_SESSION['user_id']);
unset($_SESSION['nama']);
unset($_SESSION['level']);

header("location:".BASE_URL);


 ?>