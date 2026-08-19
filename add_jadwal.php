<?php
include '../service/connection.php';
include 'header.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="jadwal.php">Jadwal</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Jadwal</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Jadwal</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Tambah Jadwal Baru</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="../service/CRUD.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="id_kereta">Pilih Kereta</label>
                                        <select class="form-select" id="id_kereta" name="id_kereta">
                                            <option value="" disabled selected>Masukan Kereta</option>
                                            <?php foreach ($kereta as $data_kereta) { ?>
                                            <option value="<?= $data_kereta['id_kereta'] ?>">
                                                <?= $data_kereta['nama_kereta'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="id_stasiunAwal">Stasiun Awal</label>
                                        <select class="form-select" id="id_stasiunAwal" name="id_stasiunAwal">
                                            <option value="" disabled selected>Masukan Stasiun Awal</option>
                                            <?php foreach ($stasiun as $data_stasiun) { ?>
                                            <option value="<?= $data_stasiun['id_stasiun'] ?>">
                                                <?= $data_stasiun['nama_stasiun'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="id_stasiunTujuan">Stasiun Tujuan</label>
                                        <select class="form-select" id="id_stasiunTujuan" name="id_stasiunTujuan">
                                            <option value="" disabled selected>Masukan Stasiun Awal</option>
                                            <?php foreach ($stasiun as $data_stasiun) { ?>
                                            <option value="<?= $data_stasiun['id_stasiun'] ?>">
                                                <?= $data_stasiun['nama_stasiun'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="tanggal_berangkat">Tanggal Berangkat</label>
                                        <input type="Date" id="tanggal_berangkat" name="tanggal_berangkat"
                                            class="form-control" placeholder="Masukan Tanggal Berangkat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="waktu_kedatangan">Waktu Kedatangan</label>
                                        <input type="time" id="waktu_kedatangan" name="waktu_kedatangan"
                                            class="form-control" placeholder="Masukan Waktu Kedatangan">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="waktu_berangkat">Waktu Berangkat</label>
                                        <input type="time" id="waktu_berangkat" name="waktu_berangkat"
                                            class="form-control" placeholder="Masukan Waktu Keberangkatan">
                                    </div>
                                    <div class="text-end btn-page mb-0 mt-4">
                                        <a href="jadwal.php">
                                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                                        </a>
                                        <button type="submit" name="tambah_jadwal" class="btn btn-primary">Tambah Data
                                            Jadwal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
<?php
include 'footer.php';
?>