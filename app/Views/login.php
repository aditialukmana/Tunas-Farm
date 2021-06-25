<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand" style="margin-bottom: 10px;">
            <a class="navbar-brand" href="javascript:void(0);" style="color:  rgba(162, 203, 75, 1) !important;"><img src="http://tunasfarm.com/images/banner-green.png" width="170" height="60" class="d-inline-block align-top mr-2" alt=""></a>
        </div>
        <div class="card">
            <div class="body">
                <p class="lead" style="color:  rgba(162, 203, 75, 1) !important;">Login to your account</p>

                  

                
                <form class="form-auth-small m-t-20" method="POST" action="http://tunasfarm.com/login">
                    <input type="hidden" name="_token" value="kI4KbNjkkgoQgaPADwm2w1Qofjovc6u70xrwL6E5">
                    
                    <div class="form-group">
                        <input type="text" class="form-control round" id="username" name="username" :value="old('username')" placeholder="Username" required autofocus />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control round" id="password" name="password" value="" placeholder="Password" required autocomplete="current-password" />
                    </div>
                    <div class="form-group clearfix">
                        <label for="remember_me" class="fancy-checkbox element-left">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">Login</button>
                    <div class="bottom">
                                                <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
                            <a href="http://tunasfarm.com/forgot-password">
                                Forgot your password?
                            </a>
                        </span>
                                            </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>

<?= $this->endSection() ?>