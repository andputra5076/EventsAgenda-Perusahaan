<?php

use App\Models\Menu_model;

$menu         = new Menu_model();
$berita       = $menu->berita();
$profil       = $menu->profil();
$download       = $menu->download();


?>

<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      <?php $noslide = 1;
      foreach ($slider as $slider) {  ?>
        <!-- Slide 1 -->
        <div class="carousel-item<?php if ($noslide == 1) {
                                    echo ' active';
                                  } ?>" style="background-image: url(<?php echo base_url('assets/upload/image/' . $slider['gambar']) ?>)">
          <?php if ($slider['status_text'] == "Ya") {  ?>
          <?php } ?>
        </div>
      <?php $noslide++;
      } ?>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->


<main id="main">

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>Selamat datang di <?php echo $konfigurasi['namaweb'] ?></h3>
        <p><?php echo $konfigurasi['tagline'] ?></p>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="card">
        <div class="card-body">
          <table class="table" id="profil-table">
            <thead>
              <tr>
                <th>No</th>
                <th width="20%">Hari / Tanggal</th>
                <th width="15%">Waktu</th>
                <th width="35%">Kegiatan / Acara</th>
                <th width="25%">Tempat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $hari = array(
                'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
              );
              ?>
              <?php $pr = 1;
              foreach ($download as $data) { ?>
                <tr>
                  <td><?php echo $pr ?></td>
                  <td><?php
                      $tanggal = $data['tanggal'];
                      $nama_hari = date('l', strtotime($tanggal));
                      $nama_hari_indonesia = $hari[$nama_hari];
                      echo $nama_hari_indonesia . ', ' . date('d-m-Y', strtotime($data['tanggal']));
                      ?>
                  </td>
                  <td><?php echo date('H:i', strtotime($data['tanggal'])) ?> WIB</td>
                  <td><?php echo $data['nama_kegiatan'] ?></td>
                  <td><?php echo $data['tempat'] ?></td>
                  <td>
                    <button class="btn btn-sm" data-id="<?php echo $data['id_download']; ?>" data-toggle="modal" data-target="#downloadModal-<?php echo $data['id_download']; ?>">
                      <i class="nav-icon fa fa-download"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="downloadModal-<?php echo $data['id_download']; ?>" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel-<?php echo $data['id_download']; ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="downloadModalLabel-<?php echo $data['id_download']; ?>">Detail Kegiatan / Acara</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Hari, Tanggal: <?php
                                              $tanggal = $data['tanggal']; // Tanggal contoh

                                              // Ubah format tanggal menjadi nama hari dalam bahasa Indonesia
                                              $nama_hari = date('l', strtotime($tanggal)); // 'l' akan mengembalikan nama hari dalam bahasa Inggris

                                              // Menggunakan array yang telah dibuat sebelumnya
                                              $nama_hari_indonesia = $hari[$nama_hari];

                                              echo $nama_hari_indonesia . ', ' . date('d-m-Y', strtotime($data['tanggal'])); // Output: Minggu
                                              ?></p>
                            <p>Jam: <?php echo date('H:i', strtotime($data['tanggal'])); ?> WIB</p>
                            <p>Agenda: <?php echo $data['nama_kegiatan']; ?></p>
                            <p>Lokasi: <?php echo $data['tempat']; ?></p>
                            <p>Pelaksana: <?php echo $data['pelaksana']; ?></p>
                            <p>Tanggal: <?php echo date('d-m-Y H:i', strtotime($data['tanggal'])); ?> WIB</p>
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo base_url('assets/upload/file/' . $data['file']) ?>" class="btn btn-primary">Download File</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php $pr++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>



  </section><!-- End Featured Services Section -->


  <?php include('berita.php') ?>

</main><!-- End #main -->