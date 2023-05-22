<?php
date_default_timezone_set('Asia/Jakarta');

$date = date("Y-m-d");
$time = date("H:i:s");

//database
$sqli = array(
	"host" => "localhost", // Host
	"user" => "insidewe_smm", // Username Database
	"pass" => "bukan12@#", // Password Database
	"name" => "insidewe_smm" // Nama Database
    );
$tur = mysqli_connect($sqli['host'], $sqli['user'], $sqli['pass'], $sqli['name']);
if(!$tur) {
	die("Koneksi Gagal : ".mysqli_connect_error());
	}
?>