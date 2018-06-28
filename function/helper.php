<?php 

// BASE URL PROJECT
define("BASE_URL","http://localhost/nativetoko/");

// kata acak
function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';

    for ($i = 0; $i < $panjang; $i++) {
	  	$pos = rand(0, strlen($karakter)-1);
	  	$string .= $karakter{$pos};
    }

    return $string;
}

// fungsi rupiah
function rupiah($nilai = 0)
{
    $string = "Rp " . number_format($nilai, 0, ",", ".");
    return $string;
}


 ?>