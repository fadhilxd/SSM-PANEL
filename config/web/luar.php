

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title><?php echo $config['nama_web']; ?> - Panel SMM Indonesia Terbaik </title>
        <meta property="og:description" content="<?php echo $config['nama_web']; ?> Adalah Website penyedia Layanan Social Media Termurah dan Terbaik seINDONESIA" />
        <meta name="description" content="<?php echo $config['nama_web']; ?> Adalah Website penyedia Layanan Social Media Termurah dan Terbaik seINDONESIA" />
        <meta property="og:image" content="<?php echo $config['nama_web']; ?>" />
        <meta property="og:title" content="<?php echo $config['nama_web']; ?> " />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="<?php echo $config['nama_web']; ?>" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <a href="<?php echo $config['url_web']; ?>" class="logo">
							<i class="dripicons-cart text-primary mr-1"></i>
							<span class="hide-phone text-primary"><?php echo $config['nama_web']; ?></span>
						</a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
<?php require_once("config/web/menu-luar.php"); ?>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right"></div>
                            <h4 class="page-title"></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
<?php
$pageu = md5('page');
$getid = $_GET[$pageu];
$page = base64_decode($getid);

	if($page == "harga"){
		require_once("func/content/price.php");
	} else if($page == "harga-pulsa"){
		require_once("func/content/price_pulsa.php");
	} else if($page == "masuk"){
		require_once("func/page/login.php");
	} else if($page == "lupa-password"){
		require_once("func/page/forgot.php");
	} else if($page == "daftar"){
		require_once("func/page/register.php");
	} else if($page == "reg"){
		require_once("func/page/reg_free.php");
	} else if($page == "ketentuan"){
		require_once("func/page/terms.php");
	} else if($page == "faq"){
		require_once("func/page/faq.php");
	} else if($page == "kontak"){
		require_once("func/page/contact.php");
	} else {
		require_once("func/page/dashboard.php");
	}
?>

<?php
include("$noedit");
?>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
$(".typed").each(function() {
				var $this = $(this);
				$this.typed({
					strings: $this.attr('data-elements').split(','),
					typeSpeed: 100, // typing speed
					backDelay: 3000 // pause before backspacing
				});
			});		
</script>

    </body>
</html>