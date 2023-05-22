                          <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu">
                                <a href="<?php echo $config['url_web']; ?>?"><i class="dripicons-device-desktop"></i>Dashboard</a>
                            </li>
                            
                            <li class="has-submenu">
                                <a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("masuk"); ?>" aria-expanded="false"><i class="dripicons-skip"></i>Login</a>
                            </li>
                            
                            <li class="has-submenu">
                                <a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("reg"); ?>" aria-expanded="false"><i class="dripicons-user-group"></i>Daftar </a>
                            </li>
                            
                            <li class="has-submenu">
                                <a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("harga"); ?>" aria-expanded="false"><i class="dripicons-tags"></i>Daftar harga</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="dripicons-pamphlet"></i>Halaman</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("kontak"); ?>"></i>Kontak Admin</a></li>
                                            <li><a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("ketentuan"); ?>"></i>Ketentuan layanan</a></li>
                                            <li><a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("faq"); ?>"></i>Pertanyaan umum</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
                          