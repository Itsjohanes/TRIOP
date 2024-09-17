<body src = "<?php echo base_url('assets/img/smatrinitasbg.jpg');?>">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <?= $this->session->flashdata("message");
                            ?>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <div style="text-align: center;">
                                        <img src="<?= base_url('assets/img/ypii-hitam.png'); ?>" width="300" height="250" alt="Responsive image">
                                        <h3>Login Admin</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('auth/login'); ?>" method="post">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <Button type="submit" class="btn btn-success btn-user btn-block">
                                                Login
                                            </Button>
                                        </div>
                                    </form>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
<style>
body {
  background-image: url('<?php echo base_url("assets/img/smatrinitasbg.jpg");?>');
  background-repeat: no-repeat;
  background-size: cover;


}
</style>