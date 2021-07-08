<!-- select-menu.php -->
<?php
if (isset($_POST['confirm'])) {
	include 'dbCon.php';
	$con = connect();

	$res_id = $_POST['res_id'];
	$reservation_name = $_POST['reservation_name'];
	$reservation_phone = $_POST['reservation_phone'];
	$reservation_date = $_POST['reservation_date'];
	$reservation_time = $_POST['reservation_time'];

	$Rinsql = "SELECT * from users_info WHERE id = '$res_id';";
	$Rinresult = $con->query($Rinsql);
	foreach ($Rinresult as $rri) {
		$bkashnumber = $rri['bkashnumber'];
	}

	include 'template/header.php'; ?>

	<body>

		<?php include 'template/nav-bar.php'; ?>
		<!-- END nav -->

		<section class="home-slider owl-carousel" style="height: 400px;">
			<div class="slider-item" style="background-image: url('images/barber.jpg');" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text align-items-center justify-content-center">
						<div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
							<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Booking</span></p>
							<h1 class="mb-3">Booking</h1>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-5">
					<div class="col-md-7 text-center heading-section ftco-animate">
						<span class="subheading">Booking</span>
						<h2>Konfirmasi Booking Anda</h2>
					</div>
				</div>
				<div class="row block-9 mb-4">
					<div class="col-md-6 pr-md-5 flex-column">
						<div class="row d-block flex-row">
							<h2 class="h4 mb-4">Informasi Kontak</h2>
							<div class="col mb-3 d-flex py-4 border" style="background: white;">
								<div class="align-self-center">
									<p class="mb-0"><span>Nama :</span> <a href=""><?php echo $reservation_name; ?></a></p>
									<p class="mb-0"><span>No. Telp : </span> <a href=""><?php echo $reservation_phone; ?></a></p>
									<p class="mb-0"><span>Tanggal Reservasi :</span> <a href=""><?php echo $reservation_date; ?></a></p>
									<p class="mb-0"><span>Waktu Reservasi :</span> <a href=""><?php echo $reservation_time; ?></a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 pr-md-5 flex-column">
						<div class="row d-block flex-row">
							<h2 class="h4 mb-4">Review Layanan Barbershop</h2>
							<div class="col mb-3 d-flex py-4 border" style="background: white;">
								<div class="align-self-center" style="width: 100%">
									<table style="width: 100%">
										<thead>
											<tr>
												<th>Image</th>
												<th>Nama Service</th>
												<th>Harga</th>
												<th>Quantity</th>
												<th>Total</th>
											</tr>

										</thead>
										<tbody>
											<?php

											$total_price = 0;
											for ($i = 0; $i < count($_POST["item"]); $i++) {
												$i_id = $_POST['item'][$i];
												$qty = $_POST["qty"][$i];
												//echo $qty;

												$c = 1;
												$Itmsql = "SELECT * FROM `menu_item` WHERE id = '$i_id';";
												$Itmresult = $con->query($Itmsql);
												foreach ($Itmresult as $itmr) {
													//echo $itmr['price'];
													$total_price = $total_price + ($qty * $itmr['price']);
											?>
													<tr>
														<td><img style="height: 40px;width: 40px;" src="dashboard/item-image/<?php echo $itmr['image']; ?>">
														</td>
														<td><?php echo $itmr['item_name']; ?></td>
														<td><?php echo $itmr['price']; ?></td>
														<td><?php echo $qty; ?></td>
														<td><?php echo $qty * $itmr['price']; ?></td>
													</tr>
											<?php $c++;
												}
											} ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col mb-3 d-flex py-4 border" style="background: white;">
								<div class="align-self-center">
									<p class="mb-0"><span>Total Harga :</span> Rp. <a href=""><?php echo $total_price; ?></a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col mb-3 border" style="background: white;">
							<h3 class="text-center">Pembayaran</h3>
							<div class="row">
								<div class="col-md-6" style="text-align: center;">
									<img style="height: 152px; width: 152px;" src="images/gopay-logo.png">
									<p class="text-center">GoPay Number:</p>
									<h6 class="text-center"><?php echo $bkashnumber; ?>dummy</h6>
								</div>
								<div class="col-md-6">
									<h6>Cara bayar:</h6>
									<ol>
										<li>Lihat gopay number</li>
										<li>Kirim jumlah tagihan sesuai dengan nominal yang harus dibayar</li>
										<li>Masukan nomor transaksi dari struk gopay untuk verifikasi pembayaran oleh pihak barbershop</li>
										<li>Pastikan nomor transaksi gopay tidak keliru</li>
										<li>Jika nomor transaksi gopay keliru dan uang sudah masuk, maka akan di refund segera</li>
									</ol>
								</div>
							</div>
						</div>
					</div>

					<form action="manage-insert.php" method="POST">
						<div class="col-lg-12" style="text-align: center;">
							<div class="form-group">
								<input type="text" name="transaction_id" class="form-control" placeholder="No Transaksi" required="">
							</div>
							<input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
							<input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
							<input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
							<input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
							<input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
							<input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
							<?php for ($t = 0; $t < count($_POST["item"]); $t++) {
								$i_id = $_POST['item'][$t];
								$qty = $_POST['qty'][$t];
							?>
								<input type="hidden" name="item[]" value="<?php echo $i_id; ?>">
								<input type="hidden" name="qty[]" value="<?php echo $qty; ?>">
							<?php } ?>
							<input type="submit" value="Book" name="book" class="btn btn-primary py-3 px-5">
						</div>
					</form>
				</div>
		</section>

		<?php include 'template/footer.php'; ?>

		<?php include 'template/script.php'; ?>

	</body>

	</html>
<?php } ?>