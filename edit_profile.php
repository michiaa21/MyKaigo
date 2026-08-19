<?php
include '../service/connection.php';
include 'header.php';
?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="edit_profile.php">Edit Akun</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Kelola Akun</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Akun</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Edit Profile</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1" role="tab"
                            aria-selected="true">
                            <i class="ti ti-user me-2"></i>My Akun
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                            aria-selected="true">
                            <i class="ti ti-file-text me-2"></i>Update Profile
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                        <div class="row">
                            <div class="col-lg-12 col-xxl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Full Name</p>
                                                        <p class="mb-0"><?= $data['nama_lengkap'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">NIK</p>
                                                        <p class="mb-0"><?= $data['nik'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Phone</p>
                                                        <p class="mb-0"><?= $data['no_hp'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Country</p>
                                                        <p class="mb-0">Indonesia</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Email</p>
                                                        <p class="mb-0"><?= $data['email'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Birthday</p>
                                                        <p class="mb-0"><?= $data['tanggal_lahir'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <p class="mb-1 text-muted">Created At</p>
                                                <p class="mb-0"><?= $data['dibuat'] ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Update Profile</h5>
                                    </div>
                                    <form action="../service/CRUD.php" method="post">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                                                    <div class="form-group">
                                                        <label class="form-label">Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= $data['nama_lengkap'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">NIK</label>
                                                        <input type="text" class="form-control" name="nik" placeholder="Masukan NIK" value="<?= $data['nik'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="email" class="text-muted">Email</label>
                                                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email" value="<?= $data['email'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="birthday" class="text-muted">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" name="birthday" id="birthday" value="<?= $data['tanggal_lahir'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="no_hp" class="text-muted">No Telepon</label>
                                                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan NIK" value="<?= $data['no_hp'] ?>">
                                                    </div>
                                                </div>
                                                <div class=" col-md-6 mt-3 mb-3">
                                                    <label for="gender" class="text-muted">Jenis Kelamin</label>
                                                    <select class="form-select" name="gender" id="gender">
                                                        <option value="Laki-Laki" <?= $data['gender'] == 'Laki-Laki' ? 'selected' : '' ?>>
                                                            Laki-Laki
                                                        </option>
                                                        <option value="Perempuan" <?= $data['gender'] == 'Perempuan' ? 'selected' : '' ?>> Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-5 text-end">
                                                    <button type="submit" name="update_profile" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Social Network</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 me-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <div class="avtar avtar-xs btn-light-linkedin">
                                                            <i class="fab fa-linkedin-in f-16"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Linkedin</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <a href="https://www.linkedin.com/uas/login?fromSignIn=true&trk=cold_join_sign_in">
                                                    <button class="btn btn-link-danger">Connect</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Update Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="../service/CRUD.php" method="post">
                                            <div class="row">
                                                <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                                                <div class=" col-md-6 mt-3 mb-3">
                                                    <label for="pw_lama" class="text-muted">Password Lama</label>
                                                    <input type="text" class="form-control" name="pw_lama" id="pw_lama"
                                                        placeholder="Masukan Masukan Password Lama">
                                                </div>
                                                <div class=" col-md-6 mt-3 mb-3">
                                                    <label for="pw_baru" class="text-muted">Password Baru</label>
                                                    <input type="text" class="form-control" name="pw_baru" id="pw_baru"
                                                        placeholder="Masukan Masukan Password Baru">
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" name="ganti_password" class="btn btn-primary">Ganti
                                                        Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
        </div>
    </div>
</div>

<!-- [ Main Content ] end -->
<?php
include 'footer.php';
?>