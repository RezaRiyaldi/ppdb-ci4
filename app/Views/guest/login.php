<?= $this->extend('layout_guest'); ?>

<?= $this->section('content'); ?>


<section class="section-padding">
    <div class="row m-0">
        <div class="col-md-4 mx-auto">
            <?= $this->include('components/guest/_alerts'); ?>
            <p>Belum memiliki akun? <a href="<?= base_url() ?>register" class="my-text fw-bold">Daftar <i class="bi-arrow-right"></i></a></p>

            <div class="card">
                <div class="card-header text-center p-3" style="background-color: var(--primary-color);">
                    <h4 class="text-white my-auto">Login</h4>
                    <p class="text-white my-auto">Login untuk masuk kedalam dashboard</p>
                </div>
                <div class="card-body">
                    <form action="<?= base_url() ?>login" method="post">
                        <?= csrf_field() ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username"><i class="bi-person-circle"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username or Email" aria-label="Username" aria-describedby="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password"><i class="bi-key"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="password" aria-describedby="password">
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="w-50 btn btn-primary my-button">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection('content'); ?>