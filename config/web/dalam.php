<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title><?php echo $config['nama_web']; ?> - Panel SMM Indonesia Terbaik</title>
        <meta property="og:description" content="<?php echo $config['nama_web']; ?> Adalah Website penyedia Layanan Social Media Termurah dan Terbaik seINDONESIA" />
        <meta name="description" content="<?php echo $config['nama_web']; ?> Adalah Website penyedia Layanan Social Media Termurah dan Terbaik seINDONESIA" />
        <meta property="og:image" content="https://<?php echo $config['url_web']; ?>" />
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
						<a href="<?php echo $config['url_web']; ?>" class="logo">
							<i class="dripicons-cart text-primary mr-1"></i>
							<span class="hide-phone text-primary"><?php echo $config['nama_web']; ?></span>
						</a>
					</div>
					<!-- End Logo container-->
					<div class="menu-extras topbar-custom">
						<ul class="list-unstyled float-right mb-0">
							<!-- User-->
							<li class="dropdown notification-list">
								<a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="<?php echo $cfg_baseurl; ?>assets/images/users/user.png" alt="user" class="rounded-circle">
								<span class="pro-user-name ml-1">
								<?php echo $data_user['username']; ?> <i class="mdi mdi-chevron-down"></i> 
								</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-dropdown border-0">
									<!-- item-->
									<div class="dropdown-item noti-title">
										<h5>Welcome</h5>
									</div>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?<?php echo paramEncrypt('content=pengaturan')?>"><i class="dripicons-gear m-r-5 text-muted"></i> Pengaturan akun</a> 
									<a class="dropdown-item" href="?<?php echo paramEncrypt('content=logmasuk')?>"><i class="dripicons-pulse m-r-5 text-muted"></i> Log aktifitas</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo $config['url_web']; ?>logout.php"><i class="dripicons-exit m-r-5 text-muted"></i> Logout</a>
								</div>
							</li>
							<li class="menu-item list-inline-item float-right">
                                <!-- Mobile menu toggle--> 
                                <a class="navbar-toggle nav-link">
                                  <div class="lines">
                                    <span>
                                    </span> 
                                    <span>
                                    </span> 
                                    <span>
                                    </span>
                                  </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
						</ul>
					</div><!-- end menu-extras -->
					<div class="clearfix">
					</div>
				</div><!-- end container -->
			</div><!-- end topbar-main -->
                        </div>
                    </div>

                </div>
            </div>

			

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
<?php require_once("config/web/menu-dalam.php"); ?>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


       <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li>
                                    <li class="breadcrumb-item active"></li>
                                </ol>
                            </div>
                            <h4 class="page-title"></h4>
                        </div>
                    </div>
                </div> 
              
<?php
$check_user22 = $tur->query("SELECT * FROM orders WHERE user = '$sess_username'");
$data_order22 = mysqli_num_rows($check_user22);    
$var=decode($_SERVER['REQUEST_URI']);
$content=$var['content'];
$staff=$var['staff'];
$control=$var['control'];

$sit = md5('admin');
$getu = $_GET[$sit];
$admin = base64_decode($getu);

