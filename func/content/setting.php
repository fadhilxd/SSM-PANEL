<?php
if (isset($_POST['change_pswd'])) {

	$post_username = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES)))));
	$post_opassword = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['opassword'],ENT_QUOTES)))));
	$post_npassword = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['npassword'],ENT_QUOTES)))));
	$post_cnpassword = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['cnpassword'],ENT_QUOTES)))));
	$new_password = password_hash($post_npassword, PASSWORD_DEFAULT);

	if (empty($post_npassword) || empty($post_cnpassword) || empty($post_opassword)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Semua Input.";
	} else if ($sess_username == "demo") {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Dilarang Mengubah apapun dalam akun demo.";
	} else if (strlen($post_npassword) < 5) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Password Terlalu Pendek, Minimal 5 Karakter.";
	} else if ($post_cnpassword <> $post_npassword) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Konfirmasi Password Baru Tidak Sesuai.";
	} else if ($post_cnpassword <> $post_npassword) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Konfirmasi Password Baru Tidak Sesuai.";
	} else {
	    $check_user = $tur->query("SELECT * FROM users WHERE username = '$post_username'");
	    if(password_verify($post_opassword, $data_user['password'])) {
		$update_user = $tur->query("INSERT INTO catatan (username, note, waktu) VALUES ('$sess_username', 'Kamu telah melakukan aktifitas Ubah Password', '$date $time')");
		$update_user = $tur->query("UPDATE users SET password = '$new_password' WHERE username = '$sess_username'");
		if ($update_user == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil</b><br>Password Telah Dirubah.";
		} else {
			$msg_type = "error";
			$msg_content = "<b>Gagal</b><br>Password lama salah.";
		}
		
	    }
	}
} else if (isset($_POST['change_api'])) {
	$set_api1 = random(5);
	$set_api2 = random(5);
	$set_api3 = random(5);
	$set_api4 = random(5);
	$set_api5 = random(5);
	$set_api_key = $set_api1."-".$set_api2."-".$set_api3."-".$set_api4."-".$set_api5;
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
                <div class="row">
	<div class="col-md-7">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6 class="m-t-0"><i class="dripicons-lock-open"></i>	Pengaturan Akun</h6>
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
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group row">
                                        <label class="col-sm-3 control-label">Password Baru</label>
                                        <div class="col-sm-9">
													<input type="password" name="npassword" class="form-control" placeholder="Password Baru">
												</div>
											</div>
											<div class="form-group row">
                                        <label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
                                        <div class="col-sm-9">
													<input type="password" name="cnpassword" class="form-control" placeholder="Konfirmasi Password Baru">
												</div>
											</div>
												<div class="form-group row">
                                        <label class="col-sm-3 control-label">Password Lama</label>
                                        <div class="col-sm-9">
													<input type="password" name="opassword" class="form-control" placeholder=" Password Lama">
												</div>
											</div>
												<div class="col-12">
						<div class="form-group">
					<button type="submit" name="change_pswd" class="btn btn-primary"><i class="fa fa-exchange"></i>	Ganti Password</button>
                                        <button type="refresh" class="btn btn-danger"><i class="dripicons-clockwise"></i> Ulangi</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
                  
                  <div class="col-md-5">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6 class=" m-t-0"><i class="mdi mdi-shuffle-variant"></i>  Api Key</h6>
                                <hr>
										<form class="form-horizontal" method="POST">
                                	<div class="form-group row">
                                        <label class="col-sm-3 control-label">Api Key Anda</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="api" value="<?php echo $data_user['api_key']; ?>" readonly>
                                               
                            </div>
                        </div>
                                     <div class="form-group row m-b-0">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" name="change_api" class="btn btn-block btn-primary waves-effect waves-light"><i class="mdi mdi-shuffle-variant"></i>	Update</button>
                                        </div>
                                    </div>
                                </form>
                                </div>     
                             </div>
                             </div>
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->
