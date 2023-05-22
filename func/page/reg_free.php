<?php
function dapetin($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        $data = curl_exec($ch);
        curl_close($ch);
                return json_decode($data, true);
}
if (isset($_SESSION['user'])) {
	header("Location: ".$config['url_web']);
} else {
if (isset($_POST['daftar'])) {
	$post_email = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['email'],ENT_QUOTES)))));
	$post_username = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES)))));
	$post_password = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['password'],ENT_QUOTES)))));
	$post_repeat_password = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['repassword'],ENT_QUOTES)))));
	$new_password = password_hash($post_password, PASSWORD_DEFAULT);

	$check_user = $tur->query("SELECT * FROM users WHERE username = '$post_username'");
	$check_email = $tur->query("SELECT * FROM users WHERE email = '$post_email'");

	if (empty($post_username) || empty($post_password) || empty($post_repeat_password) || empty($post_email)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Semua Input.";  
	} else if (mysqli_num_rows($check_user) > 0) {
		$msg_type = "error";
		$msg_content = "Gagal</b><br>Username Telah Terdaftar.";
	} else if (mysqli_num_rows($check_email) > 0) {
		$msg_type = "error";
		$msg_content = "Gagal</b><br>Email Telah Terdaftar.";
	} else if (strlen($post_username) > 15) {
		$msg_type = "error";
		$msg_content = "Gagal</b><br>Username Maksimal 15 Karakter.";
	} else if (strlen($post_password) > 15) {
		$msg_type = "error";
		$msg_content = "Gagal</b><br>Password Maksimal 15 Karakter.";
	} else if (strlen($post_username) < 5) {
		$msg_type = "error";
		$msg_content = "Gagal</b><br>Username Minimal 5 Karakter.";
	} else if (strlen($post_password) < 5) {
		$msg_type = "error";
		$msg_content = "Gagal</b><br>Password Minimal 5 Karakter.";
	} else if ($post_password <> $post_repeat_password) {
		$msg_type = "error";
		$msg_content = "Gagal</b><br>Konfirmasi Password Tidak Sesuai.";
	} else {		    
		$insert_user = $tur->query("INSERT INTO users (username, password, balance, level, registered, status, api_key, email, uplink) VALUES ('$post_username', '$new_password', '0', 'Member', '$date', 'Active', '$post_api', '$post_email', 'Server')");
			if ($insert_user == TRUE) {
				$msg_type = "success";
				$msg_content = "<b>Berhasil</b><br>Pendaftaran Berhasil. Anda Akan Dialihkan Ke Halaman Utama.<META HTTP-EQUIV=Refresh CONTENT=\"2; URL=/\">";
			} else {
				$msg_type = "error";
				$msg_content = "<b>Gagal:</b><br>Error System.";
			}
		}
	}
}
?>
                <div class="mb-2"></div><div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card shadow">
                            <div class="card-body">
                <h4 class="header-title">Daftar</h4>
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
											<i class=""></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
                                <form class="form-horizontal" method="POST">
                                     								<div class="form-group">
												<label>Nama Pengguna</label>
											    <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <i class="fa fa-user text-primary"></i>
                                                    </div>
                                                </div>
													<input type="text" name="username" class="form-control" placeholder="Masukan Nama Pengguna">
												</div>
											</div>
											<div class="form-group">
												<label>E-Mail</label>
											    <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <i class="fa fa-envelope text-primary"></i>
                                                    </div>
                                                </div>
													<input type="email" name="email" class="form-control" placeholder="E-Mail Aktif Anda">
												</div>
											</div>											
											
			
											<div class="form-group">
												<label>Kata Sandi</label>
											    <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <i class="fa fa-lock text-primary"></i>
                                                    </div>
                                                </div>
													<input type="password" name="password" class="form-control" placeholder="Masukan Kata Sandi">
												</div>
											</div>
											<div class="form-group">
												<label>Konfirmasi Kata Sandi</label>
											    <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <i class="fa fa-lock text-primary"></i>
                                                    </div>
                                                </div>
													<input type="password" name="repassword" class="form-control" placeholder="Konfirmasi Kata Sandi">
												</div>
											</div>
                                        <div class="form-group text-right">
                        <button type="submit" name="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                        <button type="submit" name="daftar" class="btn btn-primary waves-effect waves-light">Submit</button>
                                            
                                        </div>                                     
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->       
       
            </div> <!-- end container -->
        </div> <!-- end wrapper -->

      