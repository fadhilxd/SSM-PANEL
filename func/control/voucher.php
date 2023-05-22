<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Agen" AND $data_user['level'] != "Admin"){
	header("Location: ".$config['url_web']."?");
} else {
if (isset($_POST['tambah'])) {
	$post_balance = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['balance'],ENT_QUOTES)))));

	$kode = random(5);

	if (empty($post_balance)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Input.";
	} else {
		$update_user = $tur->query("UPDATE users SET balance = balance-$post_balance WHERE username = '$sess_username'");
		$insert_voc = $tur->query("INSERT INTO voucher (code, balance, status) VALUES ('$kode', '$post_balance', 'On')");
		if ($insert_voc == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil:</b> Tambah voucher saldo berhasil.<br /><b>Code:</b> $kode<br /><b>Jumlah Saldo:</b> Rp ".number_format($post_balance,0,',','.')." Saldo<br /><b>Tanggal:</b> $date";
		} else {
			$msg_type = "error";
			$msg_content = "<b>Gagal</b><br>Error System.";
		}
	}
}
?>
               <div class="row">
	<div class="col-md">
		<div class="card shadow mb-4">
			<div class="card-header text-dark bg-white">
				<h5 class="m-0 "><i class="mdi mdi-credit-cart"></i>  Buat Voucher</h5>
			</div>
			<div class="card-body">
										<?php 
										if ($msg_type == "success") {
										?>
										<div class="alert bg-success">
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
											<div class="alert bg-primary text-white">
												- Saldo Anda akan dipotong sesuai jumlah transfer saldo.<br />
												- Minimal Rp <?php echo number_format($min_transfer,0,',','.'); ?>.
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Jumlah Saldo</label>
												<div class="col-md-10">
													<input type="number" name="balance" class="form-control" placeholder="Jumlah Saldo">
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
												<button type="reset" class="btn btn-danger">Ulangi</button>
												<button type="submit" class="pull-right btn btn-primary" name="tambah">Buat</button>
												</div>
					</div>
				</form>
			</div>
		</div>
	</div>
                  
                  <div class="col-lg-5 col-md-5">
<div class="card m-b-30">
<div class="card shadow mb-0">
<h5 class="card-header text-dark bg-white"><i class="mdi mdi-history"></i> History</h5>
<div class="card-body">
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
														<th>Code</th>
														<th>Pengguna</th>
														<th>Jumlah</th>
														<th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
												<?php
// start paging config
$query_list = "SELECT * FROM voucher ORDER BY id DESC"; // edit
$new_query = $tur->query($query_list);
// end paging config
												$no = 1;
												while ($data_show = mysqli_fetch_assoc($new_query)) {
													if($data_show['status'] == "On") {
														$label = "success";
														$kata = "Belum Digunakan";
													} else if($data_show['status'] == "Off") {
														$label = "danger";
														$kata = "Sudah Digunakan";
													}
												?>
													<tr>
														<td><?php echo $data_show['code']; ?></td>
														<td><?php echo $data_show['username']; ?></td>
														<td>Rp <?php echo number_format($data_show['balance'],0,',','.'); ?></td>
														<td><span class="badge badge-<?php echo $label; ?>"><?php echo $kata; ?></span></td>
													</tr>
												<?php
												$no++;
												}
												?>
                                        </tbody>
                                    </table>
                                    </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

   
<?php } ?>