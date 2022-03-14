<?= $this->extend('layouts_petugas/template_petugas') ?>

<?= $this->section('header') ?>
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="<?php echo base_url('/'); ?>">Pemerintah Kabupaten Klaten</span></a></h1>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="<?php echo base_url('/'); ?>">Home</a></li>
        <li><a href="#team">Info Formasi ASN</a></li>
        <li><a href="<?php echo base_url('login'); ?>">Login</a></li>

      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>SI<span>P</spa>
    </h1>
    <h2>Aplikasi Formasi Pegawai - BKPSDM Kabupaten Klaten</h2>
    <div class="d-flex">
      <a href="<?php echo base_url('pendaftaran'); ?>" class="btn-get-started scrollto">Daftar Pengguna</a>
    </div>
  </div>
</section><!-- End Hero -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main">

  <!-- ======= Tanggal ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bx-calendar"></i></div>
            <h4 class="title"><a href="">Tanggal Usul</a></h4>
            <p class="description">Formasi</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bx bx-calendar-exclamation"></i></div>
            <h4 class="title"><a href="">Pengumuman</a></h4>
            <p class="description">BKPSDM</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ======= Info PMB ======= -->
  <section id="team" class="faq section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Info</h2>
        <h3>Usulan <span>Formasi</span></h3>
        <p>Usulan Formasi.</p>
      </div>

      <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

        <li>
          <a data-toggle="collapse" class="collapsed" href="#faq1">Usulan Formasi CPNS dan PPPK <i class="icofont-simple-up"></i></a>
          <div id="faq1" class="collapse" data-parent=".faq-list">
            <p>
              Usulan Formasi CPNS dan PPPK.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq2" class="collapsed">Usulan Formasi dari Mutasi PNS dan PPPK <i class="icofont-simple-up"></i></a>
          <div id="faq2" class="collapse" data-parent=".faq-list">
            <p>
              Usulan Formasi dari Mutasi PNS dan PPPK.
            </p>
          </div>
        </li>

      </ul>

    </div>
  </section>

</main>
<?= $this->endSection() ?>