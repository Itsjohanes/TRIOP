<main class="page">
  <section class="clean-block clean-pricing dark">
    <div class="container">
      <div class="block-heading">
        <h2 class="text-info">Video Pertandingan</h2>
      </div>
      <div class="row justify-content-center">
        <!-- Video 1 -->
        <div class="container-fluid">
          <div class="row">
            <?php foreach ($video as $v): ?>
              <div class="col-md-5 col-lg-4 mb-4">
                <div class="clean-pricing-item">
                  <h4><?= htmlspecialchars($v['judul']); ?></h4>
                  <div class="ratio ratio-16x9">
                    <iframe
                      src="https://www.youtube.com/embed/<?= $v['link']; ?>"
                      allowfullscreen
                    ></iframe>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
