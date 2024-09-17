<?php
    // Fungsi untuk memotong string hingga tanda "-"
    function sub_string($formatted_date) {
        // Pisahkan string berdasarkan "-"
        $parts = explode('-', $formatted_date);
        
        // Ambil bagian pertama saja sebelum tanda "-"
        return trim($parts[0]); // trim untuk menghapus spasi yang tidak diinginkan
    }
?>



<main class="page">
    <section class="clean-block">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Jadwal</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.
                </p>
            </div>
            <div class="row justify-content-center">
                <?php 
                $last_date = ''; // Variable untuk menyimpan tanggal sebelumnya
                foreach ($jadwal as $item): 
                    // Format tanggal tanpa waktu
                    $formatted_date = tanggal_indonesia(date('Y-m-d', strtotime($item['tanggal'])));
                    
                    // Jika tanggal baru, tampilkan heading baru
                    if ($formatted_date !== $last_date): 
                        $last_date = $formatted_date; // Update last_date


                    
                ?>
                    <div class="col-12">
                        <h3 class="text-center"><?= sub_string($formatted_date); ?></h3> <!-- Tampilkan Tanggal sebagai Heading -->
                        <hr>
                    </div>
                <?php 
                    endif; // End pengelompokan per tanggal
                ?>
                
                <div class="card">
                    <div class="card-header">
                        <?= date('H:i', strtotime($item['tanggal'])); ?> <!-- Tampilkan Hanya Waktu -->
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <div class="image-container">
                                <!-- Gambar pertama -->
                                <div class="image-item">
                                    <img width="300px" height="300px" src="<?= base_url('assets/img/sekolah/').$item['gambar_sekolah1']; ?>" alt="Responsive image">
                                    <p class="image-text"><?= $item['sekolah1']; ?></p>
                                    <p class="image-text"><?= $item['skor1']; ?></p>
                                </div>
                                
                                <!-- Teks vs di tengah -->
                                <span class="vs-text">vs</span>
                                
                                <!-- Gambar kedua -->
                                <div class="image-item">
                                    <img width="300px" height="300px" src="<?= base_url('assets/img/sekolah/').$item['gambar_sekolah2']; ?>" alt="Responsive image">
                                    <p class="image-text"><?= $item['sekolah2']; ?></p>
                                    <p class="image-text"><?= $item['skor2']; ?></p>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                </div>
                <br>
                <?php endforeach; ?>
            </div>
        </div>
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
