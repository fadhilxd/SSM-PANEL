<?php
require_once("../config/config.php");
require_once("../config/setting.php"); 

$check_users = $tur->query("SELECT * FROM users WHERE status = 'Active' AND balance = '0'");

if (mysqli_num_rows($check_users) == 0) {
	die("not found.");
} else {
	while($data_users = mysqli_fetch_assoc($check_users)) {
		$user = $data_users['username'];
		$update_users = $tur->query("DELETE FROM users WHERE username = '$user'");
		if ($update_users == TRUE) {
			echo "DELETED $user<br />";
    	} else {
			echo "Error database.";
		}
	}
}
?>