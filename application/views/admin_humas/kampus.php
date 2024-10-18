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
        <a href="<?= base_url('admin_humas/tambah_kampus'); ?>" class="btn btn-primary mb-3">Tambah Baru</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kampus as $j): ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $j['nama']; ?></td>
                                    <td><img width = "300px" height = "200px" src = "<?php echo base_url('assets/img/kampus/').$j['gambar'];?>"></td>
                                    <td>
                                        
                                        <a href="<?= base_url(); ?>admin_humas/hapus_kampus/<?= $j['id_kampus']; ?>" class="btn btn-danger" onclick="return confirm('Data akan dihapus');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="<?= base_url(); ?>admin_humas/edit_kampus/<?= $j['id_kampus']; ?>" class="btn btn-success">
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
