<?php
include 'header.php';

$detailbooking = $connection->query("SELECT detail_booking.*, booking.*,kereta.nama_kereta, st_awal.nama_stasiun AS st_awal, st_tujuan.nama_stasiun AS st_tujuan, kursi.id_kursi, kursi.kode_kursi, gerbong.kode_gerbong, kelas_kereta.nama_kelas, jadwal.tanggal_berangkat
    FROM detail_booking
    LEFT JOIN booking ON detail_booking.id_booking = booking.id_booking
    JOIN tiket ON detail_booking.id_tiket = tiket.id_tiket
    JOIN kursi ON tiket.id_kursi = kursi.id_kursi
    JOIN gerbong ON kursi.id_gerbong = gerbong.id_gerbong
    JOIN kelas_kereta ON gerbong.id_kelas = kelas_kereta.id_kelas
    JOIN jadwal ON tiket.id_jadwal = jadwal.id_jadwal
    JOIN kereta ON jadwal.id_kereta = kereta.id_kereta
    JOIN stasiun AS st_awal ON jadwal.id_stasiunAwal = st_awal.id_stasiun
    JOIN stasiun AS st_tujuan ON jadwal.id_stasiunTujuan = st_tujuan.id_stasiun;
");

// Persentase
$bulan_ini = date('Y-m');
$result_ini = $connection->query("SELECT COUNT(*) AS total FROM booking WHERE DATE_FORMAT(dibuat, '%Y-%m') = '$bulan_ini'");
$row_ini = $result_ini->fetch_assoc();
$total_ini = (int)$row_ini['total'];

$bulan_lalu = date('Y-m', strtotime('-1 month'));
$result_lalu = $connection->query("SELECT COUNT(*) AS total FROM booking WHERE DATE_FORMAT(dibuat, '%Y-%m') = '$bulan_lalu'");
$row_lalu = $result_lalu->fetch_assoc();
$total_lalu = (int)$row_lalu['total'];

if ($total_lalu > 0) {
    $persentase = (($total_ini - $total_lalu) / $total_lalu) * 100;
} else {
    $persentase = 100;
}

$trend = $persentase >= 0 ? 'up' : 'down';



//Jumlah Kereta Beroperasi
$keretas = [];
while ($row = $kereta->fetch_assoc()) {
    $keretas[$row['id_kereta']] = true;
}
// Hitung total kereta unik
$total_kereta = count($keretas);


//Jumlah Stasiun Beroperasi
$stasiuns = [];
while ($row = $stasiun->fetch_assoc()) {
    $stasiuns[$row['id_stasiun']] = true;
}
// Hitung total kereta unik
$total_stasiun = count($stasiuns);


//Jumlah User Aktif
$userb = [];
while ($row = $users->fetch_assoc()) {
    $userb[$row['id_user']] = true;
}
// Hitung total kereta unik
$total_user = count($userb);



// // Hitung total income per hari selama minggu ini
// $income_data = [];
// $day_names = ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'];

// // Dapatkan tanggal Senin minggu ini
// $start_of_week = date('Y-m-d', strtotime('monday this week'));
// $end_of_week = date('Y-m-d', strtotime('sunday this week'));

// $query = $connection->query("
//     SELECT DAYOFWEEK(dibuat) AS day_index, SUM(total_harga) AS total
//     FROM booking
//     WHERE DATE(dibuat) BETWEEN '$start_of_week' AND '$end_of_week'
//     GROUP BY DAYOFWEEK(dibuat)
// ");

// $income_raw = [];
// while ($row = $query->fetch_assoc()) {
//     // DAYOFWEEK: 1=Sunday, 2=Monday, ..., 7=Saturday
//     $index = (int)$row['day_index'];
//     $income_raw[$index] = (int)$row['total'];
// }

// // Susun data ke dalam urutan Mo–Su (2–1 dalam DAYOFWEEK)
// $income_week = [];
// $mapping = [2, 3, 4, 5, 6, 7, 1]; // Mo=2, Tu=3, ..., Su=1
// $total_week_income = 0;
// foreach ($mapping as $i) {
//     $amount = isset($income_raw[$i]) ? $income_raw[$i] : 0;
//     $income_week[] = $amount;
//     $total_week_income += $amount;
// }



?>
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Home</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Home</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Kereta Beroperasi</h6>
                <h4 class="mb-3">
                    <?php echo number_format($total_kereta); ?>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    Kereta yang masih beroperasi
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Stasiun Beroperasi</h6>
                <h4 class="mb-3">
                    <?php echo number_format($total_stasiun); ?>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    Banyak stasiun yang beroperasi
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total User Aktif</h6>
                <h4 class="mb-3">
                    <?php echo number_format($total_user); ?>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    Banyak User yang telah daftar di KaiGo
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-2 f-w-400 text-muted">Total Booking Bulan Ini</h6>
                <h4 class="mb-3">
                    <?php echo number_format($total_ini); ?>
                    <span class="badge bg-light-primary border border-primary">
                        <i class="ti ti-trending-<?php echo $trend; ?>"></i>
                        <?php echo number_format(abs($persentase), 1); ?>%
                    </span>
                </h4>
                <p class="mb-0 text-muted text-sm">
                    Dibandingkan bulan lalu: <span class="text-primary"><?php echo number_format($total_lalu); ?></span>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-12">
        <h5 class="mb-3">Booking Terbaru</h5>
        <div class="card tbl-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Kontak Pemesan</th>
                                <th >Jumlah Tiket</th>
                                <th>Jadwal Kereta</th>
                                <th class="text-end">Total Pembayaran</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detailbooking as $data_booking) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data_booking['nama_pemesan'] ?></td>
                                <td><?= $data_booking['email'] ?></td>
                                <td><?= $data_booking['jumlah_tiket'] ?></td>
                                <td>
                                    <?= $data_booking['nama_kereta'] ?> - <?= $data_booking['st_awal'] ?> -
                                    <?= $data_booking['st_tujuan'] ?> - <?= $data_booking['tanggal_berangkat'] ?>
                                </td>
                                <td class="text-end">Rp.<?=  number_format($data_booking['total_harga'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($data_booking['status_pembayaran'] == 'sukses') { ?>
                                    <span class="badge bg-light-success">Sukses</span>
                                    <?php } else { ?>
                                    <span class="badge bg-light-danger">Dibatalkan</span>
                                    <?php } ?>
                                </td>
                                <td><?= $data_booking['dibuat'] ?></td>
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
<script src="../assets/js/plugins/apexcharts.min.js"></script>
<!-- <script>
(function () {
  var options = {
    chart: {
      type: 'bar',
      height: 365,
      toolbar: { show: false }
    },
    colors: ['#13c2c2'],
    plotOptions: {
      bar: {
        columnWidth: '45%',
        borderRadius: 4
      }
    },
    dataLabels: { enabled: false },
    series: [{
      name: 'Income',
      data: // dari PHP
    }],
    stroke: {
      curve: 'smooth',
      width: 2
    },
    xaxis: {
      categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
      axisBorder: { show: false },
      axisTicks: { show: false }
    },
    yaxis: { show: false },
    grid: { show: false }
  };

  var chart = new ApexCharts(document.querySelector('#income-overview-chart1'), options);
  chart.render();
})();
</script> -->


<!-- [ Main Content ] end -->
<?php
include 'footer.php';
?>