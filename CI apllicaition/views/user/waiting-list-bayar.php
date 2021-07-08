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
                    <h2>Pembayaran invoice #<?= $booked_barber['booking_id'] ?></h2>
                </div>
            </div>

            <div class="row ftco-animate">

                <div class="col-md-12 dish-menu">
                    <div class="tab-content py-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">

                                    <form action="" method="POST">


                                        <!-- <div class="container">
                            <div class="form-group"> -->
                                        <!-- HIDDEN FORM   -->
                                        <!-- booking id -->
                                        <input type="hidden" name="id" value="<?= $booked_barber['id']; ?>">

                                        <input type="hidden" name="reservation_booking_id" readonly value="">

                                        <!-- res id -->
                                        <input type="hidden" name="reservation_res_id" readonly value=""></input>

                                        <!-- c_id -->
                                        <input type="hidden" name="reservation_c_id" readonly value=""></input>

                                        <input type="hidden" name="reservation_name" class="form-control" placeholder="Your Name" value="">

                                        <input type="hidden" name="reservation_phone" class="form-control" placeholder="Phone" value="">

                                        <input type="hidden" name="reservation_date" class="form-control" placeholder="Date">

                                        <input type="hidden" min="09:00" max="18:00" name="reservation_time" class="form-control" placeholder="Time">

                                        <!-- make_date -->
                                        <input type="hidden" name="reservation_make_date" readonly value=""></input>

                                        <!-- make_time -->
                                        <input type="hidden" name="reservation_make_time" readonly value=""></input>

                                        <!-- bill -->
                                        <input type="hidden" name="reservation_bill" readonly value="0"></input>

                                        <!-- transactionid -->


                                        <!-- status -->
                                        <input type="hidden" name="reservation_status" readonly value="0"></input>

                                        <!-- reject -->
                                        <input type="hidden" name="reservation_reject" readonly value="0"></input>

                                        <!-- qty -->
                                        <input type="hidden" name="reservation_qty" readonly value="1"></input>

                                        <input type="hidden" name="reservation_selected_service" class="form-control" id="singleSelectTextDDjQuery"> </input>

                                        <!-- barber names -->
                                        <input type="hidden" name="reservation_booked_barber" readonly value=""></input>
                                        <!-- HIDDEN FORM   -->
                                        <!-- </div>
                        </div> -->

                                        <div class="col-md-12">
                                            <div class="col mb-3 border" style="background: white;">
                                                <div class="container" style="margin: 20px;">
                                                    <center>
                                                        <h4>Pembayaran :<br> <b><?= $booked_barber['booked_service']; ?></b></h4>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="col mb-3 border" style="background: white;">
                                                <h3 class="text-center">GoPay Payment</h3>
                                                <div class="row">
                                                    <div class="col-md-6" style="text-align: center;">
                                                        <img style="height: 152px; width: 152px;" src="<?php echo base_url() . "assets/"; ?>images/gopay-logo.png">
                                                        <p class="text-center">GoPay Number:</p>
                                                        <h4 class="text-center">dummy</h4>
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


                                        <div class="col-lg-12">
                                            <div class="menus d-flex">

                                                <center>
                                                    <h6><b>Nomor ID Transaksi&nbsp;</b></h6>
                                                </center>
                                                <input type="text" name="reservation_transaction_id" style="width: 100%;" value="<?= $booked_barber['transactionid']; ?>" required></input>

                                            </div>
                                        </div>

                                        <div class="col-lg-12" style="margin-top: 50px;">
                                            <center>
                                                <p id="confirm">
                                                    <input type="submit" value="Bayar" name="confirm" class="btn btn-primary py-3 px-5">
                                                </p>
                                            </center>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div><!-- END -->
                </div>

            </div>

        </div>

    </section>
</body>

</html>