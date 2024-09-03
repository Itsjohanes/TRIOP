<!-- /.container-fluid -->
<div id="layoutSidenav_content">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('Admin/runEditSiswa'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" value="<?php echo $siswa['id_siswa'];  ?>">

            <label for="link">Nama</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $siswa['nama_siswa'];  ?>">
            <label for="link">Kelas</label>
            <input type="text" class="form-control" id="kelas_siswa" name="kelas_siswa" value="<?php echo $siswa['kelas_siswa'];  ?>">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

    <!-- End of Main Content -->