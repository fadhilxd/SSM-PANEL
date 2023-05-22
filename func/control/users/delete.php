<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Admin"){
	header("Location: ".$config['url_web']."?");
} else {
if (isset($_POST['delete'])) {
	$post_id = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES)))));
	$checkdb_users = $tur->query("SELECT * FROM users WHERE username = '$post_id'");
	if (mysqli_num_rows($checkdb_users) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Pengguna Tidak Ditemukan.";
	} else {
		$delete_users = $tur->query("DELETE FROM users WHERE username = '$post_id'");
		if ($delete_users == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil</b><br>Pengguna Telah Dihapus.";
		}
	}
}
?>
                <div class="row">
                   <div class="col-md-6 col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h5 class="m-0 "><i class="fa fa-trash"></i>  Hapus Pengguna</h5>
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
												<label class="col-md-2 control-label">Username</label>
												<div class="col-md-10">
													<select class="form-control" name="username">
														<option value="0">Pilih salah satu...</option>
														<?php
														$check_users = mysqli_query($tur, "SELECT * FROM users ORDER BY username ASC");
														while ($data_users = mysqli_fetch_assoc($check_users)) {
														?>
														<option value="<?php echo $data_users['username']; ?>"><?php echo $data_users['username']; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
											<a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("users"); ?>" class="btn btn-warning ">Kembali</a>
											<button type="submit" class="pull-right btn btn-primary " name="delete">Hapus</button>
												</div>
											</div>
										</form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

<?php } ?>