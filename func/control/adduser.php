<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Reseller"){
	header("Location: ".$config['url_web']."?");
} else {
if (isset($_POST['add'])) {
	$post_email = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['email'],ENT_QUOTES)))));
	$post_username = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES)))));
	$post_password = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['password'],ENT_QUOTES)))));
	$post_balance = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['balance'],ENT_QUOTES)))));
	$post_level = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['level'],ENT_QUOTES)))));
	$new_password = password_hash($post_password, PASSWORD_DEFAULT);
	$post_api = random(20);

	$checkdb_user = $tur->query("SELECT * FROM users WHERE username = '$post_username'");
	$checkdb_email = $tur->query("SELECT * FROM users WHERE email = '$post_email'");
	$datadb_user = mysqli_fetch_assoc($checkdb_user);

	if (empty($post_email) || empty($post_username) || empty($post_password) || empty($post_balance) || empty($post_level)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Semua Input.";
	} else if ($post_level != "Member" AND $post_level != "Agen" AND $post_level != "Reseller") {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Input Tidak Sesuai.";
	} else if (mysqli_num_rows($checkdb_user) > 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Username ".$post_username." Telah Terdaftar.";
	} else if (mysqli_num_rows($checkdb_email) > 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Email ".$post_email." Telah Terdaftar.";
	} else if ($post_balance < $min_saldo) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Jumlah Minimal Saldo Adalah ".$min_saldo.".";
	} else if ($data_user['balance'] < $post_balance) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Saldo Kamu Tidak Mencukupi.";
	} else {
		$update_user = $tur->query("UPDATE users SET balance = balance-$post_balance WHERE username = '$sess_username'"); // cut sender
		$insert_user = $tur->query("INSERT INTO users (email, username, password, balance, level, registered, status, api_key, uplink) VALUES ('$post_email', '$post_username', '$new_password', '$post_balance', '$post_level', '$date', 'Active', '$post_api', '$sess_username')");
		if ($insert_user == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil:</b> Pengguna berhasil ditambahkan.<br /><b>Email:</b> $post_email<br /><b>Username:</b> $post_username<br /><b>Password:</b> $post_password<br /><b>Level:</b> $post_level<br /><b>Saldo:</b> Rp ".number_format($post_balance,0,',','.');
		} else {
			$msg_type = 'error';
			$msg_content = "<b>Gagal</b><br>Error System";
		}
	}
}
?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Tambah Pengguna</h4>
										<?php 
										if ($msg_type == "success") {
										?>
										<div class="alert alert-success">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-check-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										} else if ($msg_type == "error") {
										?>
										<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
										<form class="form-horizontal" role="form" method="POST">
										    	<div class="alert alert-info">
												- Saldo Anda akan dipotong sesuai jumlah Saldo yang diisi.<br />
												- Minimal Saldo Rp <?php echo number_format($min_saldo,0,',','.'); ?>.
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Level</label>
												<div class="col-md-10">
													<select class="form-control" name="level">
														<option value="Member">Member</option>
														<option value="Agen">Agen</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Email</label>
												<div class="col-md-10">
													<input type="text" name="email" class="form-control" placeholder="Email">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Username</label>
												<div class="col-md-10">
													<input type="text" name="username" class="form-control" placeholder="Username">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Password</label>
												<div class="col-md-10">
													<input type="text" name="password" class="form-control" placeholder="Password">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Saldo</label>
												<div class="col-md-10">
													<input type="number" name="balance" class="form-control" placeholder="Balance">
												</div>
											</div>
												<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
											<a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("users"); ?>" class="btn btn-info btn-bordered waves-effect w-md waves-light">Kembali ke daftar</a>
											<div class="pull-right">
												<button type="reset" class="btn btn-danger btn-bordered waves-effect w-md waves-light">Ulangi</button>
												<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="add">Tambah</button>
											</div>
												</div>
											</div>
										</form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

     
<?php } ?>