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
                    <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                    Video Youtube
                    </a>

                    <div class="sb-sidenav-menu-heading">Berita TRIOP</div>

                    <?php
                    if ($title == 'Berita Seputar TRIOP') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/berita') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/berita') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                    Berita
                    </a>

                    <div class="sb-sidenav-menu-heading">Sekolah</div>

                    <?php
                    if ($title == 'Sekolah') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/sekolah') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/sekolah') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    Sekolah
                    </a>

                    <div class="sb-sidenav-menu-heading">Jadwal</div>

                    <?php
                    if ($title == 'Jadwal') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/jadwal') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/jadwal') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                    Jadwal Pertandingan
                    </a>              
                    
                     <div class="sb-sidenav-menu-heading">Sponsor</div>

                    <?php
                    if ($title == 'Sponsor') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/sponsor') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/sponsor') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
                    Sponsor Pertandingan
                    </a> 
                    
                    <div class="sb-sidenav-menu-heading">Akun</div>

                    <?php
                    if ($title == 'Akun') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/akun') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/akun') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                    Akun
                    </a>  
                    
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $this->session->userdata('nama'); ?>
            </div>
        </nav>
    </div>