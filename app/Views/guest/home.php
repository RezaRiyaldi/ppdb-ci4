<?= $this->extend('layout_guest'); ?>

<?= $this->section('content'); ?>
<section class="hero-section hero-section-full-height">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-12 p-0">
                <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active d-flex align-items-center" style="min-height: 650px !important; height: 650px !important; overflow: hidden;">
                            <!-- <div class="bg-primary w-100 vh-100"></div> -->
                            <img src="<?= base_url() ?>assets/guest/images/slide/penus1.jpg" alt="" style="width: 100%;">
                        </div>

                        <!-- <div class="carousel-item"> -->
                        <!-- <div class="bg-danger w-100 vh-100"> -->
                        <!-- </div> -->
                        <!-- <img src="https://scontent.fcgk18-2.fna.fbcdn.net/v/t39.30808-6/297253019_383974607185414_3125001539470235245_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5cd70e&_nc_ohc=EwdF8IRTXp8AX_FoNbb&_nc_ht=scontent.fcgk18-2.fna&oh=00_AfCnff9Lgy7IHA69rI3erkqM8HYAWtUdb1rJ6Cirgpp56Q&oe=648A183E" alt="..."> -->
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
    </div>
</section>


<section class="section-bg section-padding" id="section_2">
    <div class="container">
        <h2>Siswa Terpilih</h2>
        <p>Selamat bergabung kepada semua siswa/i yang sudah terpilih pada kami. Sukses selalu bersama kami.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="siswa-acc">
                <thead>
                    <tr class="bg-success text-white">
                        <th>No</th>
                        <th>No. Induk Siswa</th>
                        <th>No. Registrasi</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Wali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($list_siswa as $siswa) :
                        $orangTua = json_decode($siswa->form_orang_tua, true);
                        $ayah = isset($orangTua['ayah']) ? $orangTua['ayah'] : null;

                        $wali = $siswa->form_wali ?? ($ayah ?? "-");
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $siswa->no_induk_siswa ?></td>
                            <td><?= $siswa->form_no_register ?></td>
                            <td><?= $siswa->form_fullname ?></td>
                            <td class="text-center"><?= $siswa->form_gender ?></td>
                            <td><?= ucwords(strtolower($wali)) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<section class="section-padding" id="section_3">
    <div class="container">
        <div class="row gap-3">

            <div class="col-lg-8 col-12 text-center mx-auto">
                <h2 class="my-auto">Visi Misi</h2>
            </div>

            <div class="col-lg-8 col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="featured-block-text mb-3 fw-bold" style="font-size: 2em;">Visi</h3>
                        <p class="featured-block-text" style="font-size: 1.2em;">Wadah pembinaan adab peserta didik, Wadah informasi ilmu pengetahuan & Keterampilan, Wadah pelaksanaan budaya.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="featured-block-text mb-3 fw-bold" style="font-size: 2em;">Misi</h3>
                        <ol class="featured-block-text" style="font-size: 1.2em;">
                            <li>Menjadikan islam sebagai pondasi dasar membentuk karakter siswa.</li>
                            <li>Menjunjung tinggi nilai-nilai kesantunan & moral.</li>
                            <li>Mengembangkan kurikulum sekolah berbasis HASIL.</li>
                            <li>Membekali peserta didik ilmu pengetahuan, keterampilan & ibadah.</li>
                            <li>Melaksanakan budaya/kebiasaan di sekolah yang mendukung pembentukan karakter.</li>
                            <li>Meningkatkan Profesionalisme Guru melalui Pendidikan Formal dan PKB.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="cta-section section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-12 ms-auto">
                <h2 class="mb-0">Ingin mendaftar?</h2>
            </div>

            <div class="col-lg-5 col-12">
                <a href="<?= base_url() ?>register" class="custom-btn btn smoothscroll">Isi Formulir</a>
            </div>

        </div>
    </div>
</section>


<section class="section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Ekstrakurikuler</h2>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="https://images.unsplash.com/photo-1619973516465-da5fecfad5f3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="custom-block-image img-fluid" alt="">

                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Pramuka</h5>

                            <p>Ekskul Pramuka adalah kegiatan luar kelas yang mengajarkan keterampilan, kejujuran, kerjasama, dan keberanian.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block-wrap">
                    <img src="https://images.unsplash.com/photo-1676444920926-c8a084ec4003?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="custom-block-image img-fluid" alt="">

                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Futsal</h5>

                            <p>Ekskul futsal adalah kegiatan olahraga sepak bola dalam ruangan yang mengajarkan teknik, strategi, dan team work.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="custom-block-wrap">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhxJ5KNX7u1AzVACIFIOd7lqmNCIRhPD766Hm1MWM4e8-L-E5a0wtTFlGu1TcmrvKCNEdD1R6uANDRLOklZfRFsA9rXOPM_io9vxdQlZcya0nJI7kKh25wkcTdlPf2Yk9gw0N_cVy8AiVo/s320/552437_518684424827855_474719606_n.jpg" alt="" style="width: 480px; height: 278px;">

                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Drumband</h5>

                            <p>Ekskul Drumband adalah kegiatan luar kelas yang mengajarkan siswa tentang , ekspresi, koordinasi, kreativitas tentang bermain musik, gerakan dan konsep pertunjukan musik.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection('content'); ?>

<?= $this->section('script'); ?>
<script>
    $("#siswa-acc").DataTable()
</script>
<?= $this->endSection('script'); ?>