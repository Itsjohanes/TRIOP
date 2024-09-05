<!-- Begin Page Content -->
<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Akun</h1>

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
                <?= form_open_multipart('admin/submit_akun'); ?>
                    <div class="form-group">
                        <label for="judul">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="judul">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="judul">Password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>

                    
                     <br>
                    <button type="submit" class="btn btn-primary">Tambah Akun</button>
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


