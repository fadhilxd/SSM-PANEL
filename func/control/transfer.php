<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] == "Member"){
	header("Location: ".$config['url_web']."?");
} else {
if (isset($_POST['tambah'])) {
	$post_username = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES)))));
	$post_balance = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['balance'],ENT_QUOTES)))));

	$checkdb_user = $tur->query("SELECT * FROM users WHERE username = '$post_username'");
	$datadb_user = mysqli_fetch_assoc($checkdb_user);
	if (empty($post_username) || empty($post_balance)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Semua Input.";
	} else if (mysqli_num_rows($checkdb_user) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Username Tidak Terdaftar.";
	} else if ($post_balance < $min_transfer) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Jumlah Minimal Transfer Adalah ".$min_transfer.".";
	} else if ($data_user['balance'] < $post_balance) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Saldo Anda Tidak Cukup.";
	} else {
		$update_user = $tur->query("UPDATE users SET balance = balance-$post_balance WHERE username = '$sess_username'"); // cut sender
		$update_user = $tur->query("UPDATE users SET balance = balance+$post_balance WHERE username = '$post_username'"); // send receiver
		$insert_tf = $tur->query("INSERT INTO catatan (username, note, waktu) VALUES ('$sess_username', 'Kamu telah melakukan aktifitas Transfer Saldo', '$date $time')");
		$insert_tf = $tur->query("INSERT INTO transfer_balance (sender, receiver, quantity, date) VALUES ('$sess_username', '$post_username', '$post_balance', '$date')");
		if ($insert_tf == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil:</b> Transfer saldo berhasil.<br /><b>Pengirim:</b> $sess_username<br /><b>Penerima:</b> $post_username<br /><b>Jumlah Transfer:</b> Rp ".number_format($post_balance,0,',','.')." Saldo<br /><b>Tanggal:</b> $date";
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
				<h5 class="m-0 "></i>  Transfer</h5>
			</div>
			<div class="card-body">
										<?php 
										if ($msg_type == "success") {
										?>
										<div class="alert bg-success textk-white">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class=""></i>
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
												- Minimal transfer Rp <?php echo number_format($min_transfer,0,',','.'); ?>.
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Username Penerima</label>
												<div class="col-md-10">
													<input type="text" name="username" class="form-control" placeholder="Username">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-2 control-label">Jumlah Transfer</label>
												<div class="col-md-10">
													<input type="number" name="balance" class="form-control" placeholder="Jumlah Transfer">
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-md-offset-2 col-md-10">
												<button type="reset" class="btn btn-danger ">Ulangi</button>
												<button type="submit" class="pull-right btn btn-primary " name="tambah">Transfer</button>
												</div>
					</div>
				</form>
			</div>
		</div>
	</div>
                  
                  <div class="col-lg-5 col-md-5">
<div class="card m-b-30">
<div class="card shadow mb-0">
<h5 class="card-header text-dark bg-white"><i class="mdi mdi-history"></i> Riwayat</h5>
<div class="card-body">
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
														<th>Tanggal</th>
														<th>Pengirim</th>
														<th>Penerima</th>
														<th>Jumlah</th>
                                        </tr>
                                        </thead>
                                        <tbody>
												<?php
// start paging config
$query_list = "SELECT * FROM transfer_balance ORDER BY id DESC"; // edit
$new_query = $tur->query($query_list);
// end paging config
												$no = 1;
												while ($data_show = mysqli_fetch_assoc($new_query)) {
												?>
													<tr>
														<td><?php echo $data_show['date']; ?></td>
														<td><?php echo $data_show['sender']; ?></td>
														<td><?php echo $data_show['receiver']; ?></td>
														<td>Rp <?php echo number_format($data_show['quantity'],0,',','.'); ?></td>
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