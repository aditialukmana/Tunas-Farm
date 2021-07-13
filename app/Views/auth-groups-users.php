<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Role Users Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Role Users Management</li>
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
            <table class="table table-hover table-custom spacing5" id="tableRoleUsers" data-url="<?php echo base_url('api/authgroupsusers'); ?>">
              <thead>
                <tr>
                  <th>Role ID</th>
                  <th>Users ID</th>
                  <th style="width: 10%;">Action</th>
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
      <form id="create_RoleUser_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Role User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Role</label>
            <select name="group_id" id="role" class="form-control">

              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">User</label>
            <select name="user_id" id="user" class="form-control">

              <option>Choose...</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_role_user">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_RoleUser_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
          <input type="number" name="id" id="edit_id" hidden>
            <label for="releaseName" class="control-label">Role</label>
            <select name="group_id" id="role_edit" class="form-control">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">User</label>
            <select name="user_id" id="user_edit" class="form-control">

            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_role_user">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('public/js/roleusers.js'); ?>"></script>
<?= $this->endSection() ?>