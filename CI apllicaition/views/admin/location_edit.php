<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Add Kordinat Lokasi
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id">Res ID</label>
                            <input type="text" name="id" value="<?= $barber_from['id']; ?>" readonly class="form-control" id="id">
                            <!-- seharusnya diambil dari ID SESSION pengguna barbershop dan input type jadi hidden -->
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Latitude</span>
                            <input type="text" name="latitude" value="<?= $barber_from['latitude']; ?>" class="form-control" id="latitude" required>
                            <div class="form-text text-danger"><?= form_error('latitude'); ?></div>
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Longitude</span>
                            <input type="text" name="longitude" value="<?= $barber_from['longitude']; ?>" class="form-control" id="longitude" required>
                            <div class="form-text text-danger"><?= form_error('longitude'); ?></div>
                        </div>
                        <div class="input-group mt-3">
                            <a href="https://maps.google.co.id/" target="_blank">Buka maps?</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-end mt-3">Simpan Kordinat Lokasi</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>