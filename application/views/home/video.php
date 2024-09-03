
    <main class="page">
      <section class="clean-block clean-pricing dark">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Video Pertandingan</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam
              urna, dignissim nec auctor in, mattis vitae leo.
            </p>
          </div>
          <div class="row justify-content-center">
            <!-- Video 1 -->
                <!-- Video 1 -->
               <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($video as $v): ?>
                        <div class="col-md-5 col-lg-4">
                            <div class="clean-pricing-item">
                                <h4><?= htmlspecialchars($v['judul']); ?></h4>
                                <div class="embed-responsive embed-responsive-16by9">
                                 
                                    <iframe
                                        class="embed-responsive-item"
                                        src="https://www.youtube.com/embed/<?= $v['link']; ?>"
                                        allowfullscreen
                                    ></iframe>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
<!-- End of Page Content -->

          </div>
        </div>
      </section>
    </main>
