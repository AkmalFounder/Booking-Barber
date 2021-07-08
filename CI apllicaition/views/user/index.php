<!-- index.php -->


<body>


  <!-- END nav -->

  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo base_url() . "assets/"; ?>/images/barber.jpg)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center text-center">
          <div class="col-md-10 col-sm-12 ftco-animate">
            <h1 class="mb-3">Barber Booking</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END slider -->

  <div class="ftco-section-reservation">
    <div class="container">
      <div class="row">
        <div class="col-md-12 reservation pt-5 px-5">
          <p style="font-size: 20px; color: #000;font-weight: bold;margin-top: -30px">Mulai Reservasi</p>
          <div class="block-17" style="min-height: 100px;">

            <form action="" method="POST" class="d-block d-lg-flex">
              <div class="fields d-block d-lg-flex">
                <p style="font-size: 20px;color: #000">Lokasi</p>
                <div class="select-wrap one-half">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select class="form-control " name="area" required="">
                  <option value="" >- Pilih lokasi -</option>
                    <?php foreach ($location as $loc) : ?>
                      <option value="<?= $loc['id'] ?>"><?= $loc['location_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <input type="submit" class="search-submit btn btn-primary" name="find" value="Cari">
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery/jquery.js"></script>
  <script src="<?= base_url('assets_admin/'); ?>dashboard/vendor/select2/select2.js"></script>
  <script src="<?= base_url('assets_admin/'); ?>dashboard/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>

</body>

</html>