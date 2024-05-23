
<header class="site-header" style="background-color: #436DEC;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-geo-alt me-2"></i>
                    Dusun. Teluk Ampel, Desa Karya Makmur, Kec. Batujaya, Kab. Karawang
                </p>

                <p class="d-flex mb-0">
                    <i class="bi-envelope me-2"></i>
                    <a href="mailto:SMP PELITA NUSANTARA@yahoo.com">
                        SMP PELITA NUSANTARA
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                <ul class="social-icon">
                    <!-- <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li> -->

                    <!-- <li class="social-icon-item"> -->
                        <!-- <a href="https://www.facebook.com/groups/844404708922829/?ref=share&mibextid=KtfwRi" target="_blank" class="social-icon-link bi-facebook"></a> -->
                    <!-- </li> -->

                    <!-- <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-youtube"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li> -->
                </ul>
            </div>

        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg bg-blue shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="<?= base_url() ?>assets/guest/images/penuss.jpg" class="logo img-fluid" alt="Kind Heart Charity">
            <span>
                PELITA NUSANTARA
                <small>Sekolah Menengah Pertama</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>#section_2">Pengumuman</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>#section_3">Visi Misi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>#section_4">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>register">Pendaftaran</a>
                </li>

                <?php if (empty(session()->get('user'))) : ?>

                

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="<?= base_url() ?>login">Login</a>
                    </li>
                    
                    <?php else : ?>
                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="<?= base_url() ?>logout">logout</a>
                        </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>