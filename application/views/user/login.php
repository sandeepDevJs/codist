<section class="login-main-wrapper">
    <div class="container-fluid pl-0 pr-0">
        <div class="row no-gutters">
            <div class="col-md-5 p-5 bg-white full-height">
                <div class="login-main-left">
                    <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="<?=base_url('assets/user/')?>img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Codist</h5>
                        <p>It is a long established fact that a reader
                            <br> will be distracted by the readable.</p>
                    </div>
                    <form action="" method="post">
                        <?php if($this->session->flashdata('login-error')){  ?>
                        <div class="alert alert-danger" role="alert">
                            <b>
                                <?= $this->session->flashdata('login-error'); ?>
                            </b>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>" placeholder="abc@mail.com">
                            <?= form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" placeholder="Password">
                            <?= form_error('password'); ?>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign Up</button>
                        </div>
                    </form>
                    <div class="text-center mt-5">
                        <p class="light-gray">Don't have an Account?
                            <a href="<?= base_url("register"); ?>">Register Here.</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="login-main-right bg-white p-5 mt-5 mb-5">
                    <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                            <div class="carousel-login-card text-center">
                                <img src="<?=base_url('assets/user/')?>img/login.png" class="img-fluid" alt="LOGO">
                                <h5 class="mt-5 mb-3">​Study Via Video</h5>
                                <p class="mb-4">when an unknown printer took a galley of type and scrambled
                                    <br> it to make a type specimen book. It has survived not
                                    <br>only five centuries</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-login-card text-center">
                                <img src="<?=base_url('assets/user/')?>img/login.png" class="img-fluid" alt="LOGO">
                                <h5 class="mt-5 mb-3">Ask Questions In Forum</h5>
                                <p class="mb-4">when an unknown printer took a galley of type and scrambled
                                    <br> it to make a type specimen book. It has survived not
                                    <br>only five centuries</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-login-card text-center">
                                <img src="<?=base_url('assets/user/')?>img/login.png" class="img-fluid" alt="LOGO">
                                <h5 class="mt-5 mb-3">Explore Courses.</h5>
                                <p class="mb-4">when an unknown printer took a galley of type and scrambled
                                    <br> it to make a type specimen book. It has survived not
                                    <br>only five centuries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?=base_url('assets/user/')?>vendor/jquery/jquery.min.js" type="440201f72d146f2f5c572228-text/javascript"></script>
<script src="<?=base_url('assets/user/')?>vendor/bootstrap/js/bootstrap.bundle.min.js" type="440201f72d146f2f5c572228-text/javascript"></script>

<script src="<?=base_url('assets/user/')?>vendor/jquery-easing/jquery.easing.min.js" type="440201f72d146f2f5c572228-text/javascript"></script>

<script src="<?=base_url('assets/user/')?>vendor/owl-carousel/owl.carousel.js" type="440201f72d146f2f5c572228-text/javascript"></script>

<script src="<?=base_url('assets/user/')?>js/custom.js" type="440201f72d146f2f5c572228-text/javascript"></script>
<script src="<?=base_url('assets/user/')?>js/rocket-loader.min.js" data-cf-settings="440201f72d146f2f5c572228-|49" defer=""></script>

</body>


</html>