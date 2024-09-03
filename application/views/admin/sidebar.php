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

                     <div class="sb-sidenav-menu-heading">Video Youtube</div>

                    <?php
                    if ($title == 'Berita') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/berita') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/berita') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                    Berita
                    </a>
                    
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $this->session->userdata('nama'); ?>
            </div>
        </nav>
    </div>