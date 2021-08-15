<?= $this->extend('auth/template/index'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
        </div>
    </div>
    <div class="auth-main particles_js">
        <div class="auth_div vivify popIn">
            <div class="auth_brand" style="margin-bottom: 10px;">
                <a class="navbar-brand" href="javascript:void(0);" style="color:  rgba(162, 203, 75, 1) !important;"><img src="http://tunasfarm.com/images/banner-green.png" width="170" height="60" class="d-inline-block align-top mr-2" alt=""></a>
            </div>
            <div class="card">
                <div class="body">
                    <p class="lead" style="color:  rgba(162, 203, 75, 1) !important;"><?= lang('Auth.loginTitle') ?></p>



                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form class="user" action="<?= route_to('tunasdash/') ?>" method="post">
                        <?= csrf_field(); ?>

                        <?php if ($config->validFields === ['email']) : ?>
                            <div class="form-group">
                                <input type="email" class="form-control round <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="form-group">
                                <input type="text" class="form-control round <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <input type="password" class="form-control round <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password">
                        </div>
                        <?php if ($config->allowRemembering) : ?>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" name="remembering" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                    <label class="custom-control-label" for="customCheck"><?= lang('Auth.rememberMe') ?></label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary btn-user btn-round btn-block">
                            <?= lang('Auth.loginAction') ?>
                        </button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </div>
</div>
<?= $this->endsection(); ?>