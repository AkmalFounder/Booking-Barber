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
                    <h2>Detail invoice #<?= $booked_barber['booking_id'] ?></h2>
                </div>
            </div>

            <div class="row ftco-animate">

                <div class="col-md-12 dish-menu">
                    <div class="tab-content py-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <div class="menus d-flex ftco-animate" style="background: white;">
                                        <div class="row" style="width: 100%">
                                            <div class="col-md-12">

                                                <div class="invoice">
                                                    <header class="clearfix">
                                                        <center>
                                                            <h3 class="h3 m-none text-dark text-bold"><?php echo $booked_barber['booked_barber_name']; ?></h3>
                                                        </center>
                                                        <div class="row">

                                                            <div class="col-sm-4 mt-md">
                                                                <h4 class="h4 mt-none mb-sm text-dark text-bold">INVOICE #<?php echo $booked_barber['booking_id']; ?></h4>

                                                            </div>
                                                            <div class="col-sm-8 text-right mt-md mb-md">

                                                                <address class="ib mr-xlg">
                                                                    <b class="text-capitalize"><?php echo $booked_barber['name']; ?></b>
                                                                    <br />
                                                                    Phone: <?php echo $booked_barber['phone']; ?>
                                                                </address>

                                                            </div>
                                                        </div>
                                                    </header>

                                                    <h4 class="h4 m-none text-dark text-bold"></h4>
                                                    <div class="bill-info">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="bill-to">
                                                                    <p class="h5 mb-xs text-dark text-semibold"></p>
                                                                    <address>

                                                                        Kode struk GoPay <br> <b><?php echo $booked_barber['transactionid']; ?></b> <br>
                                                                        <?php if ($booked_barber['status'] == 0) { ?>
                                                                            <p class="text-danger" style="font-size: 25px;">Not Confirmed</p>
                                                                        <?php } else { ?>
                                                                            <p class="text-success" style="font-size: 25px;">Confirmed</p>
                                                                        <?php } ?>

                                                                    </address>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="bill-data text-right">
                                                                    <p class="mb-none">
                                                                        <span class="text-dark">Booking Date:</span>
                                                                        <span class="value"><?php echo $booked_barber['booking_date']; ?></span>
                                                                    </p>
                                                                    <p class="mb-none">
                                                                        <span class="text-dark">Booking Time:</span>
                                                                        <span class="value"><?php echo $booked_barber['booking_time']; ?></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="invoice-summary">
                                                        <div class="row">

                                                            <table class="table h5 text-dark">
                                                                <tbody>
                                                                    <tr class="h4">
                                                                        <td><?php echo $booked_barber['booked_service']; ?>
                                                                            <?php if ($booked_barber['done_state'] == 0) { ?>
                                                                                <!-- tidak muncul karena booking belum selesai -->
                                                                            <?php } else { ?>
                                                                                <p class="text-success" style="font-size: 25px;">BOOKING SELESAI</p>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="text-center">Silahkan tunjukan/print invoice kepada kasir barber.</p>
                                            </div>
                                        </div>
                                    </div>


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