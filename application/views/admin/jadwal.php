<!-- Begin Page Content -->

<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        
        <!-- Flash messages for success or error -->
        <?php if ($this->session->flashdata('category_success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('category_success') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('category_error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('category_error') ?>
            </div>
        <?php endif; ?>

        <!-- Button for adding new video -->
        <a href="<?= base_url('admin/tambah_jadwal'); ?>" class="btn btn-primary mb-3">Tambah Baru</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Tanggal dan Jam</th>
                                <th scope="col">Sekolah 1</th>
                                <th scope="col">Sekolah 2</th>
                                <th scope="col">Skor 1</th>
                                <th scope="col">Sekolah 2</th>

                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jadwal as $j): ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $j['tanggal']; ?></td>
                                    <td><?= $j['sekolah1']; ?></td>
                                    <td><?= $j['sekolah2']; ?></td>
                                    <td><?= $j['skor1']; ?></td>
                                    <td><?= $j['skor2']; ?></td>
                                    <td>
                                        
                                        <a href="<?= base_url(); ?>admin/hapus_jadwal/<?= $j['id_jadwal']; ?>" class="btn btn-danger" onclick="return confirm('Data akan dihapus');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>admin/edit_jadwal/<?= $j['id_jadwal']; ?>" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->

<!-- Page level plugins -->
