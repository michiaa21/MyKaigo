<?php
include '../service/connection.php';
include 'header.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Transaksi</h5>
                    </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Booking</a></li>
                    <li class="breadcrumb-item" aria-current="page">Transaksi</li>
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
                    <h3 class="mb-0">Data Transaksi</h3>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Kontak</th>
                                <th>Booking</th>
                                <th>Role</th>
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
<?php
include 'footer.php';
?>