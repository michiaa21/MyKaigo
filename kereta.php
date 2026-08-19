<?php
include 'header.php';
include '../service/modal.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Kereta</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Kereta</a></li>
                    <li class="breadcrumb-item" aria-current="page">Kereta</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Tabel Kereta -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="mb-0">Data Kereta</h3>
                    <a href="add_kereta.php" class="btn btn-primary">
                        <i class="ti ti-plus"></i> <span>Tambah Kereta</span>
                    </a>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kereta</th>
                                <th>Mulai Beroperasi</th>
                                <th>Frekuensi Perjalanan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kereta as $k_data) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $k_data["nama_kereta"] ?></td>
                                <td><?= $k_data["mulai_beroperasi"] ?></td>
                                <td><?= $k_data["perjalanan_perhari"] ?> Kali Per Hari</td>
                                <td><?= $k_data["keterangan"] ?></td>
                                <td>
                                    <?php if ($k_data["status"] == 'aktif') { ?>
                                    <span class="badge bg-light-success">Aktif</span>
                                    <?php } else if ($k_data["status"] == 'pemeliharaan') { ?>
                                    <span class="badge bg-light-warning">Pemeliharaan</span>
                                    <?php } else { ?>
                                    <span class="badge bg-light-danger">Tidak Aktif</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <ul class="list-inline me-auto mb-0">
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                                data-bs-target="#k_edit-modal<?= $k_data['id_kereta'] ?>">
                                                <i class="ti ti-edit-circle f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                            title="Delete">
                                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
                                                data-bs-target="#k_delete-modal<?= $k_data['id_kereta'] ?>">
                                                <i class="ti ti-trash f-18"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel-Gerbong-Kereta -->
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="mb-0">Data Gerbong Kereta</h3>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#g_create-modal">
                        <i class="ti ti-plus"></i> <span>Tambah Gerbong Kereta</span>
                    </a>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="table2" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Gerbong</th>
                                <th>Kelas</th>
                                <th>Jumlah Kursi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($gerbong as $g_data) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $g_data["kode_gerbong"] ?></td>
                                <td><?= $g_data["nama_kelas"] ?></td>
                                <td><?= $g_data["jumlah_kursi"] ?></td>
                                <td class="text-center">
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                        <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                            data-bs-target="#g_edit-modal<?= $g_data['id_gerbong'] ?>">
                                            <i class="ti ti-edit-circle f-18"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                                        <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
                                            data-bs-target="#g_delete-modal<?= $g_data['id_gerbong'] ?>">
                                            <i class="ti ti-trash f-18"></i>
                                        </a>
                                    </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel-Kelas-Kereta -->
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="mb-0">Data Kelas Kereta</h3>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kls_create-modal">
                        <i class="ti ti-plus"></i> <span>Tambah Kelas Kereta</span>
                    </a>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="table3" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kelas</th>
                                <th>Fasilitas</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kelas_kereta as $kls_data) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $kls_data["nama_kelas"] ?></td>
                                <td><?= $kls_data["fasilitas"] ?></td>
                                <td class="text-center">
                                    <ul class="list-inline me-auto mb-0">
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                                data-bs-target="#kls_edit-modal<?= $kls_data['id_kelas'] ?>">
                                                <i class="ti ti-edit-circle f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                            title="Delete">
                                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
                                                data-bs-target="#kls_delete-modal<?= $kls_data['id_kelas'] ?>">
                                                <i class="ti ti-trash f-18"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>