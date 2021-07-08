<div class="container" style="margin: 20px;">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data <?php echo $this->session->flashdata('flash'); ?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->
    <?php endif; ?>

    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <a href="" class="btn btn-primary">Add Menu/Service</a>
        </div>
    </div> -->

    <div class="row mt-3">
        <div class="col-md-9">
            <h3>Booking List</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Booking Date</th>
                        <th scope="col">Booking Time</th>
                        <th scope="col">ID Struk Gopay</th>
                        <th scope="col">Status</th>
                        <th scope="col">Service</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($booked_list as $blist) : ?>
                        <tr>
                            <td><?php echo $blist['booking_id']; ?></td>
                            <td><?php echo $blist['name']; ?></td>
                            <td><?php echo $blist['phone']; ?></td>
                            <td><?php echo $blist['booking_date']; ?></td>
                            <td><?php echo $blist['booking_time']; ?></td>
                            <td><b>

                                    <?php if ($blist['transactionid'] == NULL) { ?>
                                        <p class="text-danger"><b>Belum Bayar</b></p>
                                    <?php } else { ?>
                                        <p class="text-success"><b><?php echo $blist['transactionid']; ?></b></p>
                                    <?php } ?>

                                </b></td>
                            <td>
                                <?php if ($blist['status'] == 0) { ?>
                                    <p class="text-danger" style="font-size: 19px;"><b>Not Confirmed</b></p>
                                <?php } else { ?>
                                    <p class="text-success" style="font-size: 19px;"><b>Confirmed</b></p>
                                <?php } ?>
                            </td>
                            <td><?php echo $blist['booked_service']; ?></td>
                            <td>

                                <?php if ($blist['done_state'] == 0) { ?>

                                    <?php if ($blist['status'] == 0) { ?>
                                        <a href="<?= base_url(); ?>c_admin/approveBooking/<?= $blist['id']; ?>" class="btn btn-outline-success">Confirm Payment</a>
                                    <?php } else { ?>
                                        <a href="<?= base_url(); ?>c_admin/rejectBooking/<?= $blist['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure?');">
                                            Reject Payment</a>
                                    <?php } ?>

                                    <a style="margin-top: 5px;" href="<?= base_url(); ?>c_admin/doneBooking/<?= $blist['id']; ?>" class="btn btn-outline-primary" onclick="return confirm('Booking pelanggan selesai?');">
                                        Booking Selesai?</a>

                                <?php } else { ?>

                                    <p><b>Booking Pelanggan Selesai.</b></p>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>

</div>