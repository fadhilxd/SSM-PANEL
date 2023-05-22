<?php
require("../../config/config.php");

if (isset($_POST['method'])) {
	$post_sid = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['method'],ENT_QUOTES)))));
	$check_depo = $tur->query("SELECT * FROM deposit_method WHERE name = '$post_sid'");
	if (mysqli_num_rows($check_depo) == 1) {
		$data_depo = mysqli_fetch_assoc($check_depo);
		if ($post_sid == "Telkomsel") {
	?>
											<div class="form-group row">
												<label class="col-md-2 control-label">No Pengirim</label>
												<div class="col-md-10">
													<input type="number" name="sending" class="form-control" placeholder="628">
<font color="#FF0000">*Gunakan awalan kode 628 Bukan 08 </font>
												</div>
											</div>
	<?php
	} else if ($post_sid == "Telkomsel #02") {
	?>
											<div class="form-group row">
												<label class="col-md-2 control-label">No Pengirim</label>
												<div class="col-md-10">
													<input type="number" name="sending" class="form-control" placeholder="62">
<font color="#FF0000">*Berlaku hanya untuk pulsa</font>
												</div>
											</div>
	<?php
	} else if ($post_sid == "Telkomsel #03") {
	?>
											<div class="form-group row">
												<label class="col-md-2 control-label">No Pengirim</label>
												<div class="col-md-10">
													<input type="number" name="sending" class="form-control" placeholder="08*******">
*Berlaku Hanya Untuk Pulsa
												</div>
											</div>
	<?php
	} else { }
	?>
	<?php
	} else {
	?>
										<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
													<i class="mdi mdi-block-helper"></i>
													<b>Error:</b> Method not found.
												</div>
	<?php
	}
} else {
?>
										<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
													<i class="mdi mdi-block-helper"></i>
													<b>Error:</b> Something went Wrong.
												</div>
<?php
}