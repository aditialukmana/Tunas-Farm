<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="7JxWIhWmWrhitG7OjY2YAuFFKgyMzl5d364nAQDZ">
    <link rel="icon" href="<?php echo base_url('assets/common/'); ?>images/favicon.ico" type="image/x-icon">
    <title>Signin - Tunasfarm </title>
    <meta name="description" content="Tunasfarm ">
    <meta name="author" content="Tunasfarm ">
    <link rel="stylesheet" href="<?php echo base_url('public/theme/'); ?>css/site.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/theme/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/theme/'); ?>vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/theme/'); ?>vendor/animate-css/vivify.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/theme/'); ?>css/site.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/theme/'); ?>css/custom.css">
</head>

<body class="theme-blush font-montserrat light_version">

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
    
    <script src="<?php echo base_url('public/theme/'); ?>js/pages/particlesjs.js" type="text/javascript"></script>
    <script src="<?php echo base_url('public/theme/'); ?>vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('public/theme/'); ?>bundles/libscripts.bundle.js" type="8157d3a482a67d801edb5a6f-text/javascript"></script>
    <script src="<?php echo base_url('public/theme/'); ?>bundles/vendorscripts.bundle.js" type="8157d3a482a67d801edb5a6f-text/javascript"></script>
    <script src="<?php echo base_url('public/theme/'); ?>bundles/mainscripts.bundle.js" type="8157d3a482a67d801edb5a6f-text/javascript"></script>
    <script src="<?php echo base_url('public/theme/'); ?>vendor/dropify/js/dropify.js" type="text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="8157d3a482a67d801edb5a6f-|49" defer=""></script>
    <script src="<?php echo base_url() . 'public/theme/js/select2-4.0.13/dist/js/select2.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'public/theme/'; ?>js/custom.js" type="text/javascript"></script>
</body>

</html>
