<?php
include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
                        </div>
                    </div>
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>

    <script>
    $(document).ready(function() {
        $('#id_jadwal').on('change', function() {
            var selected = $(this).val();
            $.ajax({
                url: 'call_tabeltiket.php',
                type: 'POST',
                data: {
                    category: selected
                },
                success: function(response) {
                    $('#table tbody').html(response);
                }
            });
        });
    });
    </script>

</body>

</html>
<?php
include '../service/modal.php';
include 'footer.php';
?>