<div class="row">
		<div class="offset-md-2 col-md-8">
		<div class="card shadow">
                                <div class="card-body ">
                                    <h6 class="m-0 "><i class="dripicons-clockwise"></i>  Riwayat Order</h6>
				<hr>
				<div class="alert bg-primary text-white">
				<span class="badge badge-success">Success</span> : Pesanan telah berhasil. </br>
												<span class="badge badge-info">Processing</span> : Pesanan sedang diproses.</br>
												<span class="badge badge-warning">Pending</span> : Pesanan belum diproses.</br>
												<span class="badge badge-danger">Partial</span> : Pesanan yang masuk hanya sebagian saja & sebagian saldo kembali lagi.</br>
												<span class="badge badge-danger">Error</span> : Pesanan gagal & saldo kembali lagi.</br>
											</div>
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Nama Layanan</th>
                                            <th>Target</th>
                                            <th>Jumlah</th>
                                            <th>Jumlah Awal</th>
                                            <th>Sisa</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Refund</th>
                                        </tr>
                                        </thead>
                                        <tbody>
														<?php
// start paging config
$query_order = "SELECT * FROM orders WHERE user = '$sess_username' ORDER BY id DESC"; // edit
$new_query = $tur->query($query_order);
// end paging config
														$no = 1;
												while ($data_order = mysqli_fetch_assoc($new_query)) {
													if($data_order['status'] == "Pending") {
														$label = "warning";
													} else if($data_order['status'] == "Processing") {
														$label = "info";
													} else if($data_order['status'] == "Error") {
														$label = "danger";
													} else if($data_order['status'] == "Partial") {
														$label = "danger";
													} else if($data_order['status'] == "Success") {
														$label = "success";
													}
												?>
														<tr>
														<td><?php echo $data_order['oid']; ?></td>
												    	<td><?php echo $data_order['date']; ?></td>
														<td><?php echo $data_order['service']; ?> (<?php if($data_order['place_from'] == "API") { ?><i class="fa fa-random"></i><?php } else { ?><i class="fa fa-globe"></i><?php } ?>)</td>
					                                                                        <td><input type="text" class="form-control" value="<?php echo $data_order['link']; ?>" style="width: 200px;"></td>
														<td><?php echo number_format($data_order['quantity'],0,',','.'); ?></td>
														<td><?php echo number_format($data_order['start_count'],0,',','.'); ?></td>
														<td><?php echo number_format($data_order['remains'],0,',','.'); ?></td>
														<td>Rp <?php echo number_format($data_order['price'],0,',','.'); ?></td>
														<td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $data_order['status']; ?></span></td>
														<td align="center"><span class="badge badge-<?php if($data_order['refund'] == 0) { echo "danger"; } else { echo "success"; } ?>"><?php if($data_order['refund'] == 0) { ?><i class="fa fa-times"></i><?php } else { ?><i class="fa fa-check"></i><?php } ?></span></td>
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
