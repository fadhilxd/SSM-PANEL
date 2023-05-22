<?php 
// Code By Muhammad Fahturrozi 
/* No Delete Nama Pembuat Code */
#`{{ Hargai Karya Orang Lain, Jika Kalian Ingin Di Hargai
#`{{ Terima Kasih, Atas Pengertiannya
require_once("../config/config.php");
require_once("../config/setting.php"); ;
            
	$url = "https://irvankede-smm.co.id/api/services";
	$apinya = "0619a7-fb39c7-4391bb-fce1c0-06d16a";
	$apiidnya = "6320";

	$postdata = "api_id=$apiidnya&api_key=$apinya";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($ch);
	//echo $result;
	$olah = json_decode($result, true);

	$no = 0;
		while($no < count($olah['data'])){ 
		$category = $olah['data'][$no]['category'];
		$kode = $olah['data'][$no]['id'];
		$service = $olah['data'][$no]['name'];
		$min = $olah['data'][$no]['min'];
 		$max = $olah['data'][$no]['max'];
		$price = $olah['data'][$no]['price'];
		$note = $olah['data'][$no]['note'];

		$rate = 1000; //TAMBAH HARGA BIAR UNTUNG
		$totaly = $rate+$price;

		$cek_service = mysqli_query($tur, "SELECT * FROM services WHERE sid = '$kode'");

		if (mysqli_num_rows($cek_service) > 0) {
			echo "Service $service => sudah ada<br>";
			$no++;
		} else {
			$input = mysqli_query($tur, "INSERT INTO services (sid, category, service, note, min, max, price, status, pid, provider) VALUES ('$kode', '$category', '$service', '$note', '$min', '$max', '$totaly', 'Active', '$kode', 'IRVANKEDE')");
			if ($input){
				echo "===============<br>Successfully Adding Services<br>Category: $category<br>Service: $service<br>Price: $totaly (+$rate)<br>Min: $min<br>Max: $max<br>Note: $note<br>Status: Active<br>===============<br>";
				$no++;
			}else{
				echo mysqli_error();
			}
				$no++;
		}
	}
?>