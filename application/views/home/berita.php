<main class="page">
    <section class="clean-block features">
        <div class="container-fluid"> <!-- Changed to container-fluid for full-width layout -->
            <div class="block-heading">
                <h2 class="text-info text-center">Berita Seputar Triop</h2> <!-- Center the heading -->
            </div>

            <?php foreach ($berita as $a): ?>
            <div class="row d-flex justify-content-center mb-4"> <!-- Adjusted margin-bottom -->

                <!-- Column setup: full width on small screens, 6 columns on medium screens -->
                <div class="col-md-6 col-12 feature-box px-3"> <!-- Added padding-x control -->
                    <img src="<?= base_url('assets/img/berita/').$a['gambar']; ?>" alt="<?= $a['judul']; ?>" class="img-fluid w-100"> <!-- Ensure full width image -->
                    <h4><?= $a['judul']; ?></h4>
                    <p>
                        <?php 
                            // Clean up the content
                            $content = "";
                            $content = trim($a['isi']);
                            $content = preg_replace('/\s+/', ' ', $content);

                            // Display the first 10 words of the content
                            $words = explode(' ', $content);
                            $shortContent = implode(' ', array_slice($words, 0, 10));
                            echo $shortContent . '...';
                        ?>
                        <a href="<?php echo base_url('home/detail_berita/').$a['id_berita'];?>">Baca Selengkapnya</a>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>
</main>
