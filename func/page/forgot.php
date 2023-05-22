<?php
if (isset($_SESSION['user'])) {
	header("Location: ".$config['url_web']);
} else {
if (isset($_POST['reset'])) {

	$post_username = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES)))));
	$post_email = $tur->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['email'],ENT_QUOTES)))));

	$check_user = $tur->query("SELECT * FROM users WHERE username = '$post_username'");
        
	$data_user = mysqli_fetch_assoc($check_user);
	$check_email = $tur->query("SELECT * FROM users WHERE email = '$post_email'");
	$data_email = mysqli_fetch_assoc($check_email);	    
			
	if (empty($post_username) || empty($post_email)) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Mohon Mengisi Semua Input.";
	} else if (mysqli_num_rows($check_user) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Email / Username Tidak Terdaftar.";
	} else if (mysqli_num_rows($check_email) == 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal</b><br>Email / Username Tidak Terdaftar.";
	} else {			
			$to = $data_user['email'];
			$newpassword = random(7);
			$new_password = password_hash($newpassword, PASSWORD_DEFAULT);
			$msg = '
    <html>
    <head>
        <title>Password Baru Anda</title>
    </head>
    <body>
        <h1>Halo '.$post_username.', ini adalah Password Anda</h1>
        <p>Terimakasih telah bergabung Bersama Kami </p>
        <p>Ini adalah Password Baru anda '.$newpassword.'</p>
        <br />
        <p>Hormat kami <a href="https://Slovenetwork.com">www.Slovenetwork.com</a>
        <p>Contact Email: admin@DemoPanel
    </body>
    </html>';
			$subject = "Password Baru Anda";
			$header = "From: Demo Panel <noreply@Slovenetwork.com> \r\n";
			$header .= "Reply-To: <noreply@Slovenetwork.com> \r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-type: text/html\r\n";
			$send = mail ($to, $subject, $msg, $header);
			$send = $tur->query("UPDATE users SET password = '$new_password' WHERE username = '$post_username'");
			if ($send == true) {
				$msg_type = "success";
				$msg_content = "<b>Berhasil</b><br />Kata Sandi anda telah dikirim <br /> Silahkan cek folder inbox/spam.";
			} else {
				$msg_type = "error";
				$msg_content = "<b>Gagal</b><br>Error System.";
			}	
		}
	}
}
?>
 <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="https://#/">
                                        <span><h2>Lupa Pasword</h2></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Masukan email dengan benar.</p>
                                </div>
                            <form class="form-auth-small" role="form" method="POST">
                                <div class="form-group">
                                                                    </div>
                                                                    <?php 
										if ($msg_type == "success") {
										?>
										<div class="alert alert-success">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-check-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										} else if ($msg_type == "error") {
										?>
										<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
										<form class="form-horizontal m-t-20" role="form" method="POST">

                                <div class="form-group">
                                    <label for="signin-email" class="control-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>

                                        <div class="form-group text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light" name="reset">Reset</button>
                                            </div>
                                        </div>

                                    </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
             
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->
 