<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <h2>Berita Terbaru</h2>
        <hr>
      </div>
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
      <?php foreach ($berita2 as $berita2) { ?>
        <div class="col-md-4">
          <div class="card" style="margin-bottom: 20px;">
            <img src="<?php echo base_url('assets/upload/image/' . $berita2['gambar']) ?>">
            <div class="card-body">
              <h3><?php echo $berita2['judul_berita'] ?></h3>
              <p class="card-text">
                <?php echo $berita2['ringkasan'] ?>
              </p>
              <p class="card-text">
                <small><?php
                      $tanggal = $berita2['tanggal_publish'];
                      $nama_hari = date('l', strtotime($tanggal));
                      $nama_hari_indonesia = $hari[$nama_hari];
                      echo $nama_hari_indonesia . ', ' . date('d-m-Y', strtotime($berita2['tanggal_publish']));
                      ?></small>
              </p>
              <hr>
              <p>
                <a href="<?php echo base_url('berita/read/' . $berita2['slug_berita']) ?>" class="btn btn-success">
                  <i class="fa fa-chevron-right"></i> Baca...
                </a>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section><!-- End Contact Section -->