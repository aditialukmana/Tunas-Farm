
<?= $this->extend('auth/template/index');?>
<?= $this->section('content');?>
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
                    <p class="lead" style="color:  rgba(162, 203, 75, 1) !important;"><?=lang('Auth.resetYourPassword')?></p>



                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <p><?=lang('Auth.enterCodeEmailPassword')?></p>

                    <form action="<?= route_to('reset-password') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="token"><?=lang('Auth.token')?></label>
                            <input type="text" class="form-control round <?php if(session('errors.token')) : ?>is-invalid<?php endif ?>"
                                   name="token" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email"><?=lang('Auth.email')?></label>
                            <input type="email" class="form-control round <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="password"><?=lang('Auth.newPassword')?></label>
                            <input type="password" class="form-control round <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                   name="password">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pass_confirm"><?=lang('Auth.newPasswordRepeat')?></label>
                            <input type="password" class="form-control round <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                   name="pass_confirm">
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-round btn-block"><?=lang('Auth.resetPassword')?></button>
                    </form>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </div>
    </div>
<?= $this->endsection();?>
   