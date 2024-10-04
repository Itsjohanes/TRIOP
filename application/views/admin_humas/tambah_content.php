<!-- Begin Page Content -->
<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Content</h1>

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

        <!-- Form for adding a new content -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <?= form_open_multipart('admin_humas/submit_content'); ?>
                    <div class="form-group">
                        <label for="gambar">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Content</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept=".png, .jpg, .jpeg">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Tambah Content</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
