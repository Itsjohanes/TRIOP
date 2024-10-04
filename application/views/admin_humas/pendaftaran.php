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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pendaftaran as $j): ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $j['nama']; ?></td>
                                    <td><?= $j['sekolah']; ?></td>
                                    <td><?= $j['nomor']; ?></td>
                                    <td>
                                        <?php
                                        // Tentukan tipe MIME berdasarkan data base64
                                        $mime_type = finfo_buffer(finfo_open(), base64_decode($j['bukti']), FILEINFO_MIME_TYPE);
                                        ?>
                                        <img width="300px" height="300px" src="data:<?php echo $mime_type; ?>;base64,<?php echo $j['bukti']; ?>" />
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin_humas/hapus_pendaftaran/' . $j['id_pendaftaran']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
