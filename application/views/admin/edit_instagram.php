<!-- Begin Page Content -->
<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Instagram</h1>

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
                <?= form_open('admin/update_instagram'); ?>
                    <div class="form-group">
                        <input type="hidden" name="id" value = "<?php echo $instagram['id_instagram'];?>">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" id="link" name="link" value = "<?php echo $instagram['link'];?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
