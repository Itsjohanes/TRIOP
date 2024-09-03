<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Admin Area</div>
                    <?php
                    if ($title == 'Dashboard') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('Admin') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('Admin') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Video Youtube</div>

                    <?php
                    if ($title == 'Video Youtube') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/video') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/video') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Siswa
                    </a>
                    <div class="sb-sidenav-menu-heading">Laporan Keterlambatan</div>

                    <?php
                    if ($title == 'Mencatat Keterlambatan') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('Admin/terlambat') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('Admin/terlambat') . '">';
                    }
                    ?> <div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
                    Mencatat Keterlambatan
                    </a>
                    <?php
                    if ($title == 'Cetak Laporan') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('Admin/laporan') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('Admin/laporan') . '">';
                    }
                    ?> <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Cetak Laporan
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $this->session->userdata('nama'); ?>
            </div>
        </nav>
    </div>