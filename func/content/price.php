<div class="row">
                            <div class="offset-md-2 col-md-8">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6 class="m-t-0 "><i class="dripicons-view-list"></i> Daftar harga</h6>
                                <hr>
                                <div class="table-responsive">
<table id="datatable-responsive" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
														<th>ID</th>
														<th>Layanan</th>
														<th>Harga/1000</th>
														<th>Min</th>
														<th>Max</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
<?php
$check_service = $tur->query("SELECT * FROM services ORDER BY sid ASC"); // edit

// end paging config
												while ($data_service = $check_service->fetch_assoc()) {
												?>
													<tr class="odd gradeX">
														<td><?php echo $data_service['sid']; ?></td>
														<td><?php echo $data_service['service']; ?></td>
														<td>Rp <?php echo number_format($data_service['price'],0,',','.'); ?></td>
														<td><?php echo number_format($data_service['min'],0,',','.'); ?></td>
														<td><?php echo number_format($data_service['max'],0,',','.'); ?></td>
														<td align="center"><span class="badge badge-<?php echo $label = "success"; ?>"><?php echo $data_service['status']; ?></span></td>
													</tr>
												<?php
												}
												?>
												</tbody>
											</table>
                                    </div>
									</div>
								</div>
							</div>
						</div>
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
	$("#category").change(function() {
		var category = $("#category").val();
		$.ajax({
			url: '<?php echo $config['url_web']; ?>config/include/service.php',
			data: 'category=' + category,
			type: 'POST',
			dataType: 'html',
			success: function(msg) {
				$("#note").html(msg);
			}
		});
	});
});
	</script>