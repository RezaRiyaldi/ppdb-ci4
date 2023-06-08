<?= $this->extend('layout_guest'); ?>

<?= $this->section('content'); ?>


<section class="section-padding">

<div class="row m-0">
    <div class="col-md-6 mx-auto">
        <?= $this->include('components/guest/_alerts'); ?>
        <p>Sudah mendaftar? <a href="<?= base_url() ?>login" class="my-text fw-bold">Masuk <i
                    class="bi-arrow-right"></i></a></p>
        <div class="card">
            <div class="card-header text-center p-3" style="background-color: var(--primary-color);">
                <h4 class="text-white my-auto">Formulir</h4>
                <p class="text-white my-auto">Daftar untuk para calon siswa</p>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>register" method="post">
                    <?= csrf_field() ?>
                    <fieldset>
                        <legend>Biodata Calon Siswa</legend>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nama"><i class="bi-person"></i></span>
                            <input required type="text" class="form-control" name="name"
                                placeholder="Nama Lengkap" aria-label="nama" aria-describedby="nama">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password"><i class="bi-gender-ambiguous"></i></span>
                            <select name="jenis_kelamin" id="" class="form-select">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki - laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="tanggal_lahir"><i
                                    class="bi-calendar-check"></i></span>
                            <input required type="date" class="form-control" name="tanggal_lahir"
                                placeholder="Tanggal Lahir" aria-label="tanggal_lahir"
                                aria-describedby="tanggal_lahir">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="telp"><i class="bi-telephone"></i></span>
                            <input required type="text" class="form-control" name="telp"
                                placeholder="No Telepon" aria-label="telp" aria-describedby="telp">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="telp"><i class="bi-house"></i></span>
                            <textarea required name="alamat" id="" cols="30" rows="3" class="form-control"
                                placeholder="Alamat"></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Akun untuk login</legend>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="email">@</span>
                            <input required type="email" class="form-control" name="email" placeholder="Email"
                                aria-label="email" aria-describedby="email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username"><i class="bi-person-circle"></i></span>
                            <input required type="text" class="form-control" name="username"
                                placeholder="Username" aria-label="Username" aria-describedby="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password"><i class="bi-key"></i></span>
                            <input required type="password" class="form-control" name="password"
                                placeholder="Password" aria-label="password" aria-describedby="password">
                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <input required type="checkbox" name="agree" id="agree" class="form-check-input">
                        <label for="agree">Saya menyetujui <span class="my-text">syarat dan kondisi</span> yang
                            diberikan oleh sekolah</label>
                    </div>
                    <button type="submit" class="w-50 btn btn-primary my-button">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<?= $this->endSection('content'); ?>