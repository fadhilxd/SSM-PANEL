<?php
require("../../config/config.php");

if (isset($_POST['service'])) {
	$post_sid = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['service'],ENT_QUOTES)))));
	$check_service = $tur->query("SELECT * FROM services WHERE sid = '$post_sid' AND status = 'Active'");
	if (mysqli_num_rows($check_service) == 1) {
		$data_service = mysqli_fetch_assoc($check_service);
	?>
										<div class="alert bg-success" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													
													<b>Price/1000:</b> Rp <?php echo number_format($data_service['price'],0,',','.'); ?><br />
													<b>Min. Order:</b> <?php echo number_format($data_service['min'],0,',','.'); ?><br />
													<b>Max. Order:</b> <?php echo number_format($data_service['max'],0,',','.'); ?><br />
												        <i class="mdi mdi-information"></i>
													<b>Note:</b> <?php echo $data_service['note']; ?>
												</div>
	<?php
	} else {
	?>
												<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<i class="mdi mdi-block-helper"></i>
													<b>Error:</b> Service not found.
												</div>
	<?php
	}
} else {
?>
												<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<i class="mdi mdi-block-helper"></i>
													<b>Error:</b> Something went wrong.
												</div>
<?php
}