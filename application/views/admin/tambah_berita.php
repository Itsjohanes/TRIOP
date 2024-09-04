<!-- Begin Page Content -->
<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Berita</h1>

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
                <?= form_open_multipart('admin/submit_berita'); ?>
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Isi Berita</label>
                        <div id="editor">
                        </div>
                        <input type="hidden" name="isi" id="hidden_isi">
                    </div>

                    <div class="form-group">
                     <label class="form-label" for="message">Gambar Berita</label
                        ><input
                            class="form-control"
                            id="file-upload"
                            name="gambar"
                            type="file"
                            accept=".png, .jpg, .jpeg"
                            data-bs-theme="light"
                            />
                    </div>

                     <br>
                    <button type="submit" class="btn btn-primary">Tambah Berita</button>
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


