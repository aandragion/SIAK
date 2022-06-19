<?php
//KONVERSI PHP KE PHP 7
//require_once "parser-php-version.php";
$con = mysqli_connect('localhost', 'root', '', 'pmbpolimercia');
if(!$con){
	die("Koneksi Tidak Berhasil: " .mysqli_connect_error());
}
?>