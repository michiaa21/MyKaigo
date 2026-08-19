<?php
include 'header.php';
include '../service/modal.php'
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">User</h5>
                    </h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Data</a></li>
                    <li class="breadcrumb-item" aria-current="page">User</li>
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
                    <h3 class="mb-0">Data User</h3>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Kontak</th>
                                <th>Role</th>
                                <th>Dibuat</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($users as $data_user) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data_user["nama_lengkap"] ?></td>
                                <td><?= $data_user["email"] ?></td>
                                <td><?= $data_user["no_hp"] ?></td>
                                <td>
                                    <?php if ($data_user["hak"] == 'admin') { ?>
                                    <span class="badge bg-light-danger">Admin</span>
                                    <?php } else { ?>
                                    <span class="badge bg-light-success">User</span>
                                    <?php } ?>
                                </td>
                                <td><?= $data_user["dibuat"] ?></td>
                                <td class="text-center">
                                    <ul class="list-inline me-auto mb-0">
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                            <a href="#" class="avtar avtar-xs btn-link-primary" data-bs-toggle="modal"
                                                data-bs-target="#user_edit-modal<?= $data_user['id_user'] ?>">
                                                <i class="ti ti-edit-circle f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                            title="Delete">
                                            <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal"
                                                data-bs-target="#user_delete-modal<?= $data_user['id_user'] ?>">
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