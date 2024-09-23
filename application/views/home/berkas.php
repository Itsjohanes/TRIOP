  <main class="page">
  
  <div class="container my-5">
   
   <div class="block-heading">
        <br>
       <h2 class="text-info text-center">Berita Seputar Triop</h2> <!-- Center the heading -->
    </div>
    
    <!-- File Manager List -->
    <ul class="list-group">
      <!-- Looping item -->
       <?php foreach ($berkas as $b) : ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span><i class="bi bi-file-earmark-text"></i> <?php echo $b['nama'];?></span>
        <a class="badge bg-primary rounded-pill" href = "<?php echo base_url('./assets/berkas/').$b['file'];?>">Download</a>
       </li>
        <?php endforeach; ?>
      
    </ul>
  </div>

</main>