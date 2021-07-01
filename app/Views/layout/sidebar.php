    <!-- left sidebar -->
    <div id="left-sidebar" class="sidebar">
      <div class="navbar-brand">
        <a href="<?php echo base_url(); ?>"><img src="http://tunasfarm.com/images/logo-white.png" alt="Tunasfarm Logo" class="img-fluid logo"><span style="color: white !important;"><b>tunas</b>farm</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
      </div>
      <div class="sidebar-scroll">
        <nav id="left-sidebar-nav" class="sidebar-nav">
          <ul id="main-menu" class="metismenu">
            <li class="header">Main</li>
            <?php
            $groups = ['admin', 'owner'];
            if (in_groups($groups)) : ?>
              <li class=""><a href="<?php echo base_url(''); ?>"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
            <?php endif; ?>
            <?php

            if (in_groups('admin')) : ?>
              <li class="">
                <a href="#" class="has-arrow"><i class="fa fa-leaf"></i></i><span>Plant Management</span></a>
                <ul>
                  <li id="menu-position" class=""><a href="<?php echo base_url('view/planttypes'); ?>">Plant Types</a></li>
                </ul>
              </li>
              <li class="">
                <a href="#" class="has-arrow"><i class="icon-user"></i><span>User Management</span></a>
                <ul>
                  <li id="menu-position" class=""><a href="<?php echo base_url('view/customers'); ?>">Customers</a></li>
                </ul>
                <ul>
                  <li id="menu-position" class=""><a href="<?php echo base_url('view/roles'); ?>">Roles</a></li>
                </ul>
                <ul>
                  <li id="menu-position" class=""><a href="<?php echo base_url('view/user'); ?>">Users</a></li>
                </ul>
              </li>
              <li class="">
                <a href="#" class="has-arrow"><i class="fa fa-list-alt"></i><span>Company Management</span></a>
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
                <a href="#" class="has-arrow"><i class="fa fa-file-text-o"></i><span>Log Managements</span></a>
                <ul>
                  <li id="menu-position" class=""><a href="<?php echo base_url('view/systemlogs'); ?>">System Logs</a></li>
                </ul>
                <ul>
                  <li id="menu-position" class=""><a href="<?php echo base_url('view/plantdatalogs'); ?>">Plant Data Logs</a></li>
                </ul>
              </li>
              <li class="">
                <a href="#" class="has-arrow"><i class="fa fa-clock-o"></i><span>Actuator Managements</span></a>
                <ul>
                  <a href="<?= base_url('view/actuatordevices') ?>"><span>Actuator Grow Installations</span></a>
                </ul>
                <ul>
                  <a href="<?= base_url('view/actuatorsites') ?>"><span>Actuator Devices</span></a>
                </ul>
              </li>
              <li class="">
                <a href="<?= base_url('view/privilegesettings') ?>"><i class="fa fa-cog"></i><span>Privilege Settings</span></a>
              </li>
            <?php endif; ?>
            <?php
            if (in_groups('grower')) : ?>
              <li class="">
                <a href="<?= base_url('view/sprouting') ?>"><i class="fa fa-leaf"></i><span>Sprouting</span></a>
                <a href="<?= base_url('view/seedling') ?>"><i class="fa fa-leaf"></i><span>Seedling</span></a>
                <a href="<?= base_url('view/grooming') ?>"><i class="fa fa-leaf"></i><span>Grooming</span></a>
                <a href="<?= base_url('view/transplanting') ?>"><i class="fa fa-leaf"></i><span>Transplanting</span></a>
                <a href="<?= base_url('view/harvesting') ?>"><i class="fa fa-leaf"></i><span>Harvesting</span></a>
              </li>
          </ul>
        <?php endif; ?>
        </nav>
      </div>
    </div>