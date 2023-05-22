<?php
require("../../config/config.php");

if (isset($_POST['category'])) {
	$post_cat = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['category'],ENT_QUOTES)))));
	$check_service = $tur->query("SELECT * FROM services WHERE category = '$post_cat' AND status = 'Active' ORDER BY sid ASC");
	$no = 1;
	?>
										<div class="table-responsive">
											 <table class="table table-bordered dt-responsive nowrap">
												<thead>
													<tr>
														<th>Id</th>
														<th>Lyanan</th>
														<th>Harga/K</th>
														<th>Min</th>
														<th>Max</th>
																																						<th>Status</th>
													</tr>
												</thead>
												<tbody>
												<?php
												$check_service = $tur->query("SELECT * FROM services WHERE category = '$post_cat' AND status = 'Active' ORDER BY sid DESC");
												while ($data_service = mysqli_fetch_assoc($check_service)) {
												?>
													<tr>
														
														<th scope="row"><?php echo $data_service['sid']; ?></th>
														<td><?php echo $data_service['service']; ?></td>
														<td>Rp <?php echo number_format($data_service['price'],0,',','.'); ?></td>
														<td><?php echo number_format($data_service['min'],0,',','.'); ?></td>
														<td><?php echo number_format($data_service['max'],0,',','.'); ?></td>
													         <td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $data_service['status']; ?></span></td>
														
													</tr>
												<?php
												$no++;
												} 
												?>
												</tbody>
											</table>
										</div>
<?php
}