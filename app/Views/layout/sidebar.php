    <!-- left sidebar -->
    <div id="left-sidebar" class="sidebar">
      <!-- <div class="navbar-brand">
        <a href="<?php echo base_url('admin'); ?>"><img src="/images/logo.png" alt="Logo" class="img-fluid logo"></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
      </div> -->
      <div class="navbar-brand">
        <a href="index.html"><img src="http://tunasfarm.com/images/logo-white.png" alt="Tunasfarm Logo" class="img-fluid logo"><span style="color: white !important;"><b>tunas</b>farm</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
      </div>
      <div class="sidebar-scroll">
        <nav id="left-sidebar-nav" class="sidebar-nav">
          <ul id="main-menu" class="metismenu">
            <li class="header">Main</li>

            <li class=""><a href="<?php echo base_url('users'); ?>"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
            
            <?php 
              $groups =['grower','admin'];
            if(in_groups($groups)):?>
            <li class="">
              <a href="#" class="has-arrow"><i class="icon-fire"></i><span>Plant Management</span></a>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/planttypes'); ?>">Plant Types</a></li>
              </ul>
            </li><?php endif;?>
            <?php 
            
            if(in_groups('admin')):?>
            <li class="">
              <a href="#" class="has-arrow"><i class="icon-users"></i><span>User Management</span></a>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/customers'); ?>">Customers</a></li>
              </ul>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/roles'); ?>">Roles</a></li>
              </ul>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/users'); ?>">Users</a></li>
              </ul>
            </li>
            <li class="">
              <a href="#" class="has-arrow"><i class="icon-users"></i><span>Company Management</span></a>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/companies'); ?>">Company</a></li>
              </ul>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/sites'); ?>">Sites</a></li>
              </ul>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/contracts'); ?>">Contracts</a></li>
              </ul>
            </li>
            <li class="">
              <a href="#" class="has-arrow"><i class="icon-screen-desktop"></i><span>Device Management</span></a>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/devices'); ?>">Devices</a></li>
              </ul>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/growinstallations'); ?>">Grow Installations</a></li>
              </ul>
            </li>
            <li class="">
              <a href="#" class="has-arrow"><i class="icon-note"></i><span>Log Managements</span></a>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/systemlogs'); ?>">System Logs</a></li>
              </ul>
              <ul>
                <li id="menu-position" class=""><a href="<?php echo base_url('view/plantdatalogs'); ?>">Plant Data Logs</a></li>
              </ul>
            </li>
            <?php endif;?>
          </ul>
        </nav>
      </div>
    </div>