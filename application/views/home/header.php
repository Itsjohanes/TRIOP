<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title><?php echo $title; ?></title>
    <meta
      name="description"
      content="Trinitas Open (TRIOP) adalah kejuaraan basket tahunan yang diselenggarakan oleh SMA Trinitas Bandung, menampilkan tim-tim basket terbaik antar SMA. Bergabunglah dalam keseruan dan dukung tim favoritmu!"
    />
    <meta
      name="keywords"
      content="Trinitas Open, TRIOP, kejuaraan basket, SMA Trinitas, basket antar SMA, basket antar SMP, Bandung, turnamen basket, SMA Trinitas Bandung, kompetisi olahraga"
    />
    <meta name="author" content="SMA Trinitas Bandung" />    
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/ypii-hitam.png'); ?>">

    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'; ?>" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap"
    />
    <link rel="stylesheet" href="<?php echo base_url().'assets/fonts/simple-line-icons.min.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/baguetteBox.min.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/vanilla-zoom.min.css'; ?>" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top bg-body clean-navbar">
      <div class="container">
        <a class="navbar-brand logo" href="<?php echo base_url('home');?>">Trinitas Open</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navcol-1"
          aria-controls="navcol-1"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="navbar-nav ms-auto">
            <?php
              if ($menu == "Home") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home") . '">Home</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home") . '">Home</a></li>';
              }

              if ($menu == "Berita") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home/berita") . '">Berita</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home/berita") . '">Berita</a></li>';
              }

              if ($menu == "Content") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home/content") . '">Content</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home/content") . '">Content</a></li>';
              }              
              if ($menu == "Instagram") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home/instagram") . '">Instagram</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home/instagram") . '">Instagram</a></li>';
              }
              if ($menu == "Video Pertandingan") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home/video") . '">Video Pertandingan</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home/video") . '">Video Pertandingan</a></li>';
              }

              if ($menu == "Jadwal Pertandingan") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home/jadwal") . '">Jadwal & Hasil Pertandingan</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home/jadwal") . '">Jadwal & Hasil Pertandingan</a></li>';
              }

              if ($menu == "Berkas") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home/berkas") . '">Berkas</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home/berkas") . '">Berkas</a></li>';
              }
              
          


              if ($menu == "Pendaftaran") {
                  echo '<li class="nav-item"><a class="nav-link active" href="' . base_url("home/pendaftaran") . '">Pendaftaran</a></li>';
              } else {
                  echo '<li class="nav-item"><a class="nav-link" href="' . base_url("home/pendaftaran") . '">Pendaftaran</a></li>';
              }
            ?>
            <!-- Button Login -->
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth'); ?>">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
    </br>
    <!-- Add Bootstrap JS and Popper.js before closing body tag -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
