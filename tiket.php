<?php
include 'header.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Tiket</h5>
                    </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Jadwal</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tiket</li>
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
                    <h3 class="mb-0">Data Tiket</h3>
                    <a href="add_tiket.php" class="btn btn-primary">
                        <i class="ti ti-plus"></i> <span>Tambah Tiket</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="id_jadwal">Pilih Jadwal Kereta</label>
                            <select class="form-select" id="id_jadwal" name="id_jadwal">
                                <option value="" disabled selected>Pilih Jadwal</option>
                                <?php foreach ($jadwal as $data_jadwal) { ?>
                                <option value="<?= $data_jadwal['id_jadwal'] ?>">
                                    <?= $data_jadwal['nama_kereta'] ?> - <?= $data_jadwal['st_awal'] ?> -
                                    <?= $data_jadwal['st_tujuan'] ?> -
                                    <?= $data_jadwal['tanggal_berangkat'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="tabelini">
                    <div class="dt-responsive table-responsive">
                        <table id="table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kereta</th>
                                    <th>Stasiun Awal</th>
                                    <th>Stasun Tujuan</th>
                                    <th>Kode Kursi</th>
                                    <th>Kelas</th>
                                    <th>Waktu Berangkat</th>
                                    <th class="text-end">Harga</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tiket as $data_tiket) {
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data_tiket['nama_kereta'] ?></td>
                                    <td><?= $data_tiket['st_awal'] ?></td>
                                    <td><?= $data_tiket['st_tujuan'] ?></td>
                                    <td><?= $data_tiket['kode_kursi'] ?></td>
                                    <td><?= $data_tiket['nama_kelas'] ?></td>
                                    <td><?= $data_tiket['tanggal_berangkat'] ?></td>
                                    <td class="text-end">Rp. <?= number_format($data_tiket['harga'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php if ($data_tiket["status"] == 'tersedia') { ?>
                                        <span class="badge bg-light-success">Tersedia</span>
                                        <?php } elseif ($data_tiket["status"] == 'dipesan') { ?>
                                        <span class="badge bg-light-primary">Dipesan</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#tkt_edit-modal<?= $data_tiket['id_tiket'] ?>">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="Delete">
                                                <a href="#" class="avtar avtar-xs btn-link-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#tkt_delete-modal<?= $data_tiket['id_tiket'] ?>">
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
    var dataTable = null;

    $('#id_jadwal').on('change', function() {
        var selected = $(this).val();
        $.ajax({
            url: 'call_tabeltiket.php',
            type: 'POST',
            data: {
                category: selected
            },
            success: function(response) {
                if (dataTable !== null) {
                    dataTable.destroy();
                    $('#tabelini').empty();
                }

                $('#tabelini').html(response);

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