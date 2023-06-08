<?= $this->extend('layout_dashboard'); ?>

<?php $user = session()->get('user'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Formulir</h2>
                <form action="" method="post">
                    <?= csrf_field() ?>
                    <fieldset>
                        <legend>Biodata Calon Siswa</legend>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nama"><i class="bi-person"></i></span>
                            <input required type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?= isset($form->form_fullname) ? $form->form_fullname : "" ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password"><i class="bi-gender-ambiguous"></i></span>
                            <select name="jenis_kelamin" id="" class="form-select">
                                <option value="L" <?= isset($form->form_gender) && $form->form_gender == "L" ? "selected" : "" ?>>Laki - laki</option>
                                <option value="P" <?= isset($form->form_gender) && $form->form_gender == "P" ? "selected" : "" ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="tanggal_lahir"><i class="bi-calendar-check"></i></span>
                            <input required type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= isset($form->form_tanggal_lahir) ? $form->form_tanggal_lahir : "" ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="telp"><i class="bi-telephone"></i></span>
                            <input required type="text" class="form-control" name="telp" placeholder="No Telepon" value="<?= isset($form->form_telp) ? $form->form_telp : "" ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="wali"><i class="bi-person"></i></span>
                            <input required type="text" class="form-control" name="wali" placeholder="Wali Calon Murid" value="<?= isset($form->form_wali) ? $form->form_wali : "" ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="telp"><i class="bi-house"></i></span>
                            <textarea required name="alamat" id="" cols="30" rows="3" class="form-control" placeholder="Alamat"><?= isset($form->form_alamat) ? $form->form_alamat : "" ?></textarea>
                        </div>
                    </fieldset>
                    <button type="submit" class="w-50 btn btn-primary my-button">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card border-0 bg-light">
            <div class="card-body">
                <h2 class="text-center">Informasi</h2>
                <table class="w-100">
                    <tr class="fw-bold">
                        <td>No. Pendaftaran</td>
                        <td>: <?= $form->form_no_register ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: <span class="badge bg-<?= isset($form->form_status_id) && $form->form_status_id == 2 ? "success" : "danger" ?>"><?= isset($form->form_status) ? $form->form_status : "Belum Buat Form" ?></span></td>
                    </tr>
                    <tr>
                        <td class="align-top">Tanggal Daftar</td>
                        <td>: <?= isset($form->created_at) ? date("l, d M Y", strtotime($form->created_at)) : "-" ?> <br>&nbsp; <?= isset($form->created_at) ? date("H:i:s", strtotime($form->created_at)) : "-" ?> WIB</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: <?= $user->fullname ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>: <?= $user->username ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= $user->email ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>