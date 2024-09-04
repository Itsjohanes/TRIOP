<main class="page">
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Berita Seputar Triop</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
               <div class="row justify-content-center">
				<!-- News Post 1 -->
				<?php foreach ($berita as $berita): ?>
				<div class="col-md-5 feature-box">
					<img src="<?= base_url('assets/img/berita/').$berita['gambar']; ?>" alt="<?= $berita['judul']; ?>" class="img-fluid">
					<h4><?= $berita['judul']; ?></h4>
					<p>
						<?php 
							// Display the first 20 words of the content
							$words = explode(' ', $berita['isi']);
							$shortContent = implode(' ', array_slice($words, 0, 20));
							echo $shortContent . '...';
						?>
						<a href="<?php echo base_url('home/detail_berita/').$berita['id_berita'];?>">Baca Selengkapnya</a>
					</p>
				</div>
			<?php endforeach; ?>

			</div>

            </div>
        </section>
    </main>