<?php
include 'header.php';
include '../service/modal.php';
include '../service/connection.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Stasiun</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Kereta</a></li>
                    <li class="breadcrumb-item" aria-current="page">Stasiun</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="mb-0">Data Stasiun</h3>
                    <a href="add_stasiun.php" class="btn btn-primary">
                        <i class="ti ti-plus"></i> <span>Tambah Stasiun</span>
                    </a>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Stasiun</th>
                                <th>Kode Stasiun</th>
                                <th>Kabupaten/Kota</th>
                                <th>Jumlah Jalur</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($stasiun as $data) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data["nama_stasiun"] ?></td>
                                <td><?= $data["kode_stasiun"] ?></td>
                                <td><?= $data["nama_kota"] ?></td>
                                <td><?= $data["jumlah_jalur"] ?></td>
                                <td>
                                    <?php if ($data["status"] == 'beroperasi') { ?>
                                    <span class="badge bg-light-success">Beroperasi</span>
                                    <?php } else { ?>
                                    <span class="badge bg-light-danger">Tidak Aktif</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <ul class="list-inline me-auto mb-0">
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                                data-bs-target="#s_edit-modal<?= $data['id_stasiun'] ?>">
                                                <i class="ti ti-edit-circle f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                            title="Delete">
                                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
                                                data-bs-target="#s_delete-modal<?= $data['id_stasiun'] ?>">
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
    <!-- [ sample-page ] end -->
</div>
<?php
include 'footer.php';
?>