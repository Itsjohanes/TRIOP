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
				 <?php
                // Assuming the status is retrieved from the database
                $status = $this->db->get_where('tb_aktifpendaftaran', ['id_aktifpendaftaran' => 1])->row_array()['status'];
                $btnText = $status == 1 ? 'Matikan Pendaftaran' : 'Nyalakan Pendaftaran';
                $btnClass = $status == 1 ? 'btn-danger' : 'btn-success';
            ?>
            <div class="mb-3">
                <form action="<?= base_url('admin/ubahstatuspendaftaran'); ?>" method="post">
                    <input type="hidden" name="status" value="<?= $status; ?>">
                    <button type="submit" class="btn <?= $btnClass; ?>">
                        <?= $btnText; ?>
                    </button>
                </form>
            </div>

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
                                    <img width="300px" height="300px" src="<?php echo base_url('assets/img/pendaftaran/').$j['bukti'];?>" />

                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/hapus_pendaftaran/' . $j['id_pendaftaran']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
