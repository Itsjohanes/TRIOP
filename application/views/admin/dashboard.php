<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard Admin</li>
            </ol>

            <div class="row">
                <!-- Total Admin -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Admin</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahAdmin; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Konten -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Konten</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahContent; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Video -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total Video</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahVideo; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Total Berita -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Berita</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahSekolah; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Sponsor -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Sponsor</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahSponsor; ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total Sekolah</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahSekolah; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Total Berita -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Pendaftaran</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahPendaftaran; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Sponsor -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Jadwal</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahJadwal; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>
