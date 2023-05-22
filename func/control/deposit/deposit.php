<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Admin"){
	header("Location: ".$config['url_web']."?");
} else {
	$check_worder = $tur->query("SELECT SUM(quantity 
) AS total FROM deposits");
	$data_worder = mysqli_fetch_assoc($check_worder);
	$check_worder = $tur->query("SELECT * FROM deposits");
	$count_worder = mysqli_num_rows($check_worder);
if (isset($_GET['code'])) {
	$post_code = base64_decode($tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_GET['code'],ENT_QUOTES))))));
	$checkdb_depo = $tur->query("SELECT * FROM deposits WHERE code = '$post_code'");
	$datadb_depo = mysqli_fetch_assoc($checkdb_depo);
	$get_balance = $datadb_depo['balance'];
	$balance_user = $datadb_depo['username'];
	if (mysqli_num_rows($checkdb_depo) == 0) {
		header("Location: ".$config['url_web']."?");
	} else {
if (isset($_POST['edit'])) {
	$post_status = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['status'],ENT_QUOTES)))));

	if ($post_status != "Pending" AND $post_status != "Error" AND $post_status != "Success") {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Input Tidak Sesuai.";
	} else {
		if($_POST['status'] == "Success") {
			$update = $tur->query("INSERT INTO hof (type, user, price) VALUES ('Deposit', '$balance_user', '$get_balance')");
			$update = $tur->query("UPDATE deposits set status = '$post_status' WHERE code = '$post_code'");
			$update = $tur->query("UPDATE users set balance = balance+$get_balance WHERE username = '$balance_user'");
			if($update == TRUE) {
				$msg_type = "success";
				$msg_content = "<b>Berhasil:</b> Saldo sudah di tambahkan ke <b>$balance_user</b> dengan jumlah $get_balance dan status sudah di update.";
			} else {
				$msg_type = "error";
				$msg_content = "<b>Gagal</b><br>Error System 1.";
			}
		} else {
			$update_depo = $tur->query("UPDATE deposits set status = '$post_status' WHERE code = '$post_code'");
			if ($update_depo == TRUE) {
				$msg_type = "success";
				$msg_content = "<b>Berhasil:</b> Update berhasil.";
			} else {
				$msg_type = "error";
				$msg_content = "<b>Gagal</b><br>Error System.";
			}
		}
	}
}
?>
                <div class="row">
                    <div class="col-md">
		<div class="card shadow mb-4">
			<div class="card-header text-dark bg-white">
				<h5 class="m-0 "><i class="mdi mdi-edit"></i>   Ubah Deposit</h5>
			</div>
			<div class="card-body">
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
												<label class="col-md-2 control-label">Topup ID</label>
												<div class="col-md-10">
													<input type="text" class="form-control" placeholder="Topup ID" value="<?php echo $datadb_depo['code']; ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Saldo Topup</label>
												<div class="col-md-10">
													<input type="number" name="quantity" class="form-control" placeholder="Quantity" value="<?php echo $datadb_depo['quantity']; ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Saldo Diterima</label>
												<div class="col-md-10">
													<input type="number" name="balance" class="form-control" placeholder="Balance" value="<?php echo $datadb_depo['balance']; ?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Status</label>
												<div class="col-md-10">
													<select class="form-control" name="status">
														<option value="<?php echo $datadb_depo['status']; ?>"><?php echo $datadb_depo['status']; ?> (Selected)</option>
														<option value="Pending">Pending</option>
														<option value="Error">Error</option>
														<option value="Success">Success</option>
													</select>
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
											<div class="pull-right">
												<button type="reset" class="btn btn-danger">Ulangi</button>
												<button type="submit" class="btn btn-primary" name="edit">Ubah</button>
											</div>
												</div>
											</div>
										</form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
<?php } } else { ?><? } ?>
                          <div class="col-lg-3">
										<div class="card card shadow">
											<div class="card-body">
												<div class="icon-contain">
													<div class="row">
														<div class="col-2 align-self-center">
															<i class="dripicons-wallet text-primary"></i>
														</div>
														<div class="col-10 text-right">
															<h5 class="mt-0 mb-1">Rp <?php echo number_format($data_worder['total'],0,',','.'); ?>
                                            (<?php echo number_format($count_worder,0,',','.'); ?>)
															<p class="mb-0 font-12 text-muted">Deposit Pengguna</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                
                                        <div class="col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h5 class="m-0 "><i class="mdi mdi-bank"></i> Kelola Deposit</h5>
				<hr>
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
														<th>Kode</th>
														<th>Pengguna</th>
														<th>Metode</th>

<th>No Pengirim</th>														
														<th>Saldo Topup</th>
														<th>Saldo Diterima</th>
														<th>Tanggal</th>
														<th>Status</th>
														<th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
												<?php
// start paging config
$query_list = "SELECT * FROM deposits ORDER BY id DESC"; // edit
$new_query = $tur->query($query_list);
// end paging config
												$no = 1;
												while ($data_show = mysqli_fetch_assoc($new_query)) {
													if($data_show['status'] == "Pending") {
														$label = "warning";
													} else if($data_show['status'] == "Error") {
														$label = "danger";
													} else if($data_show['status'] == "Success") {
														$label = "success";
													}
												?>
													<tr>
														<td><?php echo $data_show['code']; ?></td>
														<td><?php echo $data_show['username']; ?></td>
														<td><?php echo $data_show['method']; ?></td>
														
<td><?php echo $data_show['pengirim']; ?></td>														
														<td><?php echo number_format($data_show['quantity'],0,',','.'); ?></td>
													<td><?php echo number_format($data_show['balance'],0,',','.'); ?></td>
														<td><?php echo $data_show['date']; ?></td>
														<td><span class="badge badge-<?php echo $label; ?>"><?php echo $data_show['status']; ?></span></td>
														<td align="center">
														<a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("deposithis"); ?>&code=<?php echo base64_encode($data_show['code']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
														</td>
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