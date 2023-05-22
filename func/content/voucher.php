<?php
if (isset($_POST['tambah'])) {
	$post_voc = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['voc'],ENT_QUOTES)))));

	$check_voc = $tur->query("SELECT * FROM voucher WHERE code = '$post_voc' AND status = 'Off'");
	$checkdb_voc = $tur->query("SELECT * FROM voucher WHERE code = '$post_voc'");
	$datadb_voc = mysqli_fetch_assoc($checkdb_voc);
	$get = $datadb_voc['balance'];

	if (empty($post_voc)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Input.";
	} else if (mysqli_num_rows($checkdb_voc) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Voucher Tidak Terdaftar.";
	} else if (mysqli_num_rows($check_voc) == 1) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Voucher Telah Digunakan.";
	} else {
		$update_user = $tur->query("UPDATE users SET balance = balance+$get WHERE username = '$sess_username'");
		$update_voc = $tur->query("UPDATE voucher SET status = 'Off' WHERE code = '$post_voc'");
		$update_voc = $tur->query("UPDATE voucher SET username = '$sess_username' WHERE code = '$post_voc'");
		$insert_voc = $tur->query("INSERT INTO catatan (username, note, waktu) VALUES ('$sess_username', 'Kamu telah melakukan aktifitas Tukar Voucher Saldo', '$date $time')");
		if ($insert_voc == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil:</b> Tukar voucher saldo berhasil.<br /><b>Code:</b> $post_voc<br /><b>Jumlah Saldo:</b> Rp ".number_format($get,0,',','.')." Saldo<br /><b>Tanggal:</b> $date";
		} else {
			$msg_type = "error";
			$msg_content = "<b>Gagal</b><br>Error System.";
		}
	}
}
?>
               <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6 class="m-t-0 "><i class="dripicons-card"></i> Tukar Voucher</h6>
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
												<label class="col-md-2 control-label">Code Voucher</label>
												<div class="col-md-10">
													<input type="text" name="voc" class="form-control" placeholder="Code Voucher">
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
												<button type="reset" class="btn btn-danger waves-effect w-md waves-light">Ulangi</button>
												<button type="submit" class="pull-right btn btn-primary" name="tambah">Tambah</button>
												</div>
											</div>
										</form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

       