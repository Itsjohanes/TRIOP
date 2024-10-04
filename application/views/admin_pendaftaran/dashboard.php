<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard Admin Pendaftaran</li>
            </ol>


            <!-- Row kedua: Total Sponsor, Total Sekolah, Total Pendaftaran -->
            <div class="row">
                <!-- Total Sponsor -->
             
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

            
        </div>
    </main>
</div>
