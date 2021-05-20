
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
                    <p class="lead" style="color:  rgba(162, 203, 75, 1) !important;"><?=lang('Auth.register')?></p>
                   
                       
                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form class="user" action="<?= route_to('register') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" 
                                            name="email" placeholder="<?=lang('Auth.email')?>"  value="<?= old('email') ?>">

                                            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user  <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"
                                            name="username"placeholder="<?=lang('Auth.username')?>"  value="<?= old('username') ?>">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                                    name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user  <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                                    name="pass_confirm"placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-round btn-block">
                                        <?=lang('Auth.register')?>
                                        </button>
                                    </form>
                                <hr>
                                <div class="text-center">
                                <p><?=lang('Auth.alreadyRegistered')?><a class="small"href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                                </div>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </div>
    </div>
<?= $this->endsection();?>
   