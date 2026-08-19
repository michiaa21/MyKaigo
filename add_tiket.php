<?php
include '../service/connection.php';
include 'header.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Tiket.php">Tiket</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Jadwal</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Tiket</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Tambah Tiket Baru</h2>
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
                                        <label class="form-label" for="id_jadwal">Pilih Jadwal Kereta</label>
                                        <select class="form-select" id="id_jadwal" name="id_jadwal">
                                            <option value="" disabled selected>Pilih Kereta</option>
                                            <?php foreach ($jadwal as $data_jadwal) { ?>
                                            <option value="<?= $data_jadwal['id_jadwal'] ?>">
                                                <?= $data_jadwal['nama_kereta'] ?> - <?= $data_jadwal['st_awal'] ?> -
                                                <?= $data_jadwal['st_tujuan'] ?> -
                                                <?= $data_jadwal['tanggal_berangkat'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="id_kursi">Pilih Kursi</label>
                                        <select class="form-select" id="id_kursi" name="id_kursi">
                                            <option value="" disabled selected>Pilih Kursi</option>
                                            <?php foreach ($kursi as $data_kursi) { ?>
                                            <option value="<?= $data_kursi['id_kursi'] ?>">
                                                <?= $data_kursi['kode_kursi'] ?> -
                                                <?= $data_kursi['kode_gerbong'] ?> -
                                                <?= $data_kursi['nama_kelas'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="t_harga">Harga</label>
                                        <input type="number" id="t_harga" name="t_harga" class="form-control"
                                            placeholder="Masukan Harga Tiket">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end btn-page mb-0 mt-4">
                                <a href="tiket.php">
                                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                                </a>
                                <button type="submit" name="tambah_tiket" class="btn btn-primary">Tambah Data
                                    Tiket</button>
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