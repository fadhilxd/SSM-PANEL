<?php
if(isset($_POST['deposit'])) {
	$post_sistem = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['sistem'],ENT_QUOTES)))));
	$post_method = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['method'],ENT_QUOTES)))));
	$post_quantity = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['quantity'],ENT_QUOTES)))));
	$post_pengirim = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['sending'],ENT_QUOTES)))));
	$post_code = "AG-".random(5)."";
	$post_unik = rand(1,99);
	$post_unik2 = rand(1,99);
	$post_unik3 = rand(1,99);
	$post_unik4 = rand(1,99);
	 
	$query_depo = $tur->query("SELECT * FROM deposit_method WHERE name = '$post_method'");
	$data_depo = mysqli_fetch_assoc($query_depo);
	$note = $data_depo['note'];
	$rate = $data_depo['rate'] / 1;
	$price = $rate*$post_quantity;

	$qcheckd= $tur->query("SELECT * FROM deposits WHERE username = '$sess_username' AND status = 'Pending'");
	$countd = mysqli_num_rows($qcheckd);
	 
	$getbalance = $price+$post_unik+$post_unik2+$post_unik3+$post_unik4;
	$getbalance1 = $post_quantity+$post_unik+$post_unik2+$post_unik3+$post_unik4;
	 
	if(preg_match("/./", $post_quantity)) {
		$post_quantity = str_replace(".","", $post_quantity);
	}
	 
	 
	if(empty($post_method) || empty($post_quantity) || empty($post_sistem)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Input.";
	} else if($post_quantity < 5000) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Minimal Deposit Adalah 5000.";
	} else if ($countd >= 1) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Kamu Masih Memiliki Permintaan Deposit Yang Berstatus Pending, Segera Selesaikan Pembayaran!.";
	} else {
		if ($post_method == "BCA") {
			$insert_depo = $tur->query("INSERT INTO deposits (code, username, pengirim, note, method, sistem, quantity, unik, balance, status, place_from, date) VALUES ('$post_code', '$sess_username', '$no_pengirim_pulsa', '$note', '$post_method', '$post_sistem', '$getbalance1', '$post_unik'+'$post_unik2'+'$post_unik3'+'$post_unik4', '$getbalance', 'Pending', 'WEB', '$date')");
			$insert_depo = $tur->query("INSERT INTO catatan (username, note, waktu) VALUES ('$sess_username', 'Kamu telah melakukan aktifitas Deposit $getbalance', '$date $time')");
			if($insert_depo == TRUE) {
				$msg_type = "success";
				$msg_content = "<b>Berhasil:</b> Permintaan Deposit Berhasil.<br />Metode Pembayaran: ".$data_depo['name']." ($post_sistem)<br />Silahkan Transfer ke: <b>".$data_depo['note']."</b> dengan jumlah ".number_format($getbalance1,0,',','.')." Dan anda akan mendapatkan saldo ".number_format($getbalance,0,',','.');
			} else {
				$msg_type = 'error';
				$msg_content = "<b>Gagal</b><br>Error System";
			}
		} else {
			$insert_depo = $tur->query("INSERT INTO deposits (code, username, pengirim, note, method, sistem, quantity, unik, balance, status, place_from, date) VALUES ('$post_code', '$sess_username', '$post_pengirim', '$note', '$post_method', '$post_sistem', '$post_quantity', '$post_unik'+'$post_unik2'+'$post_unik3'+'$post_unik4', '$price', 'Pending', 'WEB', '$date')");
			$insert_depo = $tur->query("INSERT INTO catatan (username, note, waktu) VALUES ('$sess_username', 'Kamu telah melakukan aktifitas Deposit $price', '$date $time')");
			if($insert_depo == TRUE) {
				$msg_type = "success";
				$msg_content = "<b>Berhasil:</b> Permintaan Deposit Berhasil.<br />Metode Pembayaran: ".$data_depo['name']." ($post_sistem)<br />Silahkan Transfer ke: <b>".$data_depo['note']."</b> dengan jumlah ".number_format($post_quantity,0,',','.')." Dan anda akan mendapatkan saldo ".number_format($price,0,',','.');
			} else {
				$msg_type = 'error';
				$msg_content = "<b>Gagal</b><br>Error System";
			}
		}
	}
}
?>
               <div class="row">
                    <div class="col-md-7">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6 class=" mt-0"><i class="dripicons-wallet"></i>	Deposit Saldo </h6>
                                <hr>
										<?php 
										if ($msg_type == "success") {
										?>
										<div class="alert bg-success text-white">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-check-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										} else if ($msg_type == "error") {
										?>
										<div class="alert bg-danger text-white">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group row">
												<label class="col-md-2 control-label">Tipe Pembayaran</label>
												<div class="col-md-10">
													<select class="form-control" name="sistem" id="sistem">
														<option value="0">Pilih salah satu...</option>
														<option value="Auto">Pulsa</option>
														<option value="Manual">Bank</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Provider Pembayaran</label>
												<div class="col-md-10">
													<select class="form-control" name="method" id="method">
														<option value="0">Pilih Tipe Pembayaran Terlebih Dahulu</option>
													</select>
												</div>
											</div>
											<div id="note">
											</div>
											<div class="form-group row">
									 	<div class="col-md-6 mb-2">
									        <label>Jumlah</label>
									        <input type="number" name="quantity" class="form-control" placeholder="Jumlah" onkeyup="get_total(this.value).value;">
									    </div>
									    <input type="hidden" id="rate" value="0">
										<div class="col-md-6 mb-2">
									        <label>Saldo yang Di Dapat</label>
									        <div class="input-group">
									            <div class="input-group-prepend">
									                <span class="input-group-text">Rp</span>
									            </div>
									        	<input type="number" class="form-control" id="total" readonly>
									        </div>
									    </div>
									</div>
									
									<div class="form-group text-right row m-t-20">
										<div class="col-12">
											<button class="btn btn-danger btn-bordred waves-effect waves-light m-b-30" type="reset"><i class="mdi mdi-history"></i> Reset</button>
											<button class="btn btn-primary btn-bordred waves-effect waves-light m-b-30" type="submit" name="deposit"><i class="mdi mdi-wallet"></i> Submit Deposit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
                    </div> <!-- end col -->
                            <div class="col-md-5">
                        <div class="card shadow">
                            <div class="card-body"> 
                            <h4 class="m-t-0 header-title"><b><i class="fa fa-bullhorn"></i>	Informasi Cara Deposit</b></h4>
                            <br />
<b>Langkah-langkah membuat permintaan deposit via transfer Bank:</b>
<ul>
<li>Pilih Tipe Pembayaran: Bank.</li>
<li>Pilih salah satu Metode Deposit.</li>
<li>Untuk permintaan deposit via transfer Bank, akan di komfirmasi manual oleh admin</li>
<li>Masukkan nominal deposit, Klik Submit untuk membuat permintaan deposit.</li>
<li>Silahkan konfirmasi ke Admin dengan menyertakan (ID DEPOSIT & BUKTI TRANSFER).</li>
<li>(<a href="?<?php echo md5("topup"); ?>=<?php echo base64_encode("riwayat-deposit"); ?>">CEK ID DEPOSIT</a>). (<a href="<?php echo $admindepo['wa1']; ?>">HUB ADMIN</a>)</li>
</ul>
<b>Langkah-langkah membuat permintaan deposit via transfer Pulsa:</b>
<ul>
<li>Pilih Tipe Pembayaran: Pulsa.</li>
<li>Pilih salah satu Metode Deposit.</li>
<li>Masukkan Nomor HP yang digunakan untuk transfer pulsa, gunakan awalan kode 62 bukan 0 (Contoh: 6281311020950).</li>
<li>Masukkan Jumlah Deposit yang diinginkan, Jumlah Saldo yang didapat akan ditampilkan.</li>
<li>Klik Submit untuk membuat permintaan deposit.</li>
<li>Silahkan transfer pulsa sesuai nominal yang diberikan ke nomor HP yang ditampilkan setelah Submit.</li>
</ul>
<b>Ketentuan membuat pesanan baru:</b>
<ul>
<li>Silahkan membuat permintaan deposit sesuai langkah-langkah diatas.</li>
<li>Setiap pengguna hanya dapat memiliki maksimal 3 permintaan deposit berstatus <span class="badge badge-warning">Pending</span>.</li>
<li>Jika permintaan deposit tidak dibayar lebih dari 3 jam, maka status permintaan deposit akan menjadi <span class="badge badge-danger">Canceled</span> (Dibatalkan).</li>
<li>Jika terjadi kesalahan / mendapatkan pesan gagal yang kurang jelas, silahkan hubungi Admin untuk informasi lebih lanjut.</li>
</ul>
</div>
</div>
</div>
</div>           
            </div> <!-- end container -->
        </div> <!-- end wrapper -->

						<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
	$("#sistem").change(function() {
		var sistem = $("#sistem").val();
		$.ajax({
			url: '<?php echo $config['url_web']; ?>config/inc/deposit_sistem.php',
			data: 'sistem=' + sistem,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#method").html(msg);
			}
		});
	});
	$("#method").change(function() {
		var method = $("#method").val();
		$.ajax({
			url: '<?php echo $config['url_web']; ?>config/inc/deposit_rate.php',
			data: 'method=' + method,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#rate").val(msg);
			}
		});
		$.ajax({
			url: '<?php echo $config['url_web']; ?>config/inc/deposit.php',
			data: 'method=' + method,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#note").html(msg);
			}
		});
	});
});

function get_total(quantity) {
	var rate = $("#rate").val();
	var result = eval(quantity) * rate;
	$('#total').val(result);
}
	</script>