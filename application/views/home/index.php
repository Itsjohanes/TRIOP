<?php
    // Fungsi untuk memotong string hingga tanda "-"
    function sub_string($formatted_date) {
        // Pisahkan string berdasarkan "-"
        $parts = explode('-', $formatted_date);
        
        // Ambil bagian pertama saja sebelum tanda "-"
        return trim($parts[0]); // trim untuk menghapus spasi yang tidak diinginkan
    }

    // Mengambil semua tanggal unik dari jadwal
    $unique_dates = array();
    foreach ($jadwal as $item) {
        $formatted_date = tanggal_indonesia(date('Y-m-d', strtotime($item['tanggal'])));
        $date_only = sub_string($formatted_date);
        if (!in_array($date_only, $unique_dates)) {
            $unique_dates[] = $date_only;
        }
    }
?>
  
  <main class="page">
        <section
        class="clean-block clean-hero"
        style="
          background-image: url('assets/img/triop2023.png');
          color: rgba(9, 162, 255, 0);
          background-position: center;
          background-size: cover;
          background-size: contain;
          background-attachment: scroll;
        "
      >
        <div class="text">
          <h2>TRIOP SMA TRINITAS 2025</h2>
       		<p>
            Pertandingan Basket Tingkat SMP dan SMA Se-Bandung Raya
          </p>
        </div>
      </section>


      <section class="clean-block clean-info dark">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Info</h2>
           
          </div>
          <div class="row align-items-center">
            <div class="col-md-6">
              <img class="img-thumbnail" src="<?php echo base_url('assets/img/triop2023.png');?>" />
            </div>
            <div class="col-md-6">
              <h3>Pendaftaran Trinitas Open</h3>
              <div>
                <p>
                  Untuk melakukan pendaftaran perlombaan basket Trinitas Open anda dapat menekan link berikut ini:
                </p>
              </div>
              <a href = "<?php echo base_url('home/pendaftaran');?>" class="btn btn-outline-primary btn-lg" type="button">
                Daftar Sekarang
              </a>
            </div>
          </div>
        </div>
      </section>
      <hr class="my-4"> 
      <!-- Garis pemisah antar section -->
      <section class="clean-block clean-info dark">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Sejarah Trinitas Open</h2>
           
          </div>
          <h6 style="text-align: justify;">Trinitas Open, atau sering disingkat TRIOP, adalah kejuaraan bola basket tahunan yang diselenggarakan oleh SMA Trinitas Bandung. Acara ini dimulai pada tahun [tahun mulai] dan sejak saat itu telah menjadi salah satu event olahraga bergengsi di wilayah ini. TRIOP tidak hanya berfungsi sebagai ajang kompetisi antar sekolah, tetapi juga sebagai platform untuk mempererat persahabatan dan mempromosikan semangat sportivitas di kalangan pelajar.

Kejuaraan ini menarik berbagai tim dari berbagai sekolah, yang bersaing dalam pertandingan yang sengit dan penuh semangat. TRIOP bertujuan untuk mengembangkan bakat olahraga, membangun karakter, dan memupuk kerjasama tim di antara para peserta. Selain pertandingan, acara ini juga dilengkapi dengan berbagai kegiatan dan hiburan yang membuat suasana semakin meriah.

