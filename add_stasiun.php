<?php
include '../service/connection.php';
include 'header.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="stasiun.php">Stasiun</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Kereta</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Stasiun</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Tambah Data Stasiun Baru</h2>
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
                                        <label class="form-label" for="nama_stasiun">Nama Stasiun</label>
                                        <input type="text" id="nama_stasiun" name="nama_stasiun" class="form-control"
                                            placeholder="Masukan Nama Stasiun">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="kode_stasiun">Kode Stasiun</label>
                                        <input type="text" id="kode_stasiun" name="kode_stasiun" class="form-control"
                                            placeholder="Masukan Kode Stasiun">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="s_lokasi">Kabupaten/Kota</label>
                                        <select class="form-select" id="s_lokasi" name="s_lokasi">
                                            <option value="" disabled selected>Masukan Kabupaten/Kota</option>
                                            <?php foreach ($kota as $data_kota) { ?>
                                            <option value="<?= $data_kota['id_kota'] ?>">
                                                <?= $data_kota['nama_kota'] ?>
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
                                        <label class="form-label" for="jumlah_jalur">Jumlah Jalur</label>
                                        <input type="number" id="jumlah_jalur" name="jumlah_jalur" class="form-control"
                                            placeholder="Masukan Jumlah Jalur">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="s_status">Status</label>
                                        <select class="form-select" name="s_status" id="s_status">
                                            <option value="beroperasi">Beroperasi</option>
                                            <option value="tidak_beroperasi">Tidak Beroperasi</option>
                                        </select>
                                    </div>
                                    <div class="text-end btn-page mb-0 mt-4">
                                        <a href="stasiun.php">
                                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                                        </a>
                                        <button type="submit" name="tambah_stasiun" class="btn btn-primary">Tambah Data
                                            Kereta</button>
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