<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "nativetoko";

$koneksi = mysqli_connect($server,$username,$password,$database) OR die("Koneksi ke database gagal : ". mysqli_connect_error());

 ?>