$u = md5('topup');
$p = $_GET[$u];
$topup = base64_decode($p);

	if($content == "pengaturan"){
		require_once("func/content/setting.php");
	} else if($content == "hof"){
		require_once("func/content/hof.php");
	} else if($content == "voucher"){
		require_once("func/content/voucher.php");
	} else if($content == "order"){
		require_once("func/content/order.php");
	} else if($content == "profile"){
		require_once("func/content/profile.php");
	} else if($content == "riwayat"){
		require_once("func/content/order_history.php");
	} else if($content == "logmasuk"){
		require_once("func/content/log_masuk.php");
	} else if($content == "grafik"){
		require_once("func/content/grafik.php");
	} else if($content == "harga"){
		require_once("func/content/price.php");
	} else if($content == "apidok"){
		require_once("func/content/api.php");
	} else if($content == "view"){
		require_once("func/content/view.php");
	} else if($content == "view_berita"){
		require_once("func/content/view_berita.php");
	} else if($content == "mutasi"){
		require_once("func/content/mutasi.php");
	} else if($topup == "deposit"){
		require_once("func/content/deposit.php");
	} else if($topup == "n"){
		require_once("func/content/n.php");
	} else if($topup == "riwayat-deposit"){
		require_once("func/content/deposit_history.php");
	} else if($topup == "terms"){
		require_once("func/page/terms.php");
	} else if($topup == "contact"){
		require_once("func/page/contact.php");
	} else if($admin == "adduser"){
		require_once("func/content/add_user.php");
	} else if($admin == "grafik"){
		require_once("func/control/grafik.php");
	} else if($admin == "catatan"){
		require_once("func/control/catatan.php");
	} else if($admin == "voucher"){
		require_once("func/control/voucher.php");
	} else if($admin == "users"){
		require_once("func/control/users/users.php");
	} else if($admin == "services"){
		require_once("func/control/services/services.php");
	} else if($admin == "orders"){
		require_once("func/control/orders/orders.php");
	} else if($admin == "news"){
		require_once("func/control/news/news.php");
	} else if($admin == "deposithis"){
		require_once("func/control/deposit/deposit.php");
	} else if($staff == "voucher"){
		require_once("func/control/voucher.php");
	} else if($staff == "transfers"){
		require_once("func/control/transfers.php");
	} else if($staff == "transfer"){
		require_once("func/control/transfer.php");
	} else if($staff == "adduser"){
		require_once("func/control/adduser.php");
	} else if($staff == "adduseragen"){
		require_once("func/control/agen/adduser.php");
	} else if($staff == "adduserreseller"){
		require_once("func/control/reseller/adduser.php");
	} else if($control == "add-news"){
		require_once("func/control/news/add.php");
	} else if($control == "delete-news"){
		require_once("func/control/news/delete.php");
	} else if($control == "add-services"){
		require_once("func/control/services/add.php");
	} else if($control == "delete-services"){
		require_once("func/control/services/delete.php");
	} else if($control == "add-services-pulsa"){
		require_once("func/control/services_pulsa/add.php");
	} else if($control == "delete-services-pulsa"){
		require_once("func/control/services_pulsa/delete.php");
	} else if($control == "add-users"){
		require_once("func/control/users/add.php");
	} else if($control == "delete-users"){
		require_once("func/control/users/delete.php");
	} else if($control == "add-depo"){
		require_once("func/control/depo_method/add.php");
	} else if($control == "delete-depo"){
		require_once("func/control/depo_method/delete.php");
	} else {
		require_once("func/content/dashboard.php");
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

        <!--Morris Chart-->
        <script src="assets/morris/morris.js"></script>
        <script src="assets/morris/morris.min.js"></script>
        <script src="assets/morris/raphael-min.js"></script>
        <script src="assets/morris/morris.init.js"></script>

          <script>
!function($) {
    "use strict";

    var MorrisCharts = function() {};

    //creates line chart
    MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            fillOpacity: opacity,
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            behaveLikeLine: true,
            gridLineColor: '#eef0f2',
            lineWidth: 1,
            hideHover: 'auto',
            resize: true, //defaulted to true
            lineColors: lineColors
        });
    },
        MorrisCharts.prototype.init = function() {

            //create line chart
            var $data  = [
        {y: '<?php echo $today; ?>', x: <?php echo mysqli_num_rows($check_order_today); ?>, z: <?php echo mysqli_num_rows($check_order_today_pulsa); ?>},
        {y: '<?php echo $oneday_ago; ?>', x: <?php echo mysqli_num_rows($check_order_oneday_ago); ?>, z: <?php echo mysqli_num_rows($check_order_oneday_ago_pulsa); ?>},
        {y: '<?php echo $twodays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_twodays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_twodays_ago_pulsa); ?>},
        {y: '<?php echo $threedays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_threedays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_threedays_ago_pulsa); ?>},
        {y: '<?php echo $fourdays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_fourdays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_fourdays_ago_pulsa); ?>},
        {y: '<?php echo $fivedays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_fivedays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_fivedays_ago_pulsa); ?>},
        {y: '<?php echo $sixdays_ago; ?>', x: <?php echo mysqli_num_rows($check_order_sixdays_ago); ?>, z: <?php echo mysqli_num_rows($check_order_sixdays_ago_pulsa); ?>}
            ];
            this.createLineChart('fatur', $data, 'y', ['x'], ['Total Pembelian'],['0.1'],['#ffffff'],['#999999'], ["#008000", "#FF0000"]);
        },
        //init
        $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
    function($) {
        "use strict";
        $.MorrisCharts.init();
    }(window.jQuery);
</script>

        <script>
!function($) {
    "use strict";

    var MorrisCharts = function() {};

    //creates line chart
    MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            fillOpacity: opacity,
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            behaveLikeLine: true,
            gridLineColor: '#eef0f2',
            lineWidth: 1,
            hideHover: 'auto',
            resize: true, //defaulted to true
            lineColors: lineColors
        });
    },
        MorrisCharts.prototype.init = function() {

            //create line chart
            var $data  = [
        {y: '<?php echo $today; ?>', a: <?php echo mysqli_num_rows($check_order_today_admin); ?>, b: <?php echo mysqli_num_rows($check_order_today_pulsa_admin); ?>},
        {y: '<?php echo $oneday_ago; ?>', a: <?php echo mysqli_num_rows($check_order_oneday_ago_admin); ?>, b: <?php echo mysqli_num_rows($check_order_oneday_ago_pulsa_admin); ?>},
        {y: '<?php echo $twodays_ago; ?>', a: <?php echo mysqli_num_rows($check_order_twodays_ago_admin); ?>, b: <?php echo mysqli_num_rows($check_order_twodays_ago_pulsa_admin); ?>},
        {y: '<?php echo $threedays_ago; ?>', a: <?php echo mysqli_num_rows($check_order_threedays_ago_admin); ?>, b: <?php echo mysqli_num_rows($check_order_threedays_ago_pulsa_admin); ?>},
        {y: '<?php echo $fourdays_ago; ?>', a: <?php echo mysqli_num_rows($check_order_fourdays_ago_admin); ?>, b: <?php echo mysqli_num_rows($check_order_fourdays_ago_pulsa_admin); ?>},
        {y: '<?php echo $fivedays_ago; ?>', a: <?php echo mysqli_num_rows($check_order_fivedays_ago_admin); ?>, b: <?php echo mysqli_num_rows($check_order_fivedays_ago_pulsa_admin); ?>},
        {y: '<?php echo $sixdays_ago; ?>', a: <?php echo mysqli_num_rows($check_order_sixdays_ago_admin); ?>, b: <?php echo mysqli_num_rows($check_order_sixdays_ago_pulsa_admin); ?>}
            ];
            this.createLineChart('tampan', $data, 'y', ['a', 'b'], ['Total Pembelian', 'Total Pesanan Pulsa'],['0.1'],['#ffffff'],['#999999'], ["#008000", "#FF0000"]);
        },
        //init
        $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
    function($) {
        "use strict";
        $.MorrisCharts.init();
    }(window.jQuery);
</script>

<script>
$(document).ready(function(){
      /* Call Simple Alert on Button Click  */
     $('button').click(function(){            
          sweetAlert('Pesanan Anda Telah Diterima.');   
          // or can be swal('Simpel Alert');
     });
})
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>
<script type="text/javascript">
$('#popup-news').modal('show');
</script>
<script type="text/javascript">
$(document).ready(function() {
	$(".loading-screen").fadeOut();
});

function show_loading_screen() {
	$('.loading-screen').fadeIn();
	$('#form-ajax-result').html('');
}

function hide_loading_screen() {
	$('.loading-screen').fadeOut();
}

var clipboard = new ClipboardJS('.btn-copy');
clipboard.on('success', function(e) {
	console.info('Action:', e.action);
	console.info('Text:', e.text);
	console.info('Trigger:', e.trigger);
});
clipboard.on('error', function(e) {
	console.error('Action:', e.action);
	console.error('Trigger:', e.trigger);
});
</script>
    </body>

</html>