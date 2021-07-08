<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Barbershop</span>
        <h2>Temukan Barbershop Eksklusif Kami</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 dish-menu">

        <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class=""></span> List Barbershop</a>
        </div>

        <div class="tab-content py-5" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row">

              <?php foreach ($barber_location as $barberloc) : ?>
                <div class="menus d-flex ftco-animate">
                  <div class="menu-img" style="background-image: url(<?php echo base_url() . "assets/"; ?>dashboard/user-image/);"></div>
                  <div class="text d-flex">
                    <div class="one-half">
                      <h3><?= $barberloc['users_name'] ?></h3>
                      <p><span><?= $barberloc['address'] ?></span></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              
            </div>
          </div><!-- END -->
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section bg-light">
  <div class="container special-dish">

    <h3 style="text-align: center;">About</h3>
    <center>
      Dapatkan pemesanan online 24/7 dengan aplikasi Barber Booking.
      Cociks bagi anda yang tidak suka mengantri dan ingin mendapat pelayanan yang instan.
    </center>
  </div>
</section>