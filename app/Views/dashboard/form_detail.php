<?= $this->extend('layout_dashboard') ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between bg-light">
        <h2 class="my-3">Formulir</h2>

        <?php if ($form->form_status_id == 1) : ?>
            <div class="my-auto">
                <a href="<?= base_url() ?>forms/acc/<?= $form->id ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Setujui Formulir">
                    <i class="fas fa-check"></i> Setujui
                </a>
                <a href="<?= base_url() ?>forms/decline/<?= $form->id ?>" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Tolak Formulir">
                    <i class="fas fa-times"></i> Tolak
                </a>
            </div>
        <?php elseif ($form->form_status_id == 2) : ?>
            <div class="my-auto alert alert-primary">Formulir sudah disetujui</div>
        <?php endif ?>

    </div>
    <div class="card-body">
        <form action="<?= base_url() ?>forms/edit/<?= $form->id ?>" method="post">
            <?= csrf_field() ?>
            <fieldset>
                <legend>Biodata Calon Siswa</legend>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text" id="nama"><i class="bi-person"></i></span>
                            <input required type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" value="<?= isset($form->form_fullname) ? $form->form_fullname : "" ?>">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Nama Panggilan</label>
                        <div class="input-group">
                            <span class="input-group-text" id="nama"><i class="bi-person"></i></span>
                            <input type="text" class="form-control" name="callname" placeholder="Nama Panggilan" value="<?= isset($form->form_callname) ? $form->form_callname : "" ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Agama</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-peace"></i></span>
                        <input type="text" class="form-control" name="agama" placeholder="Agama" value="<?= $form->form_agama ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi-gender-ambiguous"></i></span>
                        <select name="gender" id="" class="form-select">
                            <option value="L" <?= isset($form->form_gender) && $form->form_gender == "L" ? "selected" : "" ?>>Laki - laki</option>
                            <option value="P" <?= isset($form->form_gender) && $form->form_gender == "P" ? "selected" : "" ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Tempat Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                            <input type="text" class="form-control" name="tempat_lahir" value="<?= $form->form_tempat_lahir ?>" placeholder="Kota kelahiran">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text" id="tanggal_lahir"><i class="bi-calendar-check"></i></span>
                            <input required type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= isset($form->form_tanggal_lahir) ? $form->form_tanggal_lahir : "" ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-text" id="telp"><i class="bi-house"></i></span>
                            <textarea required name="alamat" id="" cols="30" rows="3" class="form-control" placeholder="Alamat"><?= isset($form->form_alamat) ? $form->form_alamat : "" ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Jenis Alamat</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            <select name="jenis_alamat" id="" class="form-select">
                                <option value="ortu" <?= isset($form->form_jenis_alamat) && $form->form_jenis_alamat == "ortu" ? "selected" : "" ?>>Orang Tua</option>
                                <option value="numpang" <?= isset($form->form_jenis_alamat) && $form->form_jenis_alamat == "numpang" ? "selected" : "" ?>>Wali Murid</option>
                                <option value="asrama" <?= isset($form->form_jenis_alamat) && $form->form_jenis_alamat == "asrama" ? "selected" : "" ?>>Saudara</option>
                            </select>
                        </div>
                    </div>
                </div>

                <legend>Orang Tua</legend>
                <hr>

                <div class="mb-3">
                    <label for="" class="form-label">Wali Murid</label>
                    <div class="input-group">
                        <span class="input-group-text" id="wali"><i class="fas fa-heart"></i></span>
                        <input type="text" class="form-control" name="wali" placeholder="Wali Calon Murid" value="<?= isset($form->form_wali) ? $form->form_wali : "" ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Nomor Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text" id="telp"><i class="bi-telephone"></i></span>
                        <input required type="text" class="form-control" name="telp" placeholder="No Telepon" value="<?= isset($form->form_telp) ? $form->form_telp : "" ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Ayah</label>
                        <div class="input-group">
                            <span class="input-group-text" id="ortuAyah"><i class="bi-person"></i></span>
                            <input type="text" class="form-control" name="orangtua[ayah]" placeholder="Nama Ayah" value="<?= isset($orangtua->ayah) ? $orangtua->ayah : "" ?>">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Ibu</label>
                        <div class="input-group">
                            <span class="input-group-text" id="wali"><i class="bi-person"></i></span>
                            <input type="text" class="form-control" name="orangtua[ibu]" placeholder="Nama Ibu" value="<?= isset($orangtua->ibu) ? $orangtua->ibu : "" ?>">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Pekerjaan/Jabatan Wali</label>
                    <div class="input-group">
                        <span class="input-group-text" id="pekerjaan"><i class="fas fa-briefcase"></i></span>
                        <input type="text" class="form-control" name="pekerjaan_jabatan[pekerjaan]" placeholder="Pekerjaan" value="<?= isset($pekerjaan_jabatan->pekerjaan) ? $pekerjaan_jabatan->pekerjaan : "" ?>">
                        <input type="text" class="form-control" name="pekerjaan_jabatan[jabatan]" placeholder="Jabatan" value="<?= isset($pekerjaan_jabatan->jabatan) ? $pekerjaan_jabatan->jabatan : "" ?>">
                    </div>
                </div>

                <legend>Asal Calon Siswa</legend>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Jenis Daftar</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                            <select name="form_as" id="formAs" class="form-select" onchange="changeAs()">
                                <option value="baru" <?= isset($form->form_as) && $form->form_as == "baru" ? "selected" : "" ?>>Baru</option>
                                <option value="pindahan" <?= isset($form->form_as) && $form->form_as == "pindahan" ? "selected" : "" ?>>Pindahan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3" id="asalBaru">
                        <label for="" class="form-label">Asal Baru</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                            <select name="form_from" id="formFrom" class="form-select" onchange="changeFrom()">
                                <!-- <option value="rt" <?= isset($form->form_from) && $form->form_from == "rt" ? "selected" : "" ?>>Rumah Tangga (Tidak TK)</option> -->
                                <option value="sd" <?= isset($form->form_from) && $form->form_from == "sd" ? "selected" : "" ?>>SD</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3" id="asalPindahan">
                        <label for="" class="form-label">Asal Sekolah</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-school"></i></span>
                            <input type="text" class="form-control" name="form_asal_sekolah" value="<?= $form->form_asal_sekolah ?>" placeholder="Sekolah sebelumnya">
                        </div>
                    </div>
                </div>

                <div id="containerAsal" class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Tanggal Pindah</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-school"></i></span>
                            <input type="date" class="form-control" name="form_tanggal_pindah" value="<?= $form->form_tanggal_pindah ?>" placeholder="Tanggal Pindah Sekolah">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Dari Kelas</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-school"></i></span>
                            <select name="form_dari_kelas" id="" class="form-select">
                                <option value="7" <?= $form->form_dari_kelas == 7 ? "selected" : "" ?>>Kelas 7</option>
                                <option value="8" <?= $form->form_dari_kelas == 8 ? "selected" : "" ?>>Kelas 8</option>
                                <option value="9" <?= $form->form_dari_kelas == 9 ? "selected" : "" ?>>Kelas 9</option>
                                <!-- <option value="4" <?= $form->form_dari_kelas == 4 ? "selected" : "" ?>>Kelas 4</option>
                                <option value="5" <?= $form->form_dari_kelas == 5 ? "selected" : "" ?>>Kelas 5</option>
                                <option value="6" <?= $form->form_dari_kelas == 6 ? "selected" : "" ?>>Kelas 6</option> -->
                            </select>
                        </div>
                    </div>
                </div>

                <div id="containerTk" class="row">
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Asal SD</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                            <input type="text" class="form-control" name="form_tk" value="<?= $form->form_tk ?>" placeholder="Sekolah Dasar">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Tahun Lulus</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                            <input type="number" class="form-control" name="form_tahun_tk" value="<?= $form->form_tahun_tk ?>" placeholder="Tahun Lulus Sekolah Dasar">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Lama SD (Tahun)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                            <input type="number" class="form-control" name="form_lama_tk" value="<?= $form->form_lama_tk ?>" placeholder="Lama Sekolah Dasar">
                        </div>
                    </div>
                </div>
            </fieldset>

            <button type="submit" class="w-50 btn btn-primary my-button">Edit</button>
        </form>
    </div>
</div>
<?= $this->endSection('content'); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        changeAs();

        $('input, select, textarea').each(function() {
            var input = $(this);
            var value = input.val();

            function toggleBorder() {
                if (value === '') {
                    input.addClass('border-danger');
                } else {
                    input.removeClass('border-danger');
                }
            }

            toggleBorder();

            input.on('input', function() {
                value = input.val();
                toggleBorder();
            });
        });

    })

    var changeAs = () => {
        var formAs = $("#formAs").val();
        var formFrom = $("#formFrom").val();

        var baru = $("#asalBaru");
        var pindahan = $("#asalPindahan");
        var tk = $("#containerTk");
        var asal = $("#containerAsal");

        pindahan.toggleClass('d-none', formAs !== "pindahan");
        asal.toggleClass('d-none', formAs !== "pindahan");
        baru.toggleClass('d-none', formAs !== "baru");
        tk.toggleClass('d-none', formAs !== "baru" || formFrom !== "sd");
    }


    var changeFrom = () => {
        var formFrom = $("#formFrom").val();
        var tk = $("#containerTk");

        tk.toggleClass('d-none', formFrom === "rt");
    }
</script>
<?= $this->endSection('script'); ?>