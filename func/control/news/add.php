<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Admin"){
	header("Location: ".$config['url_web']."?");
} else {
if (isset($_POST['add'])) {
	$post_content = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['content'],ENT_QUOTES)))));
	$post_type = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['type'],ENT_QUOTES)))));

	if (empty($post_content) || empty($post_type)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Semua Input.";
	} else {
		$insert_news = $tur->query("INSERT INTO news (date, content, type) VALUES ('$date', '$post_content', '$post_type')");
		if ($insert_news == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil</b><br>Informasi Ditambahkan.";
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
                                    <h5 class="m-0 "><i class="fa fa-plus"></i>  Tambah</h5>
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
												<label class="col-md-2 control-label">Type</label>
												<div class="col-md-10">
													<select class="form-control" name="type">
														<option value="0">Pilih tipe...</option>
														<option value="UPDATE">Update</option>
														<option value="INFO">Info</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Konten</label>
												<div class="col-md-10">
													<textarea name="content" class="form-control" placeholder="Konten"></textarea>
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
											<a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("news"); ?>" class="btn btn-warning ">Kembali</a>
											<div class="pull-right">
												<button type="reset" class="btn btn-danger">Ulangi</button>
												<button type="submit" class="btn btn-primary" name="add">Tambah</button>
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