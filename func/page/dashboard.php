 <?php
$check_total_user = $tur->query("SELECT * FROM users");
	$total_user = mysqli_num_rows($check_total_user);
	$check_total_order = $tur->query("SELECT SUM(price) AS total FROM orders");
	$check_total_order_pulsa = $tur->query("SELECT SUM(price) AS total FROM orders_pulsa");
	$total_order = mysqli_fetch_assoc($check_total_order);
	$total_order_pulsa = mysqli_fetch_assoc($check_total_order_pulsa);
	$total_semua_order = $total_order['total']+$total_order_pulsa['total'];
	$check_layanan = $tur->query("SELECT * FROM services");
	$check_layanan_pulsa = $tur->query("SELECT * FROM services_pulsa");
	$total_layanan = mysqli_num_rows($check_layanan);
	$total_layanan_pulsa = mysqli_num_rows($check_layanan_pulsa);
	$total_semua_layanan = $total_layanan+$total_layanan_pulsa;
?>      
      <div class="row">
                            <div class="col-lg-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center" style="margin: 30px 0 30px 0;">
                                <h2><?php echo $config['nama_web']; ?></h2>
                                <p style="font-size: 15px;"> adalah sebuah platform bisnis yang menyediakan berbagai layanan social media marketing atau yang biasa disebut SMM PANEL bergerak terutama di Indonesia.<br />
Dengan bergabung bersama kami, Anda dapat menjadi penyedia jasa social media atau reseller social media seperti jasa penambah Followers, Likes, dll. <br />
Saat ini tersedia berbagai layanan untuk social media terpopuler seperti Instagram, Facebook, Twitter, Youtube, dll.<br />
Ayo tunggu apalagi silahkan daftar SMM PANEL termurah ini. </p>
                                <a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("masuk"); ?>" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-login"></i> Masuk</a> 
                                <a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("reg"); ?>" class="btn btn-danger"><i class="mdi mdi-account-plus"></i> Daftar</a>
    
                            </div>
                        </div>
                        <br>
	<div class="row">
		<div class="col-lg-4 m-t-5 ">
			<div class="card blue-bg p-lg text-center">
				<div class="card-body">
					<i class="dripicons-thumbs-up" style="font-size: 4em"></i>
					<h3 class="font-bold" style="margin: 10px 0 5px 0;">Layanan Terbaik</h3>
					<small>Kami menyediakan berbagai layanan terbaik untuk kebutuhan sosial media Anda.</small>
				</div>
			</div> 

		</div>
		<div class="col-lg-4 m-t-5 ">
			<div class="card blue-bg p-lg text-center">
				<div class="card-body">
					<i class="dripicons-headset" style="font-size: 4em"></i>
					<h3 class="font-bold" style="margin: 10px 0 5px 0;">Pelayanan Bantuan</h3>
					<small>Kami selalu siap membantu jika Anda membutuhkan kami dalam penggunaan layanan kami.</small>
				</div>
			</div>
		</div>
		<div class="col-lg-4 m-t-5 ">
			<div class="card blue-bg p-lg text-center">
				<div class="card-body">
					<i class="dripicons-monitor" style="font-size: 4em"></i>
					<h3 class="font-bold" style="margin: 10px 0 5px 0;">Desain Responsif</h3>
					<small>Kami menggunakan desain website yang dapat diakses dari berbagai <i>device</i>, baik smartphone maupun PC.</small>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 10px">
		<div class="col-lg-4 m-t-5 ">
			<div class="card blue-bg p-lg text-center">
				<div class="card-body">
					<i class="dripicons-scale" style="font-size: 4em"></i>
					<h3 class="font-bold" style="margin: 10px 0 5px 0;">Dukungan API</h3>
					<small>Kami memiliki Dukungan API Untuk pemilik panel sehingga Anda dapat menjual kembali layanan kami dengan mudah.</small>
				</div>
			</div>
		</div>
		<div class="col-lg-4 m-t-5  ">
			<div class="card blue-bg p-lg text-center">
				<div class="card-body">
					<i class="dripicons-cloud-upload" style="font-size: 4em"></i>
					<h3 class="font-bold" style="margin: 10px 0 5px 0;">Pembaruan</h3>
					<small>Layanan Selalu Diperbarui Agar lebih ditingkatkan dan memberi Anda pengalaman terbaik.</small>
				</div>
			</div>
		</div>
		<div class="col-lg-4 m-t-5 ">
			<div class="card blue-bg p-lg text-center">
				<div class="card-body">
					<i class="dripicons-cart" style="font-size: 4em"></i>
					<h3 class="font-bold" style="margin: 10px 0 5px 0;">Resellers</h3>
					<small>Anda dapat menjual kembali layanan kami dan menumbuhkan Profit Anda dengan mudah.</small>
				</div>
			</div>
		</div>
	</div>	
                        
                    </div><!-- end col -->
                </div>
                                <!-- end row -->
                            </div> <!-- end services -->
                            