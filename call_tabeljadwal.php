<?php
include '../service/connection.php';


if (isset($_POST['tanggal'])) {
    $tanggal = $_POST['tanggal'];

    $jadwal = $connection->query("SELECT jadwal.id_jadwal, kereta.id_kereta, st_awal.id_stasiun AS id_stAwal, st_tujuan.id_stasiun AS id_stTujuan, kereta.nama_kereta, st_awal.nama_stasiun AS st_awal, st_tujuan.nama_stasiun AS st_tujuan, jadwal.tanggal_berangkat, jadwal.waktu_kedatangan, jadwal.waktu_berangkat FROM jadwal JOIN kereta ON jadwal.id_kereta = kereta.id_kereta JOIN stasiun AS st_awal ON jadwal.id_stasiunAwal = st_awal.id_stasiun JOIN stasiun AS st_tujuan ON jadwal.id_stasiunTujuan = st_tujuan.id_stasiun WHERE jadwal.tanggal_berangkat = '$tanggal';");
}
?>
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
            foreach ($jadwal as $data_jadwal) {
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
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                            <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal"
                                data-bs-target="#jadwal_view-modal">
                                <i class="ti ti-eye f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                data-bs-target="#jadwal_edit-modal<?= $data_jadwal['id_jadwal'] ?>">
                                <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
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