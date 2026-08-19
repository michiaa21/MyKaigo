<?php
include '../service/connection.php';
include 'header.php';
include '../service/CRUD.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="kereta.php">Kereta</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Kereta</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Kereta</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Tambah Data Kereta Baru</h2>
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
                                        <label class="form-label" for="k_nama">Nama Kereta</label>
                                        <input type="text" id="k_nama" name="k_nama" class="form-control"
                                            placeholder="Masukan Nama Kereta">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="k_operasi">Mulai Beroperasi</label>
                                        <input type="date" id="k_operasi" name="k_operasi" class="form-control"
                                            placeholder="Masukan Tanggal Mulai Beroperasi">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="k_frekuensi">Frekuensi Perjalanan</label>
                                        <input type="number" id="k_frekuensi" name="k_frekuensi" class="form-control"
                                            placeholder="Masukan Frekuensi Perjalanan per Hari">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="k_keterangan">Keterangan</label>
                                        <textarea id="k_keterangan" name="k_keterangan" class="form-control"
                                            rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="k_status">Status</label>
                                        <select class="form-select" id="k_status" name="k_status">
                                            <option value="" selected disabled>Pilih Status</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="pemeliharaan">Pemeliharaan</option>
                                            <option value="tidak_aktif">Tidak Beroperasi</option>
                                        </select>
                                    </div>
                                    <div class="text-end btn-page mb-0 mt-4">
                                        <a href="kereta.php">
                                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                                        </a>
                                        <button type="submit" name="tambah_kereta" class="btn btn-primary">Tambah Data
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