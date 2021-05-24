<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>System Logs Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">System Logs Management</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableSystemLogs" data-url="<?php echo base_url('api/systemlogs/'); ?>">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Timestamp</th>
                  <th>User</th>
                  <th>Controller</th>
                  <th>Message</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>