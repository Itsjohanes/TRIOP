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
                <section class="clean-block">
                    <div class="container">
                        <div class="block-heading">
                            <h2 class="text-info">Jadwal & Hasil</h2>
                          
                        </div>

            <!-- Wrapper for Horizontal Scroll -->
                <div id="slider" class="filter-buttons-wrapper" style="overflow: hidden;">
                    <div class="swipe-wrap">
                        <div class="filter-buttons text-center mb-4 d-inline-block">
                            <button class="btn btn-secondary square-button" onclick="filterJadwal('all')">All</button>
                            <?php foreach ($unique_dates as $date): ?>
                                <button class="btn btn-secondary square-button" onclick="filterJadwal('<?= $date; ?>')"><?= $date; ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>





            <div class="row justify-content-center" id="jadwal-container">
                <?php 
                $last_date = ''; // Variable untuk menyimpan tanggal sebelumnya
                foreach ($jadwal as $item): 
                    // Format tanggal tanpa waktu
                    $formatted_date = tanggal_indonesia(date('Y-m-d', strtotime($item['tanggal'])));
                    $date_only = sub_string($formatted_date); // Ambil hanya bagian tanggal
                ?>
                    <div class="col-12 col-md-10 jadwal-item" data-date="<?= $date_only; ?>">
                        <?php if ($formatted_date !== $last_date): 
                            $last_date = $formatted_date; ?>
                            <h3 class="text-center"><?= $date_only; ?></h3> <!-- Tampilkan Tanggal sebagai Heading -->
                            <hr>
                        <?php endif; ?>
                        
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
    </section>
</main>

<!-- JavaScript Filter Function -->
<script>
    function filterJadwal(date) {
        var items = document.querySelectorAll('.jadwal-item');
        items.forEach(function(item) {
            if (date === 'all' || item.getAttribute('data-date') === date) {
                item.style.display = 'block'; // Show items that match the date
            } else {
                item.style.display = 'none'; // Hide items that don't match
            }
        });

        // Ganti tombol aktif
        var buttons = document.querySelectorAll('.filter-buttons .btn');
        buttons.forEach(function(button) {
            button.classList.remove('btn-active'); // Hapus kelas aktif dari semua tombol
        });

        // Tambahkan kelas aktif pada tombol yang diklik
        event.target.classList.add('btn-active');
    }
</script>


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

<script>
var slider = new Swipe(document.getElementById('slider'), {
  startSlide: 0,
  speed: 400,
  draggable: true,
  auto: false,
  continuous: false, // Set to false if you don't want infinite looping
  stopPropagation: true,
  callback: function(index, element) {
    console.log('Slide changed to ' + index);
  },
  transitionEnd: function(index, element) {
    console.log('Transition ended on slide ' + index);
  }
});

</script>
<script src="https://unpkg.com/swipejs@2.2.1/swipe.min.js"></script>
