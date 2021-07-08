<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Add Service/Menu
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="res_id">Res ID</label>
                            <input type="text" name="res_id" value="<?php echo $this->session->userdata('id'); ?>" readonly class="form-control" id="res_id">
                            <!-- seharusnya diambil dari ID SESSION pengguna barbershop dan input type jadi hidden -->
                        </div>
                        <div class="form-group mt-3">
                            <label for="item_name">Item Name</label>
                            <input type="text" name="item_name" class="form-control" id="item_name" required>
                            <div class="form-text text-danger"><?= form_error('item_name'); ?></div>
                        </div>
                        <div class="input-group mb-3 mt-3">
                            <label class="input-group-text" for="service_type">Service Type</label>
                            <select class="form-select" id="service_type" name="service_type">
                                <?php foreach ($servicetype as $type) : ?>
                                    <option value="<?= $type['servis_type']; ?>"><?= $type['servis_type']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Price Rp.</span>
                            <input type="number" name="price" class="form-control" id="price" required>
                            <div class="form-text text-danger"><?= form_error('price'); ?></div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-end mt-3">Add Data</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>