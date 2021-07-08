<!-- my-booking.php -->
<?php include 'template/header.php';
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}

?>

<body>

  <?php include 'template/nav-bar.php'; ?>
  <!-- END nav -->

  <section class="home-slider owl-carousel" style="height: 400px;">
    <div class="slider-item" style="background-image: url('images/barber.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>My Booking</span></p>
            <h1 class="mb-3">My Booking</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">My Booking</span>
          <h2>Invoice Anda</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 dish-menu">


          <div class="tab-content py-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                  <div class="menus d-flex ftco-animate" style="background: white;">
                    <div class="row" style="width: 100%">
                        <div class="col-md-12">
                        <?php
                            include 'dbCon.php';
                            $con = connect();
                            $identifier = $_SESSION['id'];
                        ?>
                        <div class="invoice">
							<header class="clearfix">
								<div class="row">
									<div class="col-sm-4 mt-md">
										<h2 class="h2 mt-none mb-sm text-dark text-bold">INVOICE</h2>
										<h4 class="h4 m-none text-dark text-bold">Number</h4>
									</div>
									<?php
									$res_id = $_SESSION['id'];
									$sql = "SELECT * FROM `users_info` where id = '$identifier';";
									$result = $con->query($sql);
									foreach ($result as $r) {
									?>
										<div class="col-sm-8 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												<b class="text-capitalize"><?php echo $r['users_name']; ?></b>
												<br />
												<?php echo $r['address']; ?>
												<br />
												Phone: <?php echo $r['phone']; ?>
												<br />
												<?php echo $r['email']; ?>
											</address>
											
										</div>
									<?php } ?>
								</div>
							</header>
							<?php
							$booking_number = $_SESSION['id'];
							$sql2 = "SELECT * FROM `booking_details` where c_id = '$booking_number';";
							$result2 = $con->query($sql2);
							foreach ($result2 as $r2) {
								$booking_date = $r2['booking_date'];
								$booking_time = $r2['booking_time'];
                                $booking_kode = $r2['booking_id'];
								$booking_name = $r2['name'];
								$booking_phone = $r2['phone'];
                                $booking_biils = $r2['bill'];
                                $booking_transaction = $r2['transactionid'];
                                $booking_status = $r2['status'];
							} ?>
                            <h4 class="h4 m-none text-dark text-bold">#<?php echo $booking_kode; ?></h4>
							<div class="bill-info">
								<div class="row">
									<div class="col-md-6">
										<div class="bill-to">
											<p class="h5 mb-xs text-dark text-semibold"></p>
											<address>
                                            
                                            Kode struk GoPay <br> <b><?php echo $booking_transaction; ?></b> <br>
                                            <?php
											if ($booking_status == 0) {
											?>
												<p class="text-danger" style="font-size: 25px;">Not Confirmed</p>
											<?php } else { ?>
												<p class="text-success" style="font-size: 25px;">Confirmed</p>
											<?php } ?>
											</address>
										</div>
									</div>
									<div class="col-md-6">
										<div class="bill-data text-right">
											<p class="mb-none">
												<span class="text-dark">Booking Date:</span>
												<span class="value"><?php echo $booking_date; ?></span>
											</p>
											<p class="mb-none">
												<span class="text-dark">Booking Time:</span>
												<span class="value"><?php echo $booking_time; ?></span>
											</p>
										</div>
									</div>
								</div>
							</div>

							<div class="invoice-summary">
								<div class="row">
									<div class="col-sm-4 col-sm-offset-8">
										<table class="table h5 text-dark">
											<tbody>
												<tr class="h4">
													<td colspan="2">Grand Total</td>
													<td class="text-left">Rp. <?php echo $booking_biils; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

                        <p class="text-center">Silahkan tunjukan/print invoice kepada kasir barber bila perlu.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- END -->

          </div>
        </div>
      </div>
    </div>
  </section>


  <?php include 'template/footer.php'; ?>

  <?php include 'template/script.php'; ?>

</body>

</html>