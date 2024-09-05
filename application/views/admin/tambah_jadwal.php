<!-- Begin Page Content -->
<div id="layoutSidenav_content">
    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Jadwal</h1>

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

        <!-- Form for adding a new schedule -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <?= form_open_multipart('admin/submit_jadwal'); ?>
                    <!-- Select Sekolah 1 -->
                    <div class="form-group">
                        <label for="sekolah1">Sekolah 1</label>
                        <select name="id_sekolah1" id="sekolah1" class="selectpicker form-control" data-live-search="true" title="Pilih Sekolah 1">
                            <?php foreach ($sekolah as $s): ?>
                                <option value="<?= $s['id_sekolah']; ?>"><?= $s['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Select Sekolah 2 -->
                    <div class="form-group">
                        <label for="sekolah2">Sekolah 2</label>
                        <select name="id_sekolah2" id="sekolah2" class="selectpicker form-control" data-live-search="true" title="Pilih Sekolah 2">
                            <?php foreach ($sekolah as $s): ?>
                                <option value="<?= $s['id_sekolah']; ?>"><?= $s['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                     <div class="form-group"> 
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>                  
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
