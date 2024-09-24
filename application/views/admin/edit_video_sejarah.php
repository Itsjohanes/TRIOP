<!-- Begin Page Content -->
<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Video</h1>

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
                <?= form_open('admin/update_video_sejarah'); ?>
                    <div class="form-group">
                        <label for="judul">Judul Video</label>
                        <input type="hidden" class="form-control" id="id" name="id" value = "<?php echo $video_sejarah['id_videosejarah'];?>" required>
                        <input type="text" class="form-control" id="judul" name="judul" value = "<?php echo $video_sejarah['judul'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link Video</label>
                        <input type="text" class="form-control" id="link" name="link" value = "<?php echo $video_sejarah['link'];?>" required>
                    </div>
                     <div class="form-group">
                        <label for="link">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value = "<?php echo $video_sejarah['tahun'];?>" required>
                    </div>                   
                    <button type="submit" class="btn btn-primary">Tambah Video</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
