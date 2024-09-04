<main class="page">
    <section class="clean-block features">
        <div class="container">
          <div class="block-heading">
                <!-- Main Content Area -->
                <div class="col-md-8">
                    <!-- News Title -->
                    <h1><?= $berita['judul']; ?></h1>
                    <!-- News Image -->
                    <img src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>" alt="<?= $berita['judul']; ?>" class="img-fluid mb-4">
                    <!-- Full News Content -->
                    
                </div>

                <!-- Optional Sidebar for Additional Content -->
                <div class="col-md-4">
                </div>
            </div>

        </div>
       <p id="berita"><?= nl2br($berita['isi']); ?></p>


        <style>
            .container {
                display: flex;
                justify-content: center; /* Center the container horizontally */
                padding: 0 15px; 
                /* Padding to ensure spacing */
                margin: 0 auto; /* Center the container with margin */
            }

            .row {
                width: 100%; /* Ensure the row takes full width */
                display: flex;
                justify-content: center; /* Center columns horizontally */
            }

            .col-md-8 {
                max-width: 1000px; /* Max width for the main content */
                text-align: left; /* Align text to the left within this column */
                margin: 0 auto; /* Center this column */
            }

            .col-md-4 {
                /* Optional styles for the sidebar, if needed */
                /* Ensure this column doesn't break the layout */
                margin: 0 auto; /* Center this column */
            }

            p {
                text-align: justify;
                margin: 0 auto;     /* Center the element horizontally */
                max-width: 1152px;  /* Set max-width sama seperti max-w-6xl Tailwind */
                word-wrap: break-word; /* Prevent word overflow */
               
            }
              
        </style>
    </section>
</main>