Dengan komitmen untuk terus meningkatkan kualitas dan pengalaman acara, TRIOP berfungsi sebagai simbol prestasi dan dedikasi SMA Trinitas dalam memajukan olahraga di tingkat pelajar</h6>
    <section class="container my-5">
    <div class="row">

        <?php foreach ($videosejarah as $video): ?>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <iframe class="w-100" height="315" src="https://www.youtube.com/embed/<?= $video['link'] ?>" title="<?= $video['judul'] ?>" allowfullscreen></iframe>
                    <h5 class="mt-3"><?= $video['judul'] ?></h5>
                    <p class="text-muted">Tahun: <?= $video['tahun'] ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
  </section>




        </div>
      </section>
      <hr class="my-4"> <!-- Garis pemisah antar section -->

      <section class="clean-block slider dark">
          <div class="block-heading">
            <h2 class="text-info">Jadwal & Score Terkini</h2>
             <div class="row justify-content-center" id="jadwal-container">

              <?php 
               $last_date = ''; // Variable untuk menyimpan tanggal sebelumnya
                foreach ($jadwal as $item): 
                    // Format tanggal tanpa waktu
                    $formatted_date = tanggal_indonesia(date('Y-m-d', strtotime($item['tanggal'])));
                    $date_only = sub_string($formatted_date); // Ambil hanya bagian tanggal
                ?>
                    <div class="col-12 col-md-10 jadwal-item" data-date="<?= $date_only; ?>">
                            <h3 class="text-center"><?= $date_only; ?></h3> <!-- Tampilkan Tanggal sebagai Heading -->
                            <hr>
                        
                        <div class="card">
                            <div class="card-header text-center">
                                <?= date('H:i', strtotime($item['tanggal'])); ?> <!-- Tampilkan Hanya Waktu -->
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <div class="row image-container text-center">
                                        <!-- Gambar pertama -->
                                        <div class="col-6 image-item">
                                            <img class="img-fluid custom-img-size" src="<?= base_url('assets/img/sekolah/').$item['gambar_sekolah1']; ?>" alt="Responsive image">
                                            <p class="image-text"><?= $item['sekolah1']; ?></p>
                                            <p class="image-text"><?= $item['skor1']; ?></p>
                                        </div>
                                        
                                        <!-- Teks vs di tengah -->
                                        <div class="col-12 vs-text d-flex align-items-center justify-content-center">
                                            <span>vs</span>
                                        </div>
                                        
                                        <!-- Gambar kedua -->
                                        <div class="col-6 image-item">
                                            <img class="img-fluid custom-img-size" src="<?= base_url('assets/img/sekolah/').$item['gambar_sekolah2']; ?>" alt="Responsive image">
                                            <p class="image-text"><?= $item['sekolah2']; ?></p>
                                            <p class="image-text"><?= $item['skor2']; ?></p>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <br>
                    </div>
                <?php endforeach; ?>
                        </div>
          </div>
          <hr class="my-4"> <!-- Garis pemisah antar section -->

      
      </section>
      <section class="clean-block slider dark">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Dokumentasi</h2>
           
          </div>
          <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
              <?php $active_class = 'active'; ?>
              <?php foreach ($content as $item): ?>
                <div class="carousel-item <?= $active_class; ?>">
                  <img class="w-100 d-block" src="<?= base_url('assets/img/content/') . $item['gambar']; ?>" alt="Slide Image">
                </div>
                <?php $active_class = ''; // Remove active class after the first item ?>
              <?php endforeach; ?>
            </div>
            <div>
              <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
            <div class="carousel-indicators">
              <?php foreach ($content as $index => $item): ?>
                <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="<?= $index; ?>" class="<?= ($index === 0) ? 'active' : ''; ?>"></button>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
      </section>
      <hr class="my-4"> <!-- Garis pemisah antar section -->

      <section class="clean-block">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Daftar Sekolah</h2>
           
          </div>
          <div class="row justify-content-center">
        <?php foreach ($sekolah as $item): ?>
        <div class="col-sm-5 col-lg-3">
            <div class="card text-center clean-card">
                <img
                    class="card-img-top w-100 d-block"
                    src="<?php echo base_url('assets/img/sekolah/' . $item['gambar']); ?>"
                    width = "300px"
                    height = "300px"
                    alt="<?php echo $item['nama']; ?>"
                />
                <div class="card-body info">
                    <h4 class="card-title"><?php echo $item['nama']; ?></h4>
                    
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        </div>
      </section>
      <hr class="my-4"> <!-- Garis pemisah antar section -->

      <section class="clean-block">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Sponsor</h2>
           
          </div>
          <div class="row justify-content-center">
          <?php foreach ($sponsor as $i): ?>

            <div class="col-sm-6 col-lg-4">
              <div class="card text-center clean-card">
                <img
                  class="card-img-top w-100 d-block"
                  src="<?php echo base_url('assets/img/sponsor/'.$i['gambar']);?>"
                />
                <div class="card-body info">
                  <h4 class="card-title"><?php echo $i['nama'];?></h4>
                  <div class="icons">
                    <a href="#"></a><a href="#"></a><a href="#"></a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            
          </div>
        </div>
      </section>
    </main>

    <style>
        .custom-img-size {
            width: 300px; /* Atur lebar gambar sesuai keinginan */
            height: 200px; /* Menjaga proporsi gambar */
            object-fit: contain; /* Menjaga agar gambar tetap dalam batas kontainer */
        }

        .image-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .image-item {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;

        }
        .vs-text {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            font-weight: bold;
            color: #333;
            padding: 0 10px; /* Optional: to add space around the text */
        }
        .image-text {
            margin-top: 8px; /* Space between image and text */
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        /* Tombol yang sedang aktif */
        .btn-active {
            background-color: #007bff; /* Warna biru untuk tombol aktif */
            color: white;
        }

        .square-button {
            width: 60px;  /* Menentukan ukuran lebar */
            height: 60px; /* Menentukan ukuran tinggi agar tombol berbentuk persegi */
            padding: 0;
            font-size: 8px; /* Mengatur ukuran font menjadi lebih kecil */
            white-space: normal;

        }
        .filter-buttons-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            scroll-snap-type: x mandatory; /* Mengaktifkan scroll snap */
            -webkit-overflow-scrolling: touch; /* Menghaluskan scroll pada perangkat mobile */
            padding-left: 15px; /* Jarak dari tepi kiri */
            padding-right: 15px; /* Jarak dari tepi kanan */
        }

        .square-button {
            scroll-snap-align: start; /* Menjaga tombol-tombol berada pada posisi awal saat di-scroll */
            margin-right: 10px;
            min-width: 80px; /* Sesuaikan lebar minimum tombol */
            flex-shrink: 0; /* Pastikan tombol tidak menyusut */
        }
        .filter-buttons-wrapper {
            display: flex;
            justify-content: flex-start; /* Mulai dari kiri */
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            width: 100%;
            padding-left: 15px;
            padding-right: 15px;
        }

        .filter-buttons button:first-child {
            margin-left: 10px;
        }

        /* Wrapper harus overflow pada mobile dan responsive di desktop */
        #slider {
            width: 100%;
            overflow: hidden;
        }

        .swipe-wrap {
            display: flex;
            width: 100%;
            justify-content: center; /* Untuk center di desktop */
        }

        .filter-buttons {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center; /* Untuk memastikan tombol di tengah pada desktop */
            white-space: nowrap;
        }

        .square-button {
            min-width: 100px; /* Sesuaikan dengan ukuran tombol */
            margin-right: 10px;
            flex-shrink: 0;
        }

        @media (max-width: 768px) {
            /* Mode mobile */
            .filter-buttons-wrapper {
                justify-content: flex-start; /* Mulai dari kiri pada mobile */
                overflow-x: auto; /* Aktifkan horizontal scrolling */
                scroll-snap-type: x mandatory; /* Aktifkan scroll snap */
                -webkit-overflow-scrolling: touch;
            }

            .swipe-wrap {
                justify-content: flex-start; /* Agar swipe berjalan dari kiri ke kanan */
            }

            .filter-buttons {
                justify-content: flex-start; /* Item mulai dari kiri */
            }
        }




</style>
