<main class="page">
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Berita Seputar Triop</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
					<?php foreach ($berita as $a): ?>
					<div class="row d-flex flex-wrap justify-content-center">

						<div class="col-md-6 feature-box">
							<img src="<?= base_url('assets/img/berita/').$a['gambar']; ?>" alt="<?= $a['judul']; ?>" class="img-fluid">
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

	