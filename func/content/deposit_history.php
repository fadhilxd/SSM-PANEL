<div class="row">
			<div class="col-md-6 col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h6 class="m-0 "><i class="dripicons-clockwise"></i>  Riwayat Deposit</h6>
				<hr>
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
														<th>Kode ID</th>
														<th>Metode</th>
														<th>No Pengirim</th>
														<th>Note</th>
														<th>Saldo TopUp</th>
														<th>Saldo Diterima</th>
														<th>Tanggal</th>
														<th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
														<?php
														$check_depo = $tur->query("SELECT * FROM deposits WHERE username = '$sess_username' ORDER BY id DESC");
														$no = 1;
														while ($data_depo = mysqli_fetch_assoc($check_depo)) {
													if($data_depo['status'] == "Pending") {
														$label = "warning";
													} else if($data_depo['status'] == "Error") {
														$label = "danger";
													} else if($data_depo['status'] == "Success") {
														$label = "success";
													}
														?>
														<tr>
														<td><?php echo $data_depo['code']; ?></td>
														<td><?php echo $data_depo['method']; ?></td>
														<td><?php echo $data_depo['pengirim']; ?></td>	
														<td><?php echo $data_depo['note']; ?></td>	
														<td><?php echo number_format($data_depo['quantity'],0,',','.'); ?></td>
														<td><?php echo number_format($data_depo['balance'],0,',','.'); ?></td>
														<td><?php echo $data_depo['date']; ?></td>
														<td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $data_depo['status']; ?></span></td>
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

