<?= $this->extend('layouts_petugas/template_petugas') ?>

<?= $this->section('header') ?>
<header id="header" class="fixed-top">
<div class="container">
        <div class="row">
        <div class="wrap-logo-left col-lg-5 col-md-5 col-sm-6 col-xs-12">
          <h1 class="logo mr-auto">
            <a href="<?php echo base_url('/'); ?>">
              <img src="/assets/img/klaten_logo.png">
                <div class="sip_text_home"> APLIKASI FORMASI PEGAWAI </div>
                <div class="pemkab_text"> BKPSDM KABUPATEN KLATEN </div>
            </a>
          </h1>
        </div>
        <div class="wrap-menu-right col-lg-7 col-md-7 col-sm-6 col-xs-12">
            <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="<?php echo base_url('/'); ?>">Home</a></li>
              <li><a href="#alur_pengusulan">Alur Pengusulan</a></li>
              <li><a href="#informasi">Informasi</a></li>
              <li><a href="<?php echo base_url('login'); ?>">Login</a></li>

            </ul>
          </nav><!-- .nav-menu -->
        </div>
        </div>
        </div>


  </div>
</header><!-- End Header -->




<section class="slider" id="slider">
    <div class="background_contact parallax" style="background-image: url('/assets/img/iconklaten.png')">
        <div class="wrap-slider">
            <div class="container">
                <div class="row">
                    <div class="isi-slider col-md-6">
                        <!-- <h3> Selamat datang ! </h3> -->
                        <h4 class="sip_text"> S I P </h4>
                        <h4 class="sip_text_italic"> ( Aplikasi Formasi Pegawai ) </h4>
                        <a href="" class="btn btn-primary register_petugas">Register >></a>
                    </div>
                    <div class="isi-slider col-md-6">
                    <img class="img_slider_human" src="/assets/img/ICON_PNS2.png" style="float:right;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main">


<section class="section_batas_pengusulan" id="section_batas_pengusulan">
    <div class="container">
        <div class="row">
            <div class="title-section-batas-pengusulan col-md-12">
                <h3>Batas Waktu Pengusulan</h3>
            </div>
        </div>

        <!-- count down timer pengusulan -->
        <div class="wrap_countdowntimer row offset-md-3">

        <div class="wrap_timer_shape col-md-2">
          <div class="card countdowntimer">
            <div class="card-content timer">
              <h5 id="hari" class="center"></h5>
              <span class="day_title">Hari</span>
            </div>
          </div>
        </div>

        <div class="wrap_timer_shape col-md-2">
          <div class="card countdowntimer">
            <div class="card-content timer">
              <h5 id="jam" class="center"></h5>
              <span class="day_title">Jam</span>
            </div>
          </div>
        </div>

        <div class="wrap_timer_shape col-md-2">
          <div class="card countdowntimer">
            <div class="card-content timer">
              <h5 id="menit" class="center"></h5>
              <span class="day_title">Menit</span>
            </div>
          </div>
        </div>

        <div class="wrap_timer_shape col-md-2">
          <div class="card countdowntimer">
            <div class="card-content timer">
              <h5 id="detik" class="center"></h5>
              <span class="day_title">Detik</span>
            </div>
          </div>
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
            <?php foreach($getInformasi as $value) { ?>
            <div class="wrap-informasi col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="content_informasi">
                    <!-- <a href="<?php //echo $value->link_projek?>" target="_blank"> -->
                   <?php echo $value->informasi_content;?>
                    <!-- </a> -->
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<section class="alur_pengusulan" id="alur_pengusulan">
    <div class="container">
        <div class="row">
            <div class="title-section-informasi col-md-12">
                <h3>Alur Pengusulan</h3>
            </div>
        </div>

        
            <?php //foreach($data_portofolio as $value) { ?>
            <div class="wrap-alur-pengusulan left row">
                <div class="content_alur_pengusulan col-lg-5 col-md-5 col-sm-6 col-xs-12">
                <?php
                    //if (empty($data_foto_profile)){ ?>
                    <img class="img_alur_pengusulan left" src="/assets/img/login3.png">
                    <?php //} else { ?>
                    <!-- <img class="img_alur_pengusulan" src="/assets/img/login3.png"> -->
                    <?php //} ?>
                </div>
                <div class="content_alur_pengusulan col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <h3>1. Login Sistem</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut dui ornare, rutrum lectus sit amet, malesuada augue. Integer id rutrum leo. Cras dictum orci eu porttitor sollicitudin. Suspendisse sollicitudin suscipit commodo. Nulla neque eros, condimentum vel tincidunt eu, molestie nec ex. Vestibulum vel diam vitae elit gravida gravida. Morbi et porta felis. Vivamus in diam augue. In in convallis diam.

                    Integer semper vestibulum turpis eget lobortis. 
                </div>
            </div>

            <div class="wrap-alur-pengusulan right row">
                <div class="content_alur_pengusulan col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <h3>2. Update Data Pegawai</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut dui ornare, rutrum lectus sit amet, malesuada augue. Integer id rutrum leo. Cras dictum orci eu porttitor sollicitudin. Suspendisse sollicitudin suscipit commodo. Nulla neque eros, condimentum vel tincidunt eu, molestie nec ex. Vestibulum vel diam vitae elit gravida gravida. Morbi et porta felis. Vivamus in diam augue. In in convallis diam.

                    Integer semper vestibulum turpis eget lobortis. 
                </div>
                <div class="content_alur_pengusulan col-lg-5 col-md-5 col-sm-6 col-xs-12">
                <?php
                    //if (empty($data_foto_profile)){ ?>
                    <img class="img_alur_pengusulan right" src="/assets/img/update.png">
                    <?php //} else { ?>
                    <!-- <img class="img_alur_pengusulan" src="/assets/img/login3.png"> -->
                    <?php //} ?>
                </div>
            </div>
            <?php //} ?>



    </div>
</section>










  <!-- ======= Info PMB ======= -->
  <!-- <section id="team" class="faq section-bg">
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
  </section> -->

</main>
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>

CountDownTimer("<?php echo $timer->waktu;?>", 'hari', 'jam', 'menit', 'detik');
function CountDownTimer(dt, id1, id2, id3,id4)
{
var end = new Date(dt);

var _second = 1000;
var _minute = _second * 60;
var _hour = _minute * 60;
var _day = _hour * 24;
var timer;

function showRemaining() {
var now = new Date();
var distance = end - now;
var distance1 = now - end;
if(distance1 > 0){
clearInterval(timer);
return;
}
var days = Math.floor(distance / _day);
var hours = Math.floor((distance % _day) / _hour);
var minutes = Math.floor((distance % _hour) / _minute);
var seconds = Math.floor((distance % _minute) / _second);

// document.getElementById(id1).innerHTML = days + ' Hari';
document.getElementById(id1).innerHTML = days;
document.getElementById(id2).innerHTML = hours;
document.getElementById(id3).innerHTML = minutes;
document.getElementById(id4).innerHTML = seconds;
}

timer = setInterval(showRemaining, 1000);
}

</script>
<?= $this->endSection() ?>