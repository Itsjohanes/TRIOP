   <main class="page">
      <section class="clean-block">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Jadwal</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam
              urna, dignissim nec auctor in, mattis vitae leo.
            </p>
          </div>
          <div class="row justify-content-center">
          <?php foreach ($jadwal as $item): ?>
          <div class="card">
            <div class="card-header">
              <?= tanggal_indonesia($item['tanggal']); ?> <!-- Tampilkan Hari, Tanggal, dan Waktu dalam Format Indonesia -->
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <div class="image-container">
                  <!-- Gambar pertama -->
                  <div class="image-item">
                    <img width="300px" height="300px" src="<?= base_url('assets/img/sekolah/').$item['gambar_sekolah1']; ?>"  alt="Responsive image">
                    <p class="image-text"><?= $item['sekolah1']; ?></p>
                  </div>
                  
                  <!-- Teks vs di tengah -->
                  <span class="vs-text">vs</span>
                  
                  <!-- Gambar kedua -->
                  <div class="image-item">
                    <img width="300px" height="300px" src="<?= base_url('assets/img/sekolah/').$item['gambar_sekolah2']; ?>"  alt="Responsive image">
                    <p class="image-text"><?= $item['sekolah2']; ?></p>
                  </div>
                </div>
              </blockquote>
            </div>
          </div>
          <br>

        <?php endforeach; ?>


      </section>
    </main>
    <style>
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
    background: white; /* Optional: to ensure text visibility over images */
    padding: 0 10px; /* Optional: to add space around the text */
  }

  .image-text {
    margin-top: 8px; /* Space between image and text */
    font-size: 18px;
    font-weight: bold;
    color: #333;
  }
</style>