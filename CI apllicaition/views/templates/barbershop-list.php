<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Barbershop</span>
        <h2>Temukan Barbershop Eksklusif Kami</h2>
        <h4>Harap <a href="<?php echo base_url() . "auth"; ?>">login</a> terlebih dahulu untuk melakukan reservasi.</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 dish-menu">

        <div class="tab-content py-5" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row">

              <?php foreach ($barber_location_searched as $barberloc) : ?>
                <div class="menus d-flex ftco-animate">
                  <div class="menu-img" style="background-image: url(<?php echo base_url() . "assets/"; ?>dashboard/user-image/);"></div>
                  <div class="text d-flex">
                    <div class="one-half">
                      <h3><?= $barberloc['users_name'] ?></h3>
                      <p><span><?= $barberloc['address'] ?></span></p>
                    </div>
                    <div class="one-third">
                        <a href="<?php echo base_url() . "auth"; ?>" class="btn btn-info" style="width: 100%;margin-top: 18px;">Silahkan Login</a>
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