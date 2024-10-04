<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">admin_pendaftaran Area</div>
                    <?php
                    if ($title == 'Dashboard') {
                        //arahih ke controller admin_pendaftaran
                        echo '<a class="nav-link active" href="' . base_url('admin_pendaftaran') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_pendaftaran') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                    </a>
                   
                    <div class="sb-sidenav-menu-heading">Sekolah</div>

                    <?php
                    if ($title == 'Sekolah') {
                        //arahih ke controller admin_pendaftaran
                        echo '<a class="nav-link active" href="' . base_url('admin_pendaftaran/sekolah') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_pendaftaran/sekolah') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    Sekolah
                    </a>

                   <div class="sb-sidenav-menu-heading">Pendaftaran</div>

                    <?php
                    if ($title == 'Pendaftaran') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin_pendaftaran/pendaftaran') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin_pendaftaran/pendaftaran') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pendaftaran
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