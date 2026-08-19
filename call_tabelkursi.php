<?php
include '../service/connection.php';


if (isset($_POST['category'])) {
    $category = $_POST['category'];

    $kursi = $connection->query("SELECT kursi.id_kursi, gerbong.id_gerbong, gerbong.id_kelas, kursi.kode_kursi, kursi.status, gerbong.kode_gerbong, gerbong.jumlah_kursi, kelas_kereta.nama_kelas, kelas_kereta.fasilitas FROM `kursi` JOIN gerbong ON kursi.id_gerbong = gerbong.id_gerbong JOIN kelas_kereta ON gerbong.id_kelas = kelas_kereta.id_kelas WHERE gerbong.id_gerbong = '$category';");
}
?>
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
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                data-bs-target="#krs_edit-modal<?= $data_kursi['id_kursi'] ?>">
                                <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
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