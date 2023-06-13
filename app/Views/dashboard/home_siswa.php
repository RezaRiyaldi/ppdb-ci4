<?= $this->extend('layout_dashboard'); ?>

<?php $user = session()->get('user'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-light">
                <h2 class="text-center my-3">Formulir</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>forms/edit/<?= $form->user_id ?>" method="post">
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
                                        <option value="numpang" <?= isset($form->form_jenis_alamat) && $form->form_jenis_alamat == "numpang" ? "selected" : "" ?>>Numpang</option>
                                        <option value="asrama" <?= isset($form->form_jenis_alamat) && $form->form_jenis_alamat == "asrama" ? "selected" : "" ?>>Asrama</option>
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
                                        <option value="rt" <?= isset($form->form_from) && $form->form_from == "rt" ? "selected" : "" ?>>Rumah Tangga (Tidak TK)</option>
                                        <option value="tk" <?= isset($form->form_from) && $form->form_from == "tk" ? "selected" : "" ?>>Taman Kanak - Kanak</option>
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
                                        <option value="1" <?= $form->form_dari_kelas == 1 ? "selected" : "" ?>>Kelas 1</option>
                                        <option value="2" <?= $form->form_dari_kelas == 2 ? "selected" : "" ?>>Kelas 2</option>
                                        <option value="3" <?= $form->form_dari_kelas == 3 ? "selected" : "" ?>>Kelas 3</option>
                                        <option value="4" <?= $form->form_dari_kelas == 4 ? "selected" : "" ?>>Kelas 4</option>
                                        <option value="5" <?= $form->form_dari_kelas == 5 ? "selected" : "" ?>>Kelas 5</option>
                                        <option value="6" <?= $form->form_dari_kelas == 6 ? "selected" : "" ?>>Kelas 6</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="containerTk" class="row">
                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Asal TK</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                    <input type="text" class="form-control" name="form_tk" value="<?= $form->form_tk ?>" placeholder="Taman Kanak - Kanak">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Tahun Lulus</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                    <input type="number" class="form-control" name="form_tahun_tk" value="<?= $form->form_tahun_tk ?>" placeholder="Tahun Lulus Taman Kanak - Kanak">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Lama TK (Tahun)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                    <input type="number" class="form-control" name="form_lama_tk" value="<?= $form->form_lama_tk ?>" placeholder="Lama Taman Kanak - Kanak">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?php if ($form->form_status_id == 1) : ?>
                        <button type="submit" class="w-50 btn btn-primary my-button">Edit</button>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 bg-light">
            <div class="card-body">
                <h2 class="text-center">Informasi</h2>
                <table class="w-100">
                    <tr class="fw-bold">
                        <?php if ($form->form_status_id == 1) : ?>
                            <td>No. Pendaftaran</td>
                            <td>: <?= $form->form_no_register ?></td>
                        <?php else : ?>
                            <td>No. Induk Siswa</td>
                            <td>: <?= $form->no_induk_siswa ?></td>
                        <?php endif ?>
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

        <div class="card border-danger mt-3" style="background-color: #fff6db;">
            <div class="card-body">
                <h2 class="text-center border-bottom mb-3"><i class="fas fa-exclamation-triangle text-warning"></i> PENTING <i class="fas fa-exclamation-triangle text-warning"></i></h2>
                <p style="text-align: justify; text-indent: 30px; margin-bottom: 5px;">Berhubungan dengan sudah diterimanya siswa dengan biodata diatas, kami harap anda mengumpulkan berkas berikut:</p>
                <ol>
                    <li>Fotokopi Akta Kelahiran</li>
                    <li>Fotokopi Kartu Keluarga (KK)</li>
                    <li>Fotokopi KTP Orang Tua / Wali</li>
                    <li>
                        Pas Foto:
                        <ul>
                            <li>Laki - laki: Background <span style="background-color: blue; color: white; border-radius: 3px; padding: 0 2px;">Biru</span></li>
                            <li>Perempuan: Background <span style="background-color: red; color: white; border-radius: 3px; padding: 0 2px;">Merah</span></li>
                            <li>2 x 3: 2 Lembar</li>
                            <li>3 x 4: 2 Lembar</li>
                            <li>4 x 6: 2 Lembar</li>
                        </ul>
                    </li>
                </ol>
                <p style="text-align: justify; text-indent: 30px; margin-bottom: 5px;">Pastikan untuk melengkapi semua berkas tersebut sebelum batas waktu pengumpulan daftar ulang. Jika ada pertanyaan lebih lanjut, silakan hubungi panitia pendaftaran.</p>
            </div>
        </div>
    </div>
</div>
<div class="site-footer-bottom bg-light my-3 p-3" style="border-radius: 10px; box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;;">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-7 col-12">
                <p class="copyright-text mb-0">Copyright &copy; 2023
                    Design: <a href="https://zagojo.space" target="_blank">Zagojo Space</a>
                    <br>Distribution: <a href="https://instagram.com/boykucayy" target="_blank">Reza Riyaldi Irawan</a>
                </p>
            </div>

            <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                <a href="https://www.facebook.com/groups/844404708922829/?ref=share&mibextid=KtfwRi" class="fab fa-facebook-square" style="font-size: 24px;"></a>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>


<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('input, select, textarea').each(function() {
            var input = $(this);
            var value = input.val();
            var status_id = parseInt('<?= $form->form_status_id ?>');

            function toggleBorder() {
                if (value === '') {
                    input.addClass('border-danger');
                } else {
                    input.removeClass('border-danger');
                }
            }

            function toggleDisable() {
                if (status_id === 2) {
                    input.prop('disabled', true);
                } else {
                    input.prop('disabled', false);
                }
            }

            toggleBorder();
            toggleDisable();

            input.on('input', function() {
                value = input.val();
                toggleBorder();
            });
        });

        var changeAs = () => {
            var formAs = $("#formAs").val();
            var formFrom = $("#formFrom").val();

            var baru = $("#asalBaru");
            var pindahan = $("#asalPindahan");
            var asal = $("#containerAsal");
            var tk = $("#containerTk");

            pindahan.toggleClass('d-none', formAs !== "pindahan");
            asal.toggleClass('d-none', formAs !== "pindahan");
            baru.toggleClass('d-none', formAs !== "baru");
            tk.toggleClass('d-none', formAs !== "baru" || formFrom !== "tk");

        }


        var changeFrom = () => {
            var formFrom = $("#formFrom").val();
            var tk = $("#containerTk");

            tk.toggleClass('d-none', formFrom === "rt");
        }

        changeAs()

    });
</script>
<?= $this->endSection('script'); ?>