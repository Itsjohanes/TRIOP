<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">admin_humas Area</div>
                    <?php
                    if ($title == 'Dashboard') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Content</div>
                    <?php
                    if ($title == 'Content') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/content') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/content') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                    Content
                    </a>
                    <div class="sb-sidenav-menu-heading">Video Youtube</div>

                    <?php
                    if ($title == 'Video Pertandingan') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/video') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/video') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                    Video Youtube
                    </a>
                    <?php
                    if ($title == 'Video Sejarah') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/video_sejarah') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/video_sejarah') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                    Video Khusus Sejarah Triop
                    </a>
                    <div class="sb-sidenav-menu-heading">Berita TRIOP</div>

                    <?php
                    if ($title == 'Berita Seputar TRIOP') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/berita') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/berita') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                    Berita
                    </a>

                    <div class="sb-sidenav-menu-heading">Sekolah</div>

                    <?php
                    if ($title == 'Sekolah') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/sekolah') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/sekolah') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    Sekolah
                    </a>

                    <div class="sb-sidenav-menu-heading">Jadwal & Hasil</div>

                    <?php
                    if ($title == 'Jadwal & Hasil') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/jadwal') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/jadwal') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                    Jadwal & Hasil
                    </a>              
                    
                     <div class="sb-sidenav-menu-heading">Sponsor</div>

                    <?php
                    if ($title == 'Sponsor') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/sponsor') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/sponsor') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-dollar"></i></div>
                    Sponsor Pertandingan
                    </a> 

                 

                     <div class="sb-sidenav-menu-heading">Berkas</div>

                    <?php
                    if ($title == 'Berkas') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/berkas') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/berkas') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Berkas
                    </a> 
                      <div class="sb-sidenav-menu-heading">Instagram</div>

                    <?php
                    if ($title == 'Instagram') {
                        //arahih ke controller admin_humas
                        echo '<a class="nav-link active" href="' . base_url('admin_humas/instagram') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_humas/instagram') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
                    Instagram
                    </a>                    
                    <div class="sb-sidenav-menu-heading">Akun</div>

                  
                    <!-- Logout -->
                    <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
                        <i class="fas fa-sign-out-alt"></i>
                         &nbsp Logout  
                </a>
                    
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $this->session->userdata('nama'); ?>
            </div>
        </nav>
    </div>