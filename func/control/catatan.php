<?php
if (empty($data_user['level'])){
	header("Location: ".$config['url_web']."?");
} else if ($data_user['level'] != "Admin"){
	header("Location: ".$config['url_web']."?");
} else {
?>
                <div class="row">
                    <div class="col-md-6 col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h5 class="m-0 "><i class="fa fa-history"></i>  Riwayat Masuk Pengguna</h5>
				<hr>
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
														<th>Username</th>
														<th>Aktifitas</th>
														<th>Waktu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
												<?php
// start paging config
$query_list = "SELECT * FROM catatan ORDER BY id DESC"; // edit
$new_query = $tur->query($query_list);
// end paging config
												$no = 1;
												while ($data_show = mysqli_fetch_assoc($new_query)) {
												?>
													<tr>
														<td><?php echo $data_show['username']; ?></td>
														<td><?php echo $data_show['note']; ?></td>
														<td><?php echo $data_show['waktu']; ?></td>
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