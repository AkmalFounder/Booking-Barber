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

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?php echo base_url(); ?>c_servis/add" class="btn btn-primary">Tambah Paket Layanan</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-9">
            <h3>Paket Cukur/Layanan</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Jenis Paket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($service as $ser) : ?>
                        <tr>
                            <td><?php echo $ser['item_name']; ?></td>
                            <td><?php echo $ser['servis_type']; ?></td>
                            <td> Rp. <?= number_format($ser['price'], 2, ',', '.'); ?></td>
                            <td><?php echo $ser['image']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>c_servis/delete/<?= $ser['id']; ?>" class="btn btn-outline-danger tombol-hapus">
                                    Delete</a>
                                <br>
                                <a href="<?= base_url(); ?>c_servis/edit/<?= $ser['id']; ?>" class="btn btn-outline-success"> Edit </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>

</div>