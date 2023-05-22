<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Admin"){
	header("Location: ".$config['url_web']."?");
} else {
if (isset($_POST['delete'])) {
	$post_id = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['konten'],ENT_QUOTES)))));
	$checkdb_news = $tur->query("SELECT * FROM news WHERE content = '$post_id'");
	if (mysqli_num_rows($checkdb_news) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Informasi Tidak Ditemukan.";
	} else {
		$delete_news = $tur->query("DELETE FROM news WHERE content = '$post_id'");
		if ($delete_news == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil</b><br>Informasi Telah Dihapus.";
		}
	}
}
?>
                <div class="row">
                    <div class="col-md-6 col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h5 class="m-0 "><i class="fa fa-trash"></i>  Hapus Berita</h5>
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
												<label class="col-md-2 control-label">Konten</label>
												<div class="col-md-10">
													<select class="form-control" name="konten">
														<option value="0">Pilih salah satu...</option>
														<?php
														$check_news = $tur->query("SELECT * FROM news ORDER BY content ASC");
														while ($data_news = mysqli_fetch_assoc($check_news)) {
														?>
														<option value="<?php echo $data_news['content']; ?>"><?php echo $data_news['content']; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
											<a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("news"); ?>" class="btn btn-warning">Kembali</a>
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