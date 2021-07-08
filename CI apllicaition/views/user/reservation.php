<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<body>
  <section class="home-slider owl-carousel" style="height: 400px;">
    <div class="slider-item" style="background-image: url(<?php echo base_url() . "assets/"; ?>images/barber.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('c_user') ?>">Home</a></span> <span>Reservation</span></p>
            <h1 class="mb-3">Reservasi <?= $barber['users_name']; ?></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2>Silahkan melakukan reservasi :</h2>
        </div>
      </div>

      <div class="row ftco-animate">
        <div class="col-md-12 dish-menu">
          <div class="tab-content py-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">

                  <?php
                  function generateRandomString($length = 10)
                  {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                      $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                  }
                  ?>

                  <form action="" method="POST">
                    <div class="row">

                      <!-- <div class="container">
                            <div class="form-group"> -->
                      <?php
                      date_default_timezone_set("Asia/Jakarta");
                      $make_time = date("h:i:sa");
                      $make_date = date("Y-m-d");
                      ?>
                      <!-- HIDDEN FORM   -->
                      <!-- booking id -->
                      <input type="hidden" name="reservation_booking_id" readonly value="<?= generateRandomString(); ?>">

                      <!-- res id -->
                      <input type="hidden" name="reservation_res_id" readonly value="<?= $barber['id']; ?>"></input>

                      <!-- c_id -->
                      <input type="hidden" name="reservation_c_id" readonly value="<?= $this->session->userdata('id'); ?>"></input>

                      <!-- make_date -->
                      <input type="hidden" name="reservation_make_date" readonly value="<?= $make_date; ?>"></input>

                      <!-- make_time -->
                      <input type="hidden" name="reservation_make_time" readonly value="<?= $make_time; ?>"></input>

                      <!-- bill -->
                      <input type="hidden" name="reservation_bill" readonly value="0"></input>

                      <!-- transactionid -->
                      <input type="hidden" name="reservation_transaction_id" readonly value=""></input>

                      <!-- status -->
                      <input type="hidden" name="reservation_status" readonly value="0"></input>

                      <!-- reject -->
                      <input type="hidden" name="reservation_reject" readonly value="0"></input>

                      <!-- qty -->
                      <input type="hidden" name="reservation_qty" readonly value="1"></input>

                      <!-- done state -->
                      <input type="hidden" name="reservation_done_state" readonly value="0"></input>

                      <!-- barber names -->
                      <input type="hidden" name="reservation_booked_barber" readonly value="<?= $barber['users_name']; ?>"></input>
                      <!-- HIDDEN FORM   -->
                      <!-- </div>
                        </div> -->

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Nama</label>
                          <input type="text" name="reservation_name" class="form-control" placeholder="Your Name" required="" value="<?= $this->session->userdata('users_name'); ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">No. Telp</label>
                          <input type="text" name="reservation_phone" class="form-control" placeholder="Phone" required="" value="<?= $this->session->userdata('phone'); ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Tanggal</label>
                          <input type="date" name="reservation_date" class="form-control" placeholder="Date" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Waktu Reservasi</label>
                          <input type="time" min="09:00" max="18:00" name="reservation_time" class="form-control" placeholder="Time" required="">
                          <!-- <select >
                                <option value="10:00am">10:00am</option>
                                <option value="10:45am">10:45am</option>
                                <option value="11:30am">11:30am</option>
                                <option value="12:15pm">12:15pm</option>
                                <option value="1:15pm">1:15pm</option>
                                <option value="2:15pm">2:15pm</option>
                                <option value="3:15pm">3:15pm</option>
                                <option value="4:15pm">4:15pm</option>
                                <option value="5:15pm">5:15pm</option>
                                <option value="6:15pm">6:15pm</option>
                                <option value="7:15pm">7:15pm</option>
                                <option value="8:00pm">8:00pm</option>
                                <option value="8:45pm">8:45pm</option>
                                <option value="9:30pm">9:30pm</option>
                            </select> -->
                        </div>
                      </div>

                      <div class="col-lg-12" style="margin-top: 50px;">
                        <center>
                          <h3>Pilih paket layanan barber :</h3>
                        </center>
                      </div>

                      <div class="col-lg-12" style="margin-top: 20px;">
                        <div class="menus d-flex">
                          <select name="reservation_selected_service" class="form-control" placeholder="Paket" id="singleSelectTextDDjQuery" required="">
                            <?php foreach ($service_list as $ser_list) : ?>
                              <option value="<?= $ser_list['item_name']; ?> | Rp. <?= $bills = $ser_list['price']; ?>"><?= $ser_list['item_name']; ?> | Rp. <?= $bills = $ser_list['price']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <!-- unsued JS input -->
                      <input type="hidden" id="textFieldTextJQ" class="form-control" placeholder="get value on option select">
                      <!-- bruh -->

                      <div class="col-lg-12" style="margin-top: 50px;">
                        <center>
                          <input type="checkbox" style="transform: scale(1.5); margin-left: 23px;margin-top: 19px;" name="item[]" value="" id="menu[]" class="menu" required>&nbsp;
                          Saya setuju dan mengerti mengenai <a href="">Syarat dan Ketentuan</a> yang berlaku.
                        </center>
                      </div>

                      <div class="col-lg-12" style="margin-top: 50px;">
                        <center>
                          <p style="display: none" id="confirm">
                            <input type="submit" value="Confirm" name="confirm" class="btn btn-primary py-3 px-5">
                          </p>
                        </center>
                      </div>

                    </div>
                  </form>

                </div>
              </div>
            </div><!-- END -->

          </div>
        </div>
      </div>
    </div>
  </section>
</body>

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

<script type="text/javascript">
  $("#singleSelectTextDDjQuery").on("change", function() {
    //Getting Value
    var selValue = $("#singleSelectTextDDjQuery :selected").text();
    //Setting Value
    $("#textFieldTextJQ").val(selValue);
  });
</script>

</html>