<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<body>
  <section class="home-slider owl-carousel" style="height: 400px;">
    <div class="slider-item" style="background-image: url(<?php echo base_url() . "assets/"; ?>images/barber.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('c_user') ?>">Home</a></span> <span>Waiting List</span></p>
            <h1 class="mb-3">My Waiting List</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">

      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2>Waiting list anda :</h2>
        </div>
      </div>

      <div class="row ftco-animate">

        <div class="col-md-12 dish-menu">
          <div class="tab-content py-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">

                <?php foreach ($booked_barber as $bookedlist) : ?>
                  <div class="menus d-flex ftco-animate">
                    <div class="menu-img" style="background-image: url(<?php echo base_url() . "assets/"; ?>dashboard/user-image/);"></div>
                    <div class="text d-flex">
                      <div class="one-half">
                        <?php if ($bookedlist['done_state'] == 0) { ?>
                          <!-- Tidak muncul booking selesai -->
                        <?php } else { ?>
                          <p class="text-success" style="font-size: 19px;"><b>BOOKING SELESAI</b></p>
                        <?php } ?>
                        <h3><b>Invoice #<?= $bookedlist['booking_id'] ?></b></h3>
                        <p><span>Atas nama : <b><?= $bookedlist['name'] ?></b> </span></p>
                        Tanggal Reservasi : <b><?= $bookedlist['booking_date'] ?></b><br>
                        Jam Reservasi : <b><?= $bookedlist['booking_time'] ?></b><br>
                      </div>
                      <div class="one-half" style="margin-top: 5px;">
                        <p>Nama Barbershop : <br>
                          <b><?= $bookedlist['booked_barber_name'] ?></b>
                        </p>
                        <p>Jenis Layanan Barber & Total Bayar : <br>
                        <h3><b><?= $bookedlist['booked_service'] ?></b></h3>
                        </p>
                        Status Waiting List :
                        <?php if ($bookedlist['status'] == 0) { ?>
                          <p class="text-danger" style="font-size: 19px;"><b>Not Confirmed</b></p>
                        <?php } else { ?>
                          <p class="text-success" style="font-size: 19px;"><b>Confirmed</b></p>
                        <?php } ?>
                      </div>
                      <div class="one-third" style="margin-top: 30px;">
                        <?php if ($bookedlist['done_state'] == 0) { ?>
                          <a href="<?= base_url(); ?>c_user/waitinglist_bayar/<?= $bookedlist['id']; ?>" class="btn btn-info">Bayar</a>
                        <?php } else { ?>
                          <!-- Tidak muncul tombol bayar -->
                        <?php } ?>

                        <a href="<?= base_url(); ?>c_user/waitinglist_detail/<?= $bookedlist['id']; ?>" class="btn btn-warning" style="width: 100%;margin-top: 18px;">Detail</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </div><!-- END -->
        </div>

      </div>

    </div>

  </section>
</body>

</html>