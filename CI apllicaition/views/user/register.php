<body>
  <section class="home-slider owl-carousel" style="height: 400px;">
    <div class="slider-item" style="background-image: url(<?php echo base_url() . "assets/"; ?>images/barber.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url() . "c_home" ?>">Home</a></span> <span>Registrasi</span></p>
            <h1 class="mb-3">Registrasi</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Registrasi</span>
          <h2>Register In Our Site</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 dish-menu">

          <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class=""></span> Sebagai Customer</a>
            <a class="nav-link py-3 px-4" id="v-pills-profile-tab" href="<?= base_url(); ?>c_reg_barber"><span class=""></span> Sebagai Pemilik Barbershop</a>
          </div>

          <!--register as customer-->
          <div class="tab-content py-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                  <div class="menus d-flex ftco-animate" style="background: white;">
                    <div class="row" style="width: 100%">
                      <div class="col-md-12">

                        <!-- register as customer -->
                        <form action="<?php base_url() . "auth/register" ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="text" name="fullname" class="form-control" required="" placeholder="Your Name">
                          </div>
                          <div class="form-group">
                            <input type="email" name="email" class="form-control" required="" placeholder="Your Email">
                          </div>
                          <div class="form-group">
                            <input type="text" name="phone" class="form-control" required="" placeholder="Your Phone (+62)">
                          </div>
                          <div class="form-group">
                            <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="Address"></textarea>
                          </div>
                          <div class="form-group">
                            <input type="password" name="password" class="form-control" required="" placeholder="Your Password">
                          </div>
                          <!-- <div class="form-group">
                            <input type="file" id="image" name="image" class="form-control" required="">
                          </div> -->
                          <center>
                            <div class="form-group">
                              <input type="submit" value="Register" name="regascus" class="btn btn-primary py-3 px-5">
                            </div>
                          </center>
                        </form>
                        <p class="text-center">Sudah Punya Akun? <a href="<?php echo base_url() . "auth"; ?>">Klik Disini</a> </p>
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