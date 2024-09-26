<!-- Begin Page Content -->
<div id="layoutSidenav_content">
    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Jadwal</h1>

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
                <?= form_open_multipart('admin/update_jadwal'); ?>
                    <!-- Select Sekolah 1 -->
                    <div class="form-group">
                        <label for="sekolah1">Sekolah 1</label>
                       <select name="id_sekolah1" id="sekolah1" class="selectpicker form-control" data-live-search="true" title="Pilih Sekolah 1">
                        <?php foreach ($sekolah as $s): ?>
                            <option value="<?= $s['id_sekolah']; ?>" <?= ($jadwal['id_sekolah1'] == $s['id_sekolah']) ? 'selected' : ''; ?>>
                                <?= $s['nama']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    </div>

                    <!-- Select Sekolah 2 -->
                    <div class="form-group">
                        <label for="sekolah2">Sekolah 2</label>
                       <select name="id_sekolah2" id="sekolah2" class="selectpicker form-control" data-live-search="true" title="Pilih Sekolah 1">
                        <?php foreach ($sekolah as $s): ?>
                            <option value="<?= $s['id_sekolah']; ?>" <?= ($jadwal['id_sekolah2'] == $s['id_sekolah']) ? 'selected' : ''; ?>>
                                <?= $s['nama']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="link">Skor Sekolah 1</label>
                        <input type="number" value = "<?php echo $jadwal['skor1'];?>" class="form-control" id="skor1" name="skor1" >
                    </div>
                    <div class="form-group">
                        <label for="link">Skor Sekolah 2</label>
                        <input type="number" value = "<?php echo $jadwal['skor2'];?>" class="form-control" id="skor2" name="skor2" >
                    </div>                      
                     <div class="form-group"> 
                        <label for="tanggal">Tanggal</label>
                        <input type = "hidden" name = "id" value = "<?php echo $jadwal['id_jadwal'];?>">
                        <input type="datetime-local" value = "<?= $jadwal['tanggal'];?>" class="form-control" id="tanggal" name="tanggal" required>                  
                    </div>
                    <div class="form-group">
                        <label for="link">Tiket</label>
                        <input type="text" value = "<?php echo $jadwal['tiket'];?>" class="form-control" id="tiket" name="tiket" >
                    </div>   
                    <br>
                    <button type="submit" class="btn btn-primary">Edit Jadwal</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
