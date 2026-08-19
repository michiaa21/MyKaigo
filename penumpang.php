<?php
include 'header.php';
include '../service/modal.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Penumpang</h5>
                    </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Data</a></li>
                    <li class="breadcrumb-item" aria-current="page">Penumpang</li>
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
                    <h3 class="mb-0">Data Penumpang</h3>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penumpang</th>
                                <th>NIK</th>
                                <th>Jadwal</th>
                                <th>Kursi</th>
                                <th>Pemesan</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detailbooking as $data_dbooking) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data_dbooking['nama_penumpang'] ?></td>
                                <td><?= $data_dbooking['nik'] ?></td>
                                <td>
                                    <?= $data_dbooking['nama_kereta'] ?> - <?= $data_dbooking['st_awal'] ?> -
                                    <?= $data_dbooking['st_tujuan'] ?> - <?= $data_dbooking['tanggal_berangkat'] ?>
                                </td>
                                <td>
                                    <?= $data_dbooking['kode_kursi'] ?> - <?= $data_dbooking['kode_gerbong'] ?>
                                </td>
                                <td><?= $data_dbooking['nama_pemesan'] ?></td>
                                <td class="text-center">
                                    <ul class="list-inline me-auto mb-0">
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                                data-bs-target="#dbooking_edit-modal<?= $data_dbooking['id_detailBooking'] ?>">
                                                <i class="ti ti-edit-circle f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                            title="Delete">
                                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
                                                data-bs-target="#dbooking_delete-modal<?= $data_dbooking['id_detailBooking'] ?>">
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