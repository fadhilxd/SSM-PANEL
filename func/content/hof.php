              <div class="row">
              <div class="col-lg-12 text-center" style="margin: 15px 0;">
								<h3 class="text-uppercase"><i class="fa fa-trophy fa-fw"></i> Pengguna Teratas</h3>
								<p>Dibawah ini merupakan top 5 pengguna dengan total pemesanan dan deposit tertinggi bulan ini.<br />Terimakasih telah menjadi pelanggan setia kami!</p>
							</div>
	<div class="col-md">
		  <div class="card shadow">
                            <div class="card-body">
                                 <h4 class="m-t-0 header-title text-center"><a><i class="mdi mdi-trophy"></i>  Top 5 Pesanan Tertinggi</a></h4>
                                 <br />
                                    <table class="table">
                                    
                                        <tr>
														<th>Peringkat</th>
														<th>Username</th>
														<th>Total Order</th>
                                        </tr>
                                        </thead>
                                        <tbody>
														<?php
														$check_hof = $tur->query("SELECT a.username as users, b.user , SUM(b.price) as total FROM users a INNER JOIN hof b ON a.username = b.user where user = a.username and b.type ='Sosmed' GROUP BY b.user ORDER BY total DESC LIMIT 5");
														$no = 1;
														while ($data_hof = mysqli_fetch_assoc($check_hof)) {
													if($no == "1") {
														$label = "success";
													} else if($no == "2") {
														$label = "info";
													} else if($no == "3") {
														$label = "warning";
													} else if($no == "4") {
														$label = "danger";
													} else if($no == "5") {
														$label = "danger";
													}
														?>
														<tr>
														<td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $no; ?></span></td>
														<td><?php echo $data_hof['users']; ?></td>
														<td>Rp <?php echo number_format($data_hof['total'],0,",",".");?></td>
														</tr>
														<?php
														$no++;
														}
														?>
      </table>
</div>
</div>
</div>
<div class="col-md">
		  <div class="card shadow">
                            <div class="card-body">
                                 <h4 class="m-t-0 header-title text-center"><a><i class="mdi mdi-trophy"></i>  Top 5 Deposit Tertinggi</a></h4>
                                 <br />
                                    <table class="table">
                                    
                                        <tr>
														<th>Peringkat</th>
														<th>Username</th>
														<th>Total Deposit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
														<?php
														$check_hof = $tur->query("SELECT a.username as users, b.user , SUM(b.price) as total FROM users a INNER JOIN hof b ON a.username = b.user where user = a.username and b.type ='Deposit' GROUP BY b.user ORDER BY total DESC LIMIT 5");
														$no = 1;
														while ($data_hof = mysqli_fetch_assoc($check_hof)) {
													if($no == "1") {
														$label = "success";
													} else if($no == "2") {
														$label = "info";
													} else if($no == "3") {
														$label = "warning";
													} else if($no == "4") {
														$label = "danger";
													} else if($no == "5") {
														$label = "danger";
													}
														?>
														<tr>
														<td align="center"><span class="badge badge-<?php echo $label; ?>"><?php echo $no; ?></span></td>
														<td><?php echo $data_hof['users']; ?></td>
														<td>Rp <?php echo number_format($data_hof['total'],0,",",".");?></td>
														</tr>
														<?php
														$no++;
														}
														?>
                                        </tbody>
                                    </table>
                                  </div>
</div>
</div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div> <!-- end wrapper -->