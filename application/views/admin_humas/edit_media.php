<!-- Begin Page Content -->
<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Media</h1>

        <!-- Flash messages for success or error -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form for adding a new video -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <?= form_open_multipart('admin_humas/update_media'); ?>
                    <div class="form-group">
                        <input type = "hidden" name = "id" value = "<?php echo $media['id_media'];?>" >
                        <label for="nama">Nama media</label>
                        <input type="text" value = "<?php echo $media['nama'];?>" class="form-control" id="nama" name="nama" required>
                    </div>
                   
                    <div class="form-group">
                     <label class="form-label" for="message">Gambar media</label
                        >
                    <br>
                    <img width = "300px" height = "100px" src = "<?php echo base_url('assets/img/media/').$media['gambar'];?>">
                        <input
                            class="form-control"
                            id="file-upload"
                            name="gambar"
                            type="file"
                            accept=".png, .jpg, .jpeg"
                            data-bs-theme="light"
                            />
                    </div>

                     <br>
                    <button type="submit" class="btn btn-primary">Edit media</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });

  // Handle form submission
document.querySelector('form').onsubmit = function() {
    // Get HTML content from Quill editor
    var content = quill.root.innerHTML;

    // Set the value of the hidden input field
    document.querySelector('#hidden_isi').value = content;
};
</script>


