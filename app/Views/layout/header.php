<?php

use App\Models\Konfigurasi_model;
use App\Models\Menu_model;

$konfigurasi  = new Konfigurasi_model;
$menu         = new Menu_model();
$site         = $konfigurasi->listing();
$menu_berita  = $menu->berita();
$menu_profil  = $menu->profil();

?>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
    <div class="align-items-center d-none d-md-flex">
      <i class="fa fa-home"></i> <?php echo tagline(); ?>
    </div>
    <div class="d-flex align-items-center">
    </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <a href="index.html" class="logo me-auto"><img src="<?php echo base_url('assets/upload/image/' . $site['logo']) ?>" alt="<?php echo $site['namaweb'] ?>"></a>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto " href="<?php echo base_url() ?>">Home</a></li>
        <?php if (count($menu_profil) == 1) : ?>
          <li><a href="<?php echo base_url('berita/profil/' . $menu_profil[0]['slug_berita']) ?>">Profil</a></li>
        <?php else : ?>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($menu_profil as $menu_item) { ?>
                <li><a href="<?php echo base_url('berita/profil/' . $menu_item['slug_berita']) ?>"><?php echo $menu_item['judul_berita'] ?></a></li>
              <?php } ?>
            </ul>
          </li>
        <?php endif; ?>

        <li><a href="<?php echo base_url('berita') ?>"><span>Berita</span></a>
            <?php foreach ($menu_berita as $menu_berita) { ?>
              <li><a href="<?php echo base_url('berita/kategori/' . $menu_berita['slug_kategori']) ?>"><?php echo $menu_berita['nama_kategori'] ?></a></li>
            <?php } ?>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <a href="<?php echo base_url('login') ?>" class="appointment-btn scrollto">
      Login <span class="d-none d-md-inline">Admin</span>
    </a>

  </div>
</header><!-- End Header -->