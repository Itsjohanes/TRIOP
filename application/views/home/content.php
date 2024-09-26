<main class="page">
    <section class="clean-block features">
        <div class="container-fluid">
            <div class="block-heading">
                <h2 class="text-info text-center">Content Triop</h2>
            </div>
            <div class="container my-4">
                <div
                    class="row gy-4 isotope-container"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <!-- Dilooping $content -->
                    <?php foreach ($content as $item): ?>
                        <div class="col-md-4">
                            <div class="portfolio-item">
                                <a href="<?php echo base_url('assets/img/content/').$item['gambar']; ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img
                                        src="<?php echo base_url('assets/img/content/').$item['gambar']; ?>"
                                        class="img-fluid"
                                        alt="<?php echo $item['judul']; ?>"
                                    />
                                </a>
                                <div class="portfolio-info">
                                    <h4><?php echo $item['judul']; ?></h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<style>

    .portfolio-item {
    position: relative;
    overflow: hidden;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    transition: transform 0.3s ease; /* Smooth hover effect */
}

.portfolio-item:hover {
    transform: scale(1.05); /* Scale up on hover */
}

.portfolio-item img {
    border-radius: 8px; /* Match image with rounded corners */
}

.portfolio-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 15px;
    background: rgba(0, 0, 0, 0.7); /* Dark overlay */
    color: #fff; /* Text color */
    opacity: 0;
    transition: opacity 0.3s ease; /* Smooth fade in/out */
}

.portfolio-item:hover .portfolio-info {
    opacity: 1; /* Show info on hover */
}

</style>