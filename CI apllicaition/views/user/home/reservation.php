<!-- reservation.php -->
<?php include 'template/header.php';

include 'dbCon.php';
if (!isset($_SESSION['isLoggedIn'])) {
  echo '<script>alert("You need to login first.")</script>';
  echo '<script>window.location="login.php"</script>';
}
?>


<body>

  <?php include 'template/nav-bar.php'; ?>
  <!-- END nav -->

  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-10 col-sm-12 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2" style="background: blue"><a href="index.php">Home</a></span> <span>Reservasi</span></p>
            <h1 class="mb-3">Reservasi</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="ftco-section-reservation">
    <div class="container">
      <div class="row">
        <div class="col-md-12 reservation pt-5 px-5">
          <p style="font-size: 20px; color: blue;font-weight: bold;margin-top: -30px">Buat Reservasi</p>
          <div class="block-17" style="min-height: 100px;">

            <form action="barbershop-list.php" method="POST" class="d-block d-lg-flex">
              <div class="fields d-block d-lg-flex">
                <p style="font-size: 20px;color: blue">Lokasi</p>
                <div class="select-wrap one-half">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select data-plugin-selectTwo class="form-control populate" name="area" required="" style="cursor: pointer;">
                    <option value=""> -Pilih- </option>
                    <?php
                    $con = connect();
                    $sql = "SELECT * FROM `locations`;";
                    $result = $con->query($sql);
                    foreach ($result as $r) {
                    ?>
                      <option value="<?php echo $r['id']; ?>"><?php echo $r['location_name']; ?></option>
                    <?php } ?>
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

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row no-gutters justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2>Pilih Waktu Reservasi</h2>
        </div>
      </div>

      <?php
      $sql = "SELECT * FROM `users_info` where id ='';";
      $resultbro = $con->query($sql);
      foreach ($resultbro as $r2) {
      ?>
        <!-- <div class="ib">
          <img style="width: 174px;height: 69px;" />
        </div> -->
        <div class="row d-flex">

          <div class="col-md-4 ftco-animate img" style="background-image: url(dashboard/user-image/<?php echo $r2['logo']; ?>);"></div>
          <!-- <img style="width: 250px;height: 300px;" src="" /> -->
          <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
          <?php } ?>


          <form action="select-menu.php" method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" name="reservation_name" class="form-control" placeholder="Your Name" required="" value="<?php echo $_SESSION['name']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">No. Telp</label>
                  <input type="text" name="reservation_phone" class="form-control" placeholder="Phone" required="" value="<?php echo $_SESSION['phone']; ?>">
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
                  <label for="">Waktu</label>
                  <select name="reservation_time" class="form-control" placeholder="Time" required="">
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
                  </select>
                </div>
              </div>

              <div class="col-md-12 mt-3">
                <div class="form-group">
                  <input type="hidden" name="res_id" value="<?php echo $_GET['res_id']; ?>">
                  <input type="submit" name="reservation" value="Submit" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
    </div>
  </section>

  <?php include 'template/footer.php'; ?>

  <?php include 'template/script.php'; ?>


</body>

</html>