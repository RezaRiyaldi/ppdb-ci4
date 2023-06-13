<?= $this->extend('layout_guest'); ?>

<?= $this->section('content'); ?>
<section class="hero-section hero-section-full-height">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-12 p-0">
                <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://scontent.fcgk18-2.fna.fbcdn.net/v/t39.30808-6/297429806_383974687185406_4711487262776025961_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5cd70e&_nc_ohc=pGolojP0XTIAX8IdOyI&_nc_ht=scontent.fcgk18-2.fna&oh=00_AfAFwODtcs9kb2bB2UmYZP41O9gLEsUpAjp2ytLzN30Npg&oe=648A7BE2" class="carousel-image img-fluid" alt="...">
                        </div>

                        <div class="carousel-item">
                            <img src="https://scontent.fcgk18-2.fna.fbcdn.net/v/t39.30808-6/297253019_383974607185414_3125001539470235245_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5cd70e&_nc_ohc=EwdF8IRTXp8AX_FoNbb&_nc_ht=scontent.fcgk18-2.fna&oh=00_AfCnff9Lgy7IHA69rI3erkqM8HYAWtUdb1rJ6Cirgpp56Q&oe=648A183E" alt="...">
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
        <div class="row">

            <div class="col-lg-6 col-md-5 col-12">
                <img src="<?= base_url() ?>assets/guest/images/avatar/kepsek.jpeg" class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="">
            </div>

            <div class="col-lg-5 col-md-7 col-12">
                <div class="custom-text-block">
                    <h3 class="mb-0 text-success">Mida Puspita Sari S.Pd.</h3>

                    <p class="text-muted mb-lg-4 mb-md-4">Kepala Sekolah</p>

                    <p>Selamat datang, calon siswa! Kami dengan senang hati menyambut kehadiran kalian di sekolah kami.</p>

                    <p>Mari kita bersama-sama menjalani perjalanan pendidikan yang bermakna dan penuh prestasi. Selamat bergabung!</p>

                    <ul class="social-icon mt-4">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>
                    </ul>
                </div>
            </div>

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
                        <p class="featured-block-text" style="font-size: 1.2em;">Terwujudnya Peserta Didik yang Berprestasi Beriman dan Berbudi Pekerti</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="featured-block-text mb-3 fw-bold" style="font-size: 2em;">Misi</h3>
                        <ol class="featured-block-text" style="font-size: 1.2em;">
                            <li>Menanamkan karakter Religius melalui kebiasaan.</li>
                            <li>Menanamkan Perilaku Jujur, Displin, dan Bertanggung Jawab.</li>
                            <li>Mengoptimalkan Pengelolaan Lingkungan Hidup.</li>
                            <li>Memanfaatkan Program Extrakurikuler dalam Pengembangan Bakat, Minat, dan Kemampuan Siswa.</li>
                            <li>Mengembangkan Pendidikan Kepramukaaan.</li>
                            <li>Meningkatkan Profesionalisme Guru melalui Pendidikan Formal dan PKB.</li>
                            <li>Mengoptimalkan Peran Komite Sekolah dan Pengurus Kelas dalam berbagai Kegiatan Sekolah.</li>
                            <li>Menjalin Kerjasama yang Harmonis antar Sekolah dan Lingkungan Masyarakat.</li>
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

                            <p>Ekskul Pramuka adalah kegiatan luar kelas yang mengajarkan keterampilan, kejujuran, kerjasama, dan keberanian kepada calon murid SD.</p>
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

                            <p>Ekskul futsal adalah kegiatan olahraga sepak bola dalam ruangan yang mengajarkan teknik, strategi, dan teamwork kepada calon murid SD.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="custom-block-wrap">
                    <img src="https://images.unsplash.com/photo-1609329007778-42630e6b1580?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="custom-block-image img-fluid" alt="">

                    <div class="custom-block">
                        <div class="custom-block-body">
                            <h5 class="mb-3">Tari Tradisional</h5>

                            <p>Ekskul tari adalah belajar gerak tubuh, ekspresi, koordinasi, kreativitas, dan menghargai keanekaragaman budaya.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection('content'); ?>