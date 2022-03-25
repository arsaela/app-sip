<?= $this->extend('layouts_petugas/template_petugas') ?>

<?= $this->section('header') ?>
<header id="header" class="fixed-top">
<div class="container">
        <div class="row">
        <div class="wrap-logo-left col-lg-5 col-md-5 col-sm-6 col-xs-12">
          <h1 class="logo mr-auto">
            <a href="<?php echo base_url('/'); ?>">
              <img src="/assets/img/klaten_logo.png">
                <div class="sip_text_home"> SISTEM INFORMASI FORMASI PEGAWAI </div>
                <div class="pemkab_text"> BKPSDM KABUPATEN KLATEN </div>
            </a>
          </h1>
        </div>
        <div class="wrap-menu-right col-lg-7 col-md-7 col-sm-6 col-xs-12">
            <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="<?php echo base_url('/'); ?>">Home</a></li>
              <li><a href="#team">Alur Pengusulan</a></li>
              <li><a href="#team">Informasi</a></li>
              <li><a href="<?php echo base_url('login'); ?>">Login</a></li>

            </ul>
          </nav><!-- .nav-menu -->
        </div>
        </div>
        </div>


  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<!-- <section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>SI<span>P</spa>
    </h1>
    <h2>Aplikasi Formasi Pegawai - BKPSDM Kabupaten Klaten</h2>
    <div class="d-flex">
      <a href="<?php //echo base_url('pendaftaran'); ?>" class="btn-get-started scrollto">Daftar Pengguna</a>
    </div>
  </div>
</section> -->
<!-- End Hero -->



<section class="slider" id="slider">
    <div class="background_contact parallax" style="background-image: url('/assets/img/bg_slider.png')">
        <div class="wrap-slider">
            <div class="container">
                <div class="row">
                    <div class="isi-slider col-md-6">
                        <h3> Selamat datang di</h3>
                        <h4 class="sip_text"> S . I . P </h4>
                        <h4 class="sip_text_italic"> ( Sistem Informasi Formasi Pegawai ) </h4>
                        <a href="" class="btn btn-primary register_petugas">Register >></a>
                    </div>
                    <div class="isi-slider col-md-6">
                    <img class="img_slider_human" src="/assets/img/pns.png" style="float:right;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main">

<section class="informasi" id="informasi">
    <div class="container">
        <div class="row">
            <div class="title-section-informasi col-md-12">
                <h3>Alur Pengusulan</h3>
            </div>
        </div>

        <div class="row">
            <?php //foreach($data_portofolio as $value) { ?>
            <div class="wrap-informasi col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="content_informasi">
                    <!-- <a href="<?php //echo $value->link_projek?>" target="_blank"> -->
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut dui ornare, rutrum lectus sit amet, malesuada augue. Integer id rutrum leo. Cras dictum orci eu porttitor sollicitudin. Suspendisse sollicitudin suscipit commodo. Nulla neque eros, condimentum vel tincidunt eu, molestie nec ex. Vestibulum vel diam vitae elit gravida gravida. Morbi et porta felis. Vivamus in diam augue. In in convallis diam.

                    Integer semper vestibulum turpis eget lobortis. Integer sodales, enim in convallis tristique, felis sem mollis lorem, et viverra erat neque eu urna. Sed id ante imperdiet, tempus nulla nec, lacinia felis. Vestibulum ac auctor mi. Integer arcu risus, mollis at semper vitae, tempus sit amet ex. Phasellus ac malesuada purus. Fusce sed augue vitae ex varius congue a id lacus. Phasellus faucibus auctor porttitor. Sed convallis vulputate posuere. Etiam dictum dolor id orci cursus aliquam. Fusce id lorem nec libero fermentum imperdiet. Nunc tristique tempor luctus. Nam semper mi sed augue efficitur, quis efficitur mauris ultrices. Praesent ut urna tempor, fermentum justo pharetra, dictum ante. Suspendisse finibus ante quam, ut finibus nulla lobortis nec.

                    Morbi dictum nisl vitae dapibus iaculis. Sed magna felis, accumsan a interdum eu, ullamcorper nec arcu.
                    <!-- </a> -->
                </div>
            </div>
            <?php //} ?>
        </div>
    </div>
</section>







<section class="informasi" id="informasi">
    <div class="container">
        <div class="row">
            <div class="title-section-informasi col-md-12">
                <h3>Informasi</h3>
            </div>
        </div>

        <div class="row">
            <?php //foreach($data_portofolio as $value) { ?>
            <div class="wrap-informasi col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="content_informasi">
                    <!-- <a href="<?php //echo $value->link_projek?>" target="_blank"> -->
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut dui ornare, rutrum lectus sit amet, malesuada augue. Integer id rutrum leo. Cras dictum orci eu porttitor sollicitudin. Suspendisse sollicitudin suscipit commodo. Nulla neque eros, condimentum vel tincidunt eu, molestie nec ex. Vestibulum vel diam vitae elit gravida gravida. Morbi et porta felis. Vivamus in diam augue. In in convallis diam.

                    Integer semper vestibulum turpis eget lobortis. Integer sodales, enim in convallis tristique, felis sem mollis lorem, et viverra erat neque eu urna. Sed id ante imperdiet, tempus nulla nec, lacinia felis. Vestibulum ac auctor mi. Integer arcu risus, mollis at semper vitae, tempus sit amet ex. Phasellus ac malesuada purus. Fusce sed augue vitae ex varius congue a id lacus. Phasellus faucibus auctor porttitor. Sed convallis vulputate posuere. Etiam dictum dolor id orci cursus aliquam. Fusce id lorem nec libero fermentum imperdiet. Nunc tristique tempor luctus. Nam semper mi sed augue efficitur, quis efficitur mauris ultrices. Praesent ut urna tempor, fermentum justo pharetra, dictum ante. Suspendisse finibus ante quam, ut finibus nulla lobortis nec.

                    Morbi dictum nisl vitae dapibus iaculis. Sed magna felis, accumsan a interdum eu, ullamcorper nec arcu.
                    <!-- </a> -->
                </div>
            </div>
            <?php //} ?>
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