<!-- Begin Page Content -->
<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah kampus</h1>

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
                <?= form_open_multipart('admin/submit_kampus'); ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                     <label class="form-label" for="message">Gambar</label
                        ><input
                            class="form-control"
                            id="file-upload"
                            name="gambar"
                            type="file"
                            accept=".png, .jpg, .jpeg"
                            data-bs-theme="light" required
                            />
                    </div>

                     <br>
                    <button type="submit" class="btn btn-primary">Tambah kampus</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>


