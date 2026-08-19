<?php
include '../service/connection.php';


if (isset($_POST['category'])) {
    $category = $_POST['category'];

    $tiket = $connection->query("
        SELECT 
            tiket.id_tiket, tiket.id_jadwal, tiket.id_kursi,
            kereta.nama_kereta,
            st_awal.nama_stasiun AS st_awal,
            st_tujuan.nama_stasiun AS st_tujuan,
            kursi.kode_kursi,
            kelas_kereta.nama_kelas,
            jadwal.tanggal_berangkat,
            tiket.harga,
            kursi.status
        FROM tiket
        JOIN kursi ON tiket.id_kursi = kursi.id_kursi
        JOIN gerbong ON kursi.id_gerbong = gerbong.id_gerbong
        JOIN kelas_kereta ON gerbong.id_kelas = kelas_kereta.id_kelas
        JOIN jadwal ON tiket.id_jadwal = jadwal.id_jadwal
        JOIN kereta ON jadwal.id_kereta = kereta.id_kereta
        JOIN stasiun AS st_awal ON jadwal.id_stasiunAwal = st_awal.id_stasiun
        JOIN stasiun AS st_tujuan ON jadwal.id_stasiunTujuan = st_tujuan.id_stasiun
        WHERE tiket.id_jadwal = '$category'
    ");
}
?>
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
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                data-bs-target="#tkt_edit-modal<?= $data_tiket['id_tiket'] ?>">
                                <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
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