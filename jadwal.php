<?php
include '../service/connection.php';
include 'header.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Jadwal</h5>
                    </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Jadwal</a></li>
                    <li class="breadcrumb-item" aria-current="page">Jadwal</li>
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
                    <h3 class="mb-0">Data Jadwal</h3>
                    <a href="add_jadwal.php" class="btn btn-primary">
                        <i class="ti ti-plus"></i> <span>Tambah Jadwal</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="filter_tgl">Pilih Tanggal Jadwal</label>
                            <input type="date" class="form-control" id="filter_tgl" name="filter_tgl"
                                value="<?= date('Y-m-d') ?>">
                        </div>
                    </div>
                </div>
                <div id="tabel-jadwal-container">
                    <div class="dt-responsive table-responsive">
                        <table id="table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kereta</th>
                                    <th>Stasiun Awal</th>
                                    <th>Stasiun Tujuan</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Waktu Kedatangan</th>
                                    <th>Waktu Keberangkatan</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jadwalnow as $data_jadwal) {
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data_jadwal["nama_kereta"] ?></td>
                                    <td><?= $data_jadwal["st_awal"] ?></td>
                                    <td><?= $data_jadwal["st_tujuan"] ?></td>
                                    <td><?= $data_jadwal["tanggal_berangkat"] ?></td>
                                    <td><?= $data_jadwal["waktu_kedatangan"] ?></td>
                                    <td><?= $data_jadwal["waktu_berangkat"] ?></td>
                                    <td class="text-center">
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="View">
                                                <a href="#" class="avtar avtar-xs btn-link-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#jadwal_view-modal">
                                                    <i class="ti ti-eye f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#jadwal_edit-modal<?= $data_jadwal['id_jadwal'] ?>">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="Delete">
                                                <a href="#" class="avtar avtar-xs btn-link-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#jadwal_delete-modal<?= $data_jadwal['id_jadwal'] ?>">
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
    <!-- [ sample-page ] end -->
</div>
<script>
$(document).ready(function() {
    let dataTable = null;

    $('#filter_tgl').on('change', function() {
        const tanggal = $(this).val();

        $.ajax({
            url: 'call_tabeljadwal.php',
            type: 'POST',
            data: {
                tanggal: tanggal
            },
            success: function(response) {
                if (dataTable !== null) {
                    dataTable.destroy();
                    $('#tabel-jadwal-container').empty();
                }

                $('#tabel-jadwal-container').html(response);

                dataTable = $('#table').DataTable({});
            }
        });
    });
});
</script>

<?php
include '../service/modal.php';
include 'footer.php';
?>