						
                        <li class="has-submenu">
                                <a href="<?php echo $config['url_web']; ?>?"><i class="dripicons-device-desktop"></i><span> Dashboard </span> </a>
                            </li>                            
                           
                            <?php
							if ($data_user['level'] == "Admin") {
							?>
                        <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-content-copy"></i> <span> Fitur admin</span> </a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="#">Pengguna</a>
                                        <ul class="submenu">
                                            <li><a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("users"); ?>">Kelola User</a></li>
                                            <li><a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("catatan"); ?>">Log User</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Sosial Media</a>
                                        <ul class="submenu">
                                            <li><a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("orders"); ?>">Pesanan</a></li>
                                            <li><a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("services"); ?>">Layanan</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Saldo</a>
                                        <ul class="submenu">
                                            <li><a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("deposithis"); ?>">Deposit</a></li>
                                            <li><a href="?<?php echo paramEncrypt('staff=voucher')?>">Voucher</a></li>
                                            <li><a href="?<?php echo paramEncrypt('staff=transfer')?>">Transfer</a></li>
                                        </ul>
                                    </li>   <li><a href="?<?php echo md5("admin"); ?>=<?php echo base64_encode("news"); ?>">Berita</a></li>
                                </ul>
                            </li>
                            
							<?php
							}
							?>      
                                                        <?php
							if ($data_user['level'] == "Reseller") {
							?>
                         <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-account-multiple"></i> Fitur Reseller </a>
                                <ul class="submenu">
                                    <li><a href="?<?php echo paramEncrypt('staff=adduser')?>">Tambah User</a></li>
                                    <li><a href="?<?php echo paramEncrypt('staff=transfer')?>">Transfer Saldo</a></li>
                                </ul>
                            </li>
							<?php
							}
							?>
							<?php
							if ($data_user['level'] == "Agen") {
							?>
		         <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-account-multiple"></i> Fitur Agen </a>
                                <ul class="submenu">
                                    <li><a href="?<?php echo paramEncrypt('staff=adduseragen')?>">Tambah User</a></li>
                                    <li> <a href="?<?php echo paramEncrypt('staff=transfer')?>">Transfer Saldo</a></li>
                                </ul>
                            </li>
							<?php
							}
							?>
                            
                         <li class="has-submenu">
                                <a href="?<?php echo paramEncrypt('content=hof')?>?"><i class="dripicons-trophy"></i><span> Peringkat </span> </a>
                            </li>
                          
                        <li class="has-submenu">
                                <a href="#"><i class="dripicons-cart"></i> <span> Pemesanan </span> </a>
                                <ul class="submenu">
                                    <li><a href="?<?php echo paramEncrypt('content=order')?>">Pesanan Baru</a></li>
                                    <li><a href="?<?php echo paramEncrypt('content=riwayat')?>">Riwayat Pesanan</a></li>
                                    <li><a href="?<?php echo paramEncrypt('content=harga')?>">Daftar Layanan</a></li>
                                </ul>
                            </li>
                        
                         <li class="has-submenu">
                                <a href="#"><i class="dripicons-wallet"></i> <span> Deposit Saldo </span> </a>
                                <ul class="submenu">
                                    <li><a href="?<?php echo md5("topup"); ?>=<?php echo base64_encode("deposit"); ?>">Request Deposit</a></li>
                                    <li><a href="?<?php echo md5("topup"); ?>=<?php echo base64_encode("riwayat-deposit"); ?>">Riwayat Deposit</a></li>
                                    <li><a href="?<?php echo paramEncrypt('content=voucher')?>">Redeem Voucher</a></li>
                                </ul>
                            </li>
                         
                         <li class="has-submenu">
                                <a href="?<?php echo paramEncrypt('content=apidok')?>?"><i class="dripicons-document"></i><span> Api Dokumentasi </span> </a>
                            </li>   
                                                   
			 <li class="has-submenu">
                                <a href="#"><i class="dripicons-pamphlet"></i> <span> Halaman </span> </a>
                                <ul class="submenu">
                                    <li><a href="?<?php echo md5("topup"); ?>=<?php echo base64_encode("contact"); ?>">Kontak Admin</a></li>
                                    <li><a href="?<?php echo md5("topup"); ?>=<?php echo base64_encode("terms"); ?>">Ketentuan Layanan</a></li>
                                </ul>
                            </li>                                                         

                        </ul>