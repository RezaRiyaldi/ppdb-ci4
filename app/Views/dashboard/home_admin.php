<?= $this->extend('layout_dashboard'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card">
            <a href="<?= base_url() ?>forms">
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <div class="bg-danger p-3 rounded text-white">
                            <i class="fas fa-file-excel"></i>
                        </div>
                        <div>
                            <h4 class="m-0">Unverified</h4>
                            <p class="m-0"><?= $form_unverif ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <a href="<?= base_url() ?>forms?tab=1">
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <div class="bg-success p-3 rounded text-white">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div>
                            <h4 class="m-0">Verified</h4>
                            <p class="m-0"><?= $form_verif ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <a href="<?= base_url() ?>students">
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <div class="bg-info p-3 rounded text-white">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div>
                            <h4 class="m-0">Student</h4>
                            <p class="m-0"><?= $jumlah_siswa ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <a href="<?= base_url() ?>users">
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <div class="bg-warning p-3 rounded text-dark">
                            <i class="bi-people-fill"></i>
                        </div>
                        <div>
                            <h4 class="m-0">Users</h4>
                            <p class="m-0"><?= $jumlah_user ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <a href="<?= base_url() ?>users">
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <div class="bg-dark p-3 rounded text-white">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div>
                            <h4 class="m-0">Admin</h4>
                            <p class="m-0"><?= $jumlah_admin ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <a href="<?= base_url() ?>users?tab=1">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <div class="bg-primary p-3 rounded text-white">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h4 class="m-0">Guest</h4>
                            <p class="m-0"><?= $jumlah_pendaftar ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<?= $this->endSection('content'); ?>