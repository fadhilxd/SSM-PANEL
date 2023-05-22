<?php

//Pengaturan Website
$kontak = array(
	"wa" => "https://wa.me/628", // WhatsApp Kamu
	"fb" => "https://m.facebook.com/profile.php?id=1000&fref=nf", // URL Facebook Kamu
   );    
$config = array(
	"mt" => 0, // Maintenance? 1 = ya , 0 = tidak
	"url_web" => "https://insi.my.id/", // URL/Link Website
	"nama_web" => "Demo Web", // Nama Website
	"tentang_web" => "Demo Web adalah sebuah platform bisnis yang menyediakan berbagai layanan social media marketing yang bergerak terutama di Indonesia. Dengan bergabung bersama kami, Anda dapat menjadi penyedia jasa social media atau reseller social media seperti jasa penambah Followers, Likes, dll. Saat ini tersedia berbagai layanan untuk social media terpopuler seperti Instagram, Facebook, Twitter, Youtube, dll." // Tentang/Deskripsi Website
    );
$min_transfer = 5000; //Jumlah Minimal Transfer Saldo
$min_saldo = 10000;

function random($length) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

function random_number($length) {
	$str = "";
	$characters = array_merge(range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}
?>