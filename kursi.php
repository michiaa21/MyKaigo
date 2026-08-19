<?php
include 'header.php';

?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Kursi</h5>
                    </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Kereta</a></li>
                    <li class="breadcrumb-item" aria-current="page">Kursi</li>
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
                    <h3 class="mb-0">Data Kursi</h3>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#krs_create-modal">
                        <i class="ti ti-plus"></i> <span>Tambah Kursi</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="id_gerbong">Pilih Gerbong</label>
                            <select class="form-select" id="id_gerbong" name="id_gerbong">
                                <option value="" disabled selected>Pilih Gerbong</option>
                                <?php foreach ($gerbong as $data_gerbong) { ?>
                                <option value="<?= $data_gerbong['id_gerbong'] ?>">
                                    <?= $data_gerbong['kode_gerbong'] ?> - <?= $data_gerbong['nama_kelas'] ?>
                                    - <?= $data_gerbong['jumlah_kursi'] ?>
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
                                    <th>Kode Kursi</th>
                                    <th>Kode Gerbong</th>
                                    <th>Kelas</th>
                                    <th>Fasilitas</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kursi as $data_kursi) {
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data_kursi['kode_kursi'] ?></td>
                                    <td><?= $data_kursi['kode_gerbong'] ?></td>
                                    <td><?= $data_kursi['nama_kelas'] ?></td>
                                    <td><?= $data_kursi['fasilitas'] ?></td>
                                    <td>
                                        <?php if ($data_kursi["status"] == 'tersedia') { ?>
                                        <span class="badge bg-light-success">Tersedia</span>
                                        <?php } else { ?>
                                        <span class="badge bg-light-primary">Dipesan</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <ul class="list-inline me-auto mb-0">
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="Edit">
                                                <a href="#" class="avtar avtar-xs btn-link-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#krs_edit-modal<?= $data_kursi['id_kursi'] ?>">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                title="Delete">
                                                <a href="#" class="avtar avtar-xs btn-link-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#krs_delete-modal<?= $data_kursi['id_kursi'] ?>">
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

    $('#id_gerbong').on('change', function() {
        var selected = $(this).val();
        $.ajax({
            url: 'call_tabelkursi.php',
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