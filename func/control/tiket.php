<?php
if (empty($data_user['level'])){
    header("Location: ".$config['url_web']."?");
} else {
if (isset($_GET['id'])) {
    $post_target = base64_decode($tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_GET['id'],ENT_QUOTES))))));
    $checkdb_tiket = $tur->query("SELECT * FROM ticket WHERE id = '$post_target' AND username = '$sess_username'");
    $datadb_tiket = mysqli_fetch_assoc($checkdb_tiket);
    $check_reply = $tur->query("SELECT * FROM ticket_message WHERE ticket_id = '$post_target' AND sender = 'Admin'");
    if (mysqli_num_rows($checkdb_tiket) == 0) {
        header("Location: ".$config['url_web']."?");
    } else {
        $tur->query("UPDATE ticket SET seen_user = '1' WHERE id = '$post_target'");
        if (isset($_POST['submit'])) {
            $post_message = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['message'],ENT_QUOTES)))));
            if ($datadb_tiket['status'] == "Closed") {
                $msg_type = "error";
				$msg_content = "<b>Gagal:</b> Ticket closed. If there is any other problem, please send a new ticket.";
            } else if (empty($post_message)) {
				$msg_type = "error";
				$msg_content = "<b>Gagal:</b> Please fill all input.";
            } else if (strlen($post_message) > 500) {
				$msg_type = "error";
				$msg_content = "<b>Gagal:</b> Maximum message is 500 characters.";
            } else {
                $last_update = "$date $time";
                $insert_ticket = $tur->query("INSERT INTO ticket_message (ticket_id, sender, user, message, datetime) VALUES ('$post_target', 'Member', '$sess_username', '$post_message', '$last_update')");
                $update_ticket = $tur->query("UPDATE ticket SET last_update = '$last_update' WHERE id = '$post_target'");
                if (mysqli_num_rows($check_reply) > 0) {
                    mysqli_query($db, "UPDATE tickets SET status = 'Waiting', seen_admin = '0' WHERE id = '$post_target'");
                }
                if ($insert_ticket == TRUE) {
                    $msg_type = "success";
                    $msg_content = "<b>Berhasil:</b> Message terkirim.";
                } else {
                    $msg_type = "error";
					$msg_content = "<b>Gagal:</b> System error.";
				}
            }
        }
    }
}
}
?>
