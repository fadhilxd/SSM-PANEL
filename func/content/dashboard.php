<div class="row">
					<div class="col-md">
		  <div class="card shadow">
                            <div class="card-body">
								<div class="row">
									<div class="col-lg-3">
										<div class="card-body">
											<div class="d-sm-flex align-self-center">
												<img src="<?php echo $cfg_baseurl; ?>assets/images/users/user.png" alt="" class="thumb-lg rounded-circle">
												<div class="media-body ml-2 align-self-center">
													<h6 class="mb-0"><b><?php echo $data_user['username']; ?></b></h6>
													<span class="font-12"><?php echo $data_user['level']; ?></span>
													<br />
													<span class="font-12"><?php echo $data_user['email']; ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="card shadow">
											<div class="card-body">
												<div class="icon-contain">
													<div class="row">
														<div class="col-2 align-self-center">
															<i class="fa fa-shopping-cart text-primary"></i>
														</div>
														<div class="col-10 text-right">
															<h5 class="mt-0 mb-1">Rp <?php echo number_format($data_order['total'],0,',','.'); ?>	
                                            	(<?php echo number_format($data_order22,0,',','.'); ?>)</h5>
									   						<p class="mb-0 font-12 text-muted">Peembelian Saya</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="card card shadow">
											<div class="card-body">
												<div class="icon-contain">
													<div class="row">
														<div class="col-2 align-self-center">
															<i class="dripicons-wallet text-primary"></i>
														</div>
														<div class="col-10 text-right">
															<h5 class="mt-0 mb-1">Rp <?php echo number_format($data_user['balance'],0,',','.'); ?></h5>
															<p class="mb-0 font-12 text-muted">Saldo Saya</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
		  <div class="card shadow">
                            <div class="card-body">
		<h6 class="m-t-0 "><i class="fa fa-area-chart fa-fw"></i> Grafik Pesanan 7 Hari Terakhir</h6>
			<div id="fatur" style="height: 200px;"></div>					
			</div>
			<div class="card-body">
                                               
                                            </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <h6><i class="fa fa-newspaper-o"></i><span> Berita & Informasi</span></h6>
				
                <div class="table-responsive">
                    <table class="table table-bordered table-hovered nowrap mb-0">
						<tbody>
														<tr>
														    <th>Tanggal</th>
															<th>Kategori</th>
															<th>Isi</th>
														</tr>
													</thead>
													    <tbody>
														<?php
														$check_news = $tur->query("SELECT * FROM news ORDER BY id DESC LIMIT 5");
$now_records = mysqli_num_rows($check_news);
if ($now_records == 0) {
?>
													<tr>
														<td colspan="4">Tidak Ada Informasi</td>
													</tr>
<?php
} else {
														$no = 1;
														while ($data_news = mysqli_fetch_assoc($check_news)) {
													if($data_news['type'] == "UPDATE") {
														$label = "warning";
													} else if($data_news['type'] == "INFO") {
														$label = "info";
													}
														?>
														<tr>
														    <td><?php echo $data_news['date']; ?></td>
															<td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $data_news['type']; ?></span></td>
															<td align="left"><?php echo nl2br($data_news['content']); ?></td>
														</tr>
														<?php
														$no++;
														}
													}
														?>
														<tr>
<td colspan="5" align="center">
<a href="?<?php echo paramEncrypt('content=view_berita')?>" class="mt-3 btn btn-primary">Lihat selengkapnya</a>
</td>
</tr>
														
													</tbody>
												</table>
                </div>
            </div>
        </div>
    </div>
</div>
                </div> <!-- end row -->
			
            </div> <!-- end container -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="popup-news">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"><i class="dripicons-bell"></i>  Sekilas Informasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
</div>
<div class="modal-body">
<div class="table-responsive" style="max-height: 300px;">
<table class="table table-striped table-bordered table-box">
    <thead>
														<tr>
														    <th>Tanggal</th>
															<th>Kategori</th>
															<th>Deskripsi</th>
														</tr>
													</thead>
													 <tbody>
														<?php
														$check_news = $tur->query("SELECT * FROM news ORDER BY id DESC LIMIT 5");
$now_records = mysqli_num_rows($check_news);
if ($now_records == 0) {
?>
													<tr>
														<td colspan="4">Tidak Ada Informasi</td>
													</tr>
<?php
} else {
														$no = 1;
														while ($data_news = mysqli_fetch_assoc($check_news)) {
													if($data_news['type'] == "UPDATE") {
														$label = "warning";
													} else if($data_news['type'] == "INFO") {
														$label = "info";
													}
														?>
														<tr>
														    <td><?php echo $data_news['date']; ?></td>
															<td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $data_news['type']; ?></span></td>
															<td><?php echo nl2br($data_news['content']); ?></td>
														</tr>
														<?php
														$no++;
														}
													}
														?>
													</tbody>
												</table>
											</div>
</div>
<div class="modal-footer">
								<button type="button" class="btn btn-primary waves-effect" data-dismiss="modal" onclick="read_popup_news()"><i class="mdi mdi-read"></i> Saya Sudah Membaca</button>
</div>
</div>
</div>
</div>
        </div> <!-- end wrapper -->
   
    