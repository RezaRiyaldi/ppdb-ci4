<?php
$user = session()->get('user');
$uri = service('uri')->getSegment(1);
?>
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3 d-flex gap-2">
            <h1 class="text-primary">02</h1>
            <div>
                <h5 class="text-warning m-0">SDN</h5>
                <p class="m-0" style="font-size: .8em;">Pasir Gombong</p>
            </div>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="<?= base_url() ?>assets/dashboard/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?= $user->username ?></h6>
                <span><?= $user->role ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="<?= base_url() ?>dashboard" class="nav-item nav-link <?= $uri == "dashboard" ? "active" : "" ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Buttons</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div> -->
            <?php if ($user->role == "Siswa") : ?>
                <a href="<?= base_url() ?>documents" class="nav-item nav-link"><i class="fa fa-file me-2"></i>Dokumen</a>
            <?php endif ?>
            <a href="<?= base_url() ?>users" class="nav-item nav-link <?= $uri == "users" ? "active" : "" ?>"><i class="fa fa-users me-2"></i>Users</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
        </div>
    </nav>
</div>