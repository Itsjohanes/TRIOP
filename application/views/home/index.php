
    <main class="page">
      <section
        class="clean-block clean-hero"
        style="
          background-image: url('assets/img/triop2023.png');
          color: rgba(9, 162, 255, 0.85);
        "
      >
        <div class="text">
          <h2>TRIOP SMA TRINITAS</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam
            urna, dignissim nec auctor in, mattis vitae leo.
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

