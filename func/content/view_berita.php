<div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h6 class="m-t-0 "><b><i class="fa fa-newspaper-o"></i>  Berita & Informasi</b></h6>
                                    <hr>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered nowrap m-0">

                                        <thead>
                                        <tr>
															<th>#</th>
															<th>Kategori</th>
															<th>Konten</th>
															<th>Tanggal</th>
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
															<th scope="row"><?php echo $no; ?></th>
															<td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $data_news['type']; ?></span></td>
															<td><?php echo nl2br($data_news['content']); ?></td>
															<td><?php echo $data_news['date']; ?></td>
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
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

   