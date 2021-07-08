<!-- select-menu.php -->
<?php
if (isset($_POST['reservation'])) {
  $res_id = $_POST['res_id'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];
?>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <body>
    <!-- END nav -->

    <section class="home-slider owl-carousel" style="height: 400px;">
      <div class="slider-item" style="background-image: url(<?php echo base_url() . "assets/"; ?>images/barber.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
              <h1 class="mb-3">Our Exclusive Services</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <form action="book.php" method="POST">
      <section class="ftco-section bg-light">
        <div class="container">
          <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span class="subheading">Servis Kami</span>
              <h2>Temukan Servis Ekslusif Kami</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 dish-menu">

              <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class=""></span>Servis</a>
                <!-- <a class="nav-link py-3 px-4" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span class="flaticon-cutlery"></span> Dessert</a>
                <a class="nav-link py-3 px-4" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span class="flaticon-cheers"></span> Drinks</a> -->
              </div>

              <div class="tab-content py-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="row">
                    <div class="col-lg-12">
                      <?php
                      include 'dbCon.php';
                      $con = connect();
                      $sql = "SELECT * FROM `menu_item` WHERE res_id = '$res_id';";
                      $result = $con->query($sql);
                      foreach ($result as $r) {
                      ?>
                        <div class="menus d-flex ftco-animate">
                          <div class="menu-img" style="background-image: url(<?php echo base_url() . "assets/"; ?>dashboard/item-image/<?php echo $r['image']; ?>);"></div>
                          <div class="text d-flex">
                            <div class="one-half" style="width: calc(100% - 200px);">
                              <h3><?php echo $r['item_name']; ?></h3>
                              <!-- <p><span><?php echo $r['madeby']; ?></p> -->
                            </div>
                            <div class="one-half" style="text-align: center;">
                              <span class="price" style="font-size: 20px;">Rp. <?php echo $r['price']; ?></span>
                            </div>
                            <div class="one-forth" style="text-align: center;">
                              <input readonly type="hidden" name="qty[]" min="1" max="1" value="1" style="width: 100%;margin-left: 23px;margin-top: 18px;">
                              <input type="checkbox" style="transform: scale(1.5); width: 100%;margin-left: 23px;margin-top: 18px;" name="item[]" value="<?php echo $r['id']; ?>" id="menu[]" class="menu">
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div><!-- END -->
              </div>

            </div>
            <div class="col-md-4">
              <h2 class="h4 mb-4">Info Reservasi</h2>
              <div class="d-flex ftco-animate">
                <div class="col-md-12 flex-column">
                  <div class="row d-block flex-row">
                    <div class="col mb-2 d-flex py-4 border" style="background: white;">
                      <div class="align-self-center">
                        <p class="mb-0"><span>Tanggal Reservasi :</span> <a href=""><?php echo $reservation_date; ?></a></p>
                      </div>
                    </div>
                    <div class="col mb-2 d-flex py-4 border" style="background: white;">
                      <div class="align-self-center">
                        <p class="mb-0"><span>Waktu Reservasi :</span> <a href=""><?php echo $reservation_time; ?></a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12" style="text-align: center;">
              <input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
              <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
              <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
              <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
              <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
              <p style="display: none" id="confirm"><input type="submit" value="Confirm" name="confirm" class="btn btn-primary py-3 px-5"></p>

            </div>
          </div>
        </div>
      </section>
    </form>
  </body>

  </html>
<?php } ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
      // alert($('.menu:checked').length);

      var btnconfirm = document.getElementById("confirm");
      var maxchecked = $('.menu:checked').length;
      // alert(maxchecked) 
      if (maxchecked > 0) {
        btnconfirm.style.display = "block";
      } else {
        btnconfirm.style.display = "none";
      }


    });
  });
</script>