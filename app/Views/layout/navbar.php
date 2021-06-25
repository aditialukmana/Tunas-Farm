    <!-- navbar -->
    <nav class="navbar top-navbar">
      <div class="container-fluid">
        <div class="navbar-left">
          <div class="navbar-btn">
            
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
          </div>
        </div>
        <div class="navbar-right">
          <div id="navbar-menu">
            <ul class="nav navbar-nav">
              <li>
                <div class="user-account">
                  <div class="user_div">
                    <img src="<?php echo base_url(); ?>/theme/images/user.png" class="user-photo" alt="User Profile Picture">
                  </div>
                  <div class="dropdown">
                    <span>Welcome,<?= user()->fullname; ?></span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?=user()->username; ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                      <li><a href="<?php echo base_url('admin/profile'); ?>"><i class="icon-user"></i>My Profile</a></li>
                      <li><a href="<?= base_url('logout');?>"><i class="icon-power"></i>Sign Out</a></li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
      </div>
    </nav>

    <div id="particles-js" style="display:none"></div>