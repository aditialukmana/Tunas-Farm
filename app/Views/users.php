<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Users Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Users Management</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="text-left" style="margin-bottom:10px;margin-top:20px">
          <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#modal_create">Create
            New Users</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableUsers" data-url="<?php echo base_url('api/users'); ?>">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th style="width: 10%;">Actions</th>
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

<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_User_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-body">
            <div class="form-group mb-3">
              <label for="code" class="control-label">Email</label>
              <input type="text" id="email" name="email" class="form-control" autocomplete="off">
            </div>
            <div class="form-group mb-3">
              <label for="releaseName" class="control-label">Username</label>
              <input type="text" id="username" name="username" class="form-control" autocomplete="off">
            </div>
            <div class="form-group mb-3">
              <label for="releaseName" class="control-label">Fullname</label>
              <input type="text" id="fullname" name="fullname" class="form-control" autocomplete="off">
            </div>
            <div class="form-group mb-3">
              <label for="releaseName" class="control-label">Password</label>
              <input type="password" id="password" name="password" class="form-control" autocomplete="off">
            </div>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url('backend/edit_Role'); ?>" id="edit_Role_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="code_ref" name="code_ref" class="form-control">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Role ID</label>
            <input type="text" id="code_edit" name="code" class="form-control" autocomplete="off" readonly>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Role Name</label>
            <input type="text" id="name_edit" name="name" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-round btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('public/js/users.js'); ?>"></script>
<?= $this->endSection() ?>