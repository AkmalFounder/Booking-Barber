<body>
  <section class="home-slider owl-carousel" style="height: 400px;">
    <div class="slider-item" style="background-image: url(<?php echo base_url() . "assets/"; ?>images/barber.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('c_home') ?>">Home</a></span> <span>Login</span></p>
            <h1 class="mb-3">Login</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Login</span>
          <h2>Log In Our Site</h2>
        </div>
      </div>
      <?= $this->session->flashdata('message'); ?>
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

                        <form action="<?= base_url('c_login') ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="email" name="email" class="form-control" required="" placeholder="Your Email">
                          </div>
                          <div class="form-group">
                            <input type="password" name="password" class="form-control" required="" placeholder="Your Password">
                          </div>
                          <center>
                            <div class="form-group">
                              <input type="submit" value="Login" name="login" class="btn btn-primary py-3 px-5">
                            </div>
                          </center>
                        </form>
                        <p class="text-center">Belum Punya Akun? <a href="<?php echo base_url() . "c_register"; ?>">Klik Disini.</a> </p>
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
</body>

</html>