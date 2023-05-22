             <div class="row">
                    <div class="col-md-6 col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h6 class="m-0 "><i class="dripicons-clockwise"></i>  Log Aktifitas</h6>
				<hr>
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover m-0">
													<thead>
														<tr>
															<th>#</th>
															<th>Catatan</th>
															<th>Waktu</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$check_catatan = $tur->query("SELECT * FROM catatan WHERE username = '$sess_username' ORDER BY id DESC LIMIT 5");
														$no = 1;
														while ($data_catatan = mysqli_fetch_assoc($check_catatan)) {
														?>
														<tr>
															<th scope="row"><?php echo $no; ?></th>
															<td><?php echo $data_catatan['note']; ?></td>
															<td><?php echo $data_catatan['waktu']; ?></td>
														</tr>
														<?php
														$no++;
														}
														?>
													</tbody>
												</table>
											</div>
											<td colspan="3" align="center">
											    <a href="?<?php echo paramEncrypt('content=view')?>" class="btn btn-primary btn-bordred btn-block"></i> Selengkapnya.</a>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->
