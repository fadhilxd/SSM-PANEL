 <?php

if (isset($_POST['ubah'])) {
	$set_api_key = random(20);
	$update_user = $tur->query("UPDATE users SET api_key = '$set_api_key' WHERE username = '$sess_username'");
	if ($update_user == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b><br> API Key Telah Diubah.";
	} else {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Error System 
.";
	}
}
$sess_username = $_SESSION['user']['username'];	$check_user = $tur->query("SELECT * FROM users WHERE username = '$sess_username'");
$data_user = mysqli_fetch_assoc($check_user);
?>
                <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
                       <div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4 class="mt-0 mb-3 header-title"><i class="dripicons-feed"></i> API Dokumentasi</h4>
            	<div class="table-responsive">
	                <table class="table table-bordered">
	                    <tr>
	                        <th>METODE HTTP</th>
	                        <td>POST</td>
	                    </tr>
	                    <tr>
	                    <th>API URL</th>
	                        <td><?php echo $config['url_web']; ?>api/</td>
	                    </tr>
	                      <tr>
	                    <th>API KEY</th>
	                        <td><input type="text" class="form-control" value="<?php echo $data_user['api_key']; ?>" readonly></td>
	                    </tr>
	                    
	                    <tr>
	                        <th>RESPONE FORMAT</th>
	                        <td>JSON</td>
	                    </tr>
	                </table>
            	</div>
            	<br />
	            <ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#service" data-toggle="tab" aria-expanded="false" class="nav-link active">
						<i class="dripicons-stack"></i> Layanan
						</a>
					</li>
					<li class="nav-item">
						<a href="#order" data-toggle="tab" aria-expanded="false" class="nav-link">
						<i class="dripicons-cart"></i> Pemesanan
						</a>
					</li>
					<li class="nav-item">
						<a href="#statusnya" data-toggle="tab" aria-expanded="false" class="nav-link">
						<i class="dripicons-document-edit"></i> Status Pesanan
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane show active" id="service">
					<br />
					<b>URL Permintaan</b>
					<br />
					    <div class="alert alert-primary">
	                            <p class="card-text"><?php echo $config['url_web']; ?>api/json</p>
	                    </div>
					<b>Parameter</b>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th>Parameter</th>
									<th>Deskripsi</th>
								</tr>
								<tr>
									<td>api_key</td>
									<td>API KEY Anda</td>
								</tr>
								<tr>
									<td>action</td>
									<td>layanan</td>
								</tr>
							</table>
						</div>
					<b>Contoh Respon</b>
						<div class="alert alert-primary">
						<b>Jika Sukses Mendapatkan Data Layanannya</b>
<pre>
	{
	"data": {
		"sid": "1"
		"kategori": " Instagram Followers No Refill/Not Guaranteed"
		"layanan": "Instagram Followers "
		"min": "100"
		"max": "5000"
		"harga": "8919"
		"catatan": "Tronjal Tronjol Maha Asyik"
		}
	}
</pre>
						<b>Jika Gagal Mendapatkan Data Layanannya</b>
<pre>
	{
		"status": false,
		"data": {
		"pesan": "Permintaan Tidak Sesuai"
			}
	}
</pre>
						</div>
					</div>
					<div class="tab-pane" id="order">
					<br />
					<b>URL Permintaan</b>
						<div class="alert alert-primary">
	                            <p class="card-text"><?php echo $config['url_web']; ?>api/json</p>
	                    </div>
					<b>Parameter</b>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th>Parameter</th>
									<th>Deskripsi</th>
								</tr>
								<tr>
									<td>api_key</td>
									<td>API KEY Anda</td>
								</tr>
								<tr>
									<td>action</td>
									<td>pemesanan</td>
								</tr>
								<tr>
									<td>layanan</td>
									<td>Service ID lihat di <a href="<?php echo $config['url_web']; ?>?<?php echo paramEncrypt('content=harga')?>">Daftar Layanan</a></td>
								</tr>
								<tr>
									<td>target</td>
									<td>Target / Link</td>
								</tr>
								<tr>
									<td>jumlah</td>
									<td>Jumlah Pemesanan</td>
								</tr>
								<tr>
									<td>Contoh Kode PHP</td>
									<td><a href="<?php echo $config['url_web']; ?>api/api_order.txt" target="blank">Contoh</a></td>	
								</tr>
							</table>
						</div>
					<!-- batas -->
					<b>Contoh Respon</b>
						<div class="alert alert-primary">
						<b>Jika Pemesanan Sukses</b>
<pre>
	{
	"data": {
		"id": "12345",
		"start_count": "1544"
		}
	}
</pre>
						<b>Jika Pemesanan Gagal</b>
<pre>
	{
	"status": false,
	"data": {
	"pesan": "Permintaan Tidak Sesuai"
		}
	}
</pre>
						</div>
					</div>
					<div class="tab-pane" id="statusnya">
					<br />
					<b>URL Permintaan</b>
						<div class="alert alert-primary">
	                            <p class="card-text"><?php echo $config['url_web']; ?>api/json</p>
	                    </div>
					<b>Parameter</b>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th>Parameter</th>
									<th>Deskripsi</th>
								</tr>
								<tr>
									<td>api_key</td>
									<td>API KEY Anda.</td>
								</tr>
								<tr>
									<td>action</td>
									<td>status</td>
								</tr>
								<tr>
									<td>id</td>
									<td>ID Pesanan.</td>
								</tr>
								<tr>
									<td>Contoh Kode PHP</td>
									<td><a href="<?php echo $config['url_web']; ?>api/api_status.txt" target="blank">Contoh</a></td>		
								</tr>
							</table>
						</div>
					<b>Status</b>
					<br />
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th>Status</th>
									<th>Deskripsi</th>
								</tr>
								<tr>
									<td>Pending</td>
									<td>Pesanan dalam antrian.</td>
								</tr>
								<tr>
									<td>Processing</td>
									<td>Pesanan sedang diproses.</td>
								</tr>
								<tr>
									<td>Partial</td>
									<td>Pesanan selesai diproses tetapi tidak sesuai jumlah pesan.</td>
								</tr>
								<tr>
									<td>Error</td>
									<td>Pesanan gagal diproses.</td>
								</tr>
								<tr>
									<td>Success</td>
									<td>Pesanan selesai dan berhasil.</td>
								</tr>
							</table>
						</div>
					<b>Contoh Respon</b>
						<div class="alert alert-primary">
						<b>Jika Respon Sukses</b>
<pre>
	{
	"data": {
		"id":"23",
		"start_count":"123",
		"status":"Success",
		"remains":"0"
		}
	}
</pre>
						<b>Jika Respon Gagal</b>
<pre>
	{
	"status": false,
	"data": {
	"pesan": "Permintaan Tidak Sesuai"
	}
}
</pre>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
                            <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->

       