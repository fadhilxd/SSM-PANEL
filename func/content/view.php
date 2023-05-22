<div class="row">
			<div class="col-md-6 col-12">
		<div class="card shadow">
                                <div class="card-body">
                                    <h6 class="m-0 "><i class="dripicons-clockwise"></i>  Log Aktifitas</h6>
				<hr>
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Catatan</th>
                                            <th>Waktu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
														<?php
														$check_catatan = $tur->query("SELECT * FROM catatan WHERE username = '$sess_username' ORDER BY id DESC");
														$no = 1;
														while ($data_catatan = mysqli_fetch_assoc($check_catatan)) {
														?>
														<tr>
															<td><?php echo $no; ?></td>
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
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->
