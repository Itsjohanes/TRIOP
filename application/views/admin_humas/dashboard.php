<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard Admin Humas</li>
            </ol>

            <!-- Row pertama: Total Konten, Total Video, Total Berita -->
            <div class="row">
                <!-- Total Konten -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">Total Konten</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahContent; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Video -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">Total Video</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahVideo; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Berita -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">Total Berita</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahBerita; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row kedua: Total Sponsor, Total Sekolah, Total Pendaftaran -->
            <div class="row">
                <!-- Total Sponsor -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">Total Sponsor</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahSponsor; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Sekolah -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">Total Sekolah</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahSekolah; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Pendaftaran -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">Total Pendaftaran</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahPendaftaran; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row ketiga: Total Jadwal -->
            <div class="row">
                <!-- Total Jadwal -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">Total Jadwal</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahJadwal; ?>
                        </div>
                    </div>
                </div>
                <!-- Total Sekolah -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">Total Testimoni</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahTestimoni; ?>
                        </div>
                    </div>
                </div>

                <!-- Total Pendaftaran -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">Total Media Partner</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahMedia; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">Total Kampus Partner</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $jumlahKampus; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </main>
</div>
