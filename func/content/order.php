<?php
if (isset($_POST['order'])) {

	$post_service = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['service'],ENT_QUOTES)))));
	$post_quantity = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['quantity'],ENT_QUOTES)))));
	$post_link = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['link'],ENT_QUOTES)))));

	$check_service = $tur->query("SELECT * FROM services WHERE sid = '$post_service' AND status = 'Active'");
	$data_service = mysqli_fetch_assoc($check_service);

	$check_orders = $tur->query("SELECT * FROM orders WHERE link = '$post_link' AND status IN ('Pending','Processing')");
	$data_orders = mysqli_fetch_assoc($check_orders);
	$rate = $data_service['price'] / 1000;
	$price = $rate*$post_quantity;
	$oid = rand(10000,99999);
	$service = $data_service['service'];
	$provider = $data_service['provider'];
	$pid = $data_service['pid'];

	$check_provider = $tur->query("SELECT * FROM provider WHERE code = '$provider'");
	$data_provider = mysqli_fetch_assoc($check_provider);

	if (empty($post_service) || empty($post_link) || empty($post_quantity)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Semua Input.";
	} else if (mysqli_num_rows($check_service) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Layanan Tidak Ditemukan.";
	} else if (mysqli_num_rows($check_provider) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Maintenance.";
	} else if ($post_quantity < $data_service['min']) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Jumlah Minimal Tidak Sesuai.";
	} else if ($post_quantity > $data_service['max']) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Jumlah Maksimal Tidak Sesuai.";
	} else if ($data_user['balance'] < $price) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Saldo Kamu Tidak Mencukupi.";
	} else {
		// api data
		$api_link = $data_provider['link'];
		$api_key = $data_provider['api_key'];
		// end api data

		if ($provider == "MANUAL") {
			$api_postdata = "";
			$poid = $oid;
		} else if ($provider == "IRVANKEDE") {
			$postdata = "api_id=6320&api_key=0619a7-fb39c7-4391bb-fce1c0-06d16a&service=$pid&target=$post_link&quantity=$post_quantity";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://irvankede-smm.co.id/api/order");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$chresult = curl_exec($ch);
			curl_close($ch);
			$json_result = json_decode($chresult);
		} else {
			die("System Error!");
		}

			if ($provider == "IRVANKEDE" AND $json_result->status == false) {
				$msg_type = "error";
				$msg_content = "<b>Gagal</b><br>".$json_result->data;
			} else {
				if ($provider == "IRVANKEDE") {
					$poid = $json_result->data->id;
				}
					$update_user = $tur->query("UPDATE users SET balance = balance-$price WHERE username = '$sess_username'");
					$update_user = $tur->query("INSERT INTO catatan (username, note, waktu) VALUES ('$sess_username', 'Kamu telah melakukan aktifitas Order $service', '$date $time')");
				if ($update_user == TRUE) {
					$insert_order = $tur->query("INSERT INTO orders (oid, poid, user, service, link, quantity, remains, start_count, price, status, date, provider, place_from) VALUES ('$oid', '$poid', '$sess_username', '$service', '$post_link', '$post_quantity', '0', '0', '$price', 'Pending', '$date', '$provider', 'WEB')");
				if ($insert_order == TRUE) {
					$msg_type = "success";
					$msg_content = "<b>Berhasil</b><br /><b>Pesan Telah Diterima</b><br /><b>ID Pesanan:</b> $oid<br /><b>Layanan:</b> $service<br /><b>Link:</b> $post_link<br /><b>Jumlah:</b> ".number_format($post_quantity,0,',','.')."<br /><b>Biaya:</b> Rp ".number_format($price,0,',','.');
				} else {
					$msg_type = 'error';
					$msg_content = "<b>Gagal</b><br>Error System";
				}
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
                                <h6 class="mt-0"><i class="fa fa-cart-plus"></i>	Pemesanan Baru</h6>
                                <hr>
                                <div class="text-right"><span class="badge badge-primary p-2 ">Saldo Anda : Rp <?php echo number_format($data_user['balance'],0,',','.'); ?></span></div>
                                <br />
										<?php 
										if ($msg_type == 'success') {
										?>
										<div class="alert bg-success text-white">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-check-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										} else if ($msg_type == 'error') {
										?>
										<div class="alert bg-danger text-white">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class=""></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
									<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md form-label">Kategori</label>
												<div class="col-mb-3">
													<select class="form-control" id="category">
														<option value="0">Pilih salah satu...</option>
														<?php
														$check_cat = $tur->query("SELECT * FROM service_cat ORDER BY name ASC");
														while ($data_cat = mysqli_fetch_assoc($check_cat)) {
														?>
														<option value="<?php echo $data_cat['code']; ?>"><?php echo $data_cat['name']; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md form-label">Layanan</label>
												<div class="col-mb-3">
													<select class="form-control" name="service" id="service">
														<option value="0">Pilih Kategori Terlebih Dahulu</option>
													</select>
												</div>
											</div>
											<div id="note">
											</div>
											<div class="form-group">
												<label class="col-md form-label">Target</label>
												<div class="col-mb-3">
													<input type="text" name="link" class="form-control" placeholder="Masukan Username Target / Link Target">
												</div>
											</div>
											
											<div id="show1">
										<div class="form-group row">
										    <div class="col-md-6 mb-2">
									            <label class="col-form-label">Jumlah Pesanan</label>
									            <input type="number" name="quantity" class="form-control" placeholder="Jumlah" onkeyup="get_total(this.value).value;">
									        </div>
									        <input type="hidden" id="rate" value="0">
										    <div class="col-md-6 mb-2">
									            <label class="col-form-label">Total Harga</label>
									                <div class="input-group">
									                    <div class="input-group-prepend">
									                        <span class="input-group-text">Rp</span>
									                    </div>
									                    <input type="number" class="form-control" id="total" readonly>
									                </div>
									        </div>
									    </div>
									</div>										
											<div class="pull-right">
											<button type="submit" class="btn btn-primary waves-effect w-md waves-light" name="order"><i class="mdi mdi-cart"></i>	Buat Pesanan</button>
											<button type="reset" class="btn btn-danger waves-effect w-md waves-light"><i class="mdi mdi-history"></i>	Ulangi</button>
											</div> 
										</form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                            <div class="col-md-5">
                        <div class="card shadow">
                                    <div class="card-body">
                                        <h4 class="m-t-0 header-title"><b><i class="fa fa-bullhorn"></i>	Informasi Cara Pemesanan</b></h4>
                                        <br />
                            <h5>Langkah-langkah membuat pesanan baru:</h5>
										<ul>
											<li>Pilih salah satu Kategori.</li>
											<li>Pilih salah satu Layanan yang ingin dipesan.</li>
											<li>Masukkan Target pesanan sesuai ketentuan yang diberikan layanan tersebut.</li>
											<li>Masukkan Jumlah Pesanan yang diinginkan.</li>
											<li>Klik Submit untuk membuat pesanan baru.</li>
										</ul>
										<h5>Ketentuan membuat pesanan baru:</h5>
										<ul>
											<li>Silahkan membuat pesanan sesuai langkah-langkah diatas.</li>
											<li>Jika ingin membuat pesanan dengan Target yang sama dengan pesanan yang sudah pernah dipesan sebelumnya, mohon menunggu sampai pesanan sebelumnya selesai diproses.</li>
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
	$("#category").change(function() {
		var category = $("#category").val();
		$.ajax({
			url: '<?php echo $config['url_web']; ?>config/inc/order_service.php',
			data: 'category=' + category,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#service").html(msg);
			}
		});
	});
	$("#service").change(function() {
		var service = $("#service").val();
		$.ajax({
			url: '<?php echo $config['url_web']; ?>config/inc/order_note.php',
			data: 'service=' + service,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#note").html(msg);
			}
		});
		$.ajax({
			url: '<?php echo $config['url_web']; ?>config/inc/order_rate.php',
			data: 'service=' + service,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#rate").val(msg);
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