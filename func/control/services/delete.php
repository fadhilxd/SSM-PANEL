<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Admin"){
	header("Location: ".$config['url_web']."?");
} else {
if (isset($_POST['delete'])) {
	$post_id = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['sid'],ENT_QUOTES)))));
	$checkdb_service = $tur->query("SELECT * FROM services WHERE service = '$post_id'");
	if (mysqli_num_rows($checkdb_service) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Layanan Tidak Ditemukan.";
	} else {
		$delete_service = $tur->query("DELETE FROM services WHERE service = '$post_id'");
		if ($delete_service == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil</b><br>Layanan Telah Dihapus.";
		}
	}
}
?>
                <div class="row">
                    <div class="col-md-6 col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h5 class="m-0 "><i class="fa fa-trash"></i>  Hapus Layanan</h5>
				<hr>
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
											<div class="form-group row">
												<label class="col-md-2 control-label">Layanan</label>
												<div class="col-md-10">
													<select class="form-control" name="sid">
														<option value="0">Pilih salah satu...</option>
														<?php
														$check_service = mysqli_query($tur, "SELECT * FROM services ORDER BY service ASC");
														while ($data_service = mysqli_fetch_assoc($check_service)) {
														?>
														<option value="<?php echo $data_service['service']; ?>"><?php echo $data_service['service']; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
											<a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("services"); ?>" class="btn btn-warning ">Kembali</a>
											<button type="submit" class="pull-right btn btn-primary" name="delete">Hapus</button>
												</div>
											</div>
										</form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

<?php } ?>