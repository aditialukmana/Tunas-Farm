<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Devices Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Devices Management</li>
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
            New Devices</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableDevices" data-url="<?php echo base_url('api/devices/'); ?>">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Code</th>
                  <th>Type </th>
                  <th>Status</th>
                  <th>Action</th>
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


<!-- Create Devices -->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url('api/devices/create'); ?>" id="create_Devices_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Devices</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Code</label>
            <input type="text" id="code" name="code" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Type</label>
            <input type="text" id="type" name="type" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Site</label>
            <input type="text" id="site" name="site" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Floor</label>
            <input type="text" id="floor" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Level Count</label>
            <input type="text" id="level" name="level_count" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Holes</label>
            <input type="text" id="holes" name="holes" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Status</label>
            <input type="text" id="status" name="status" class="form-control" autocomplete="off">
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


<!-- Edit Devices -->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" id="update_Contract_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Code</label>
            <input type="text" id="code_edit" name="code" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Type</label>
            <input type="text" id="type_edit" name="type" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Site</label>
            <input type="text" id="site_edit" name="site" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Floor</label>
            <input type="text" id="floor_edit" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Level Count</label>
            <input type="text" id="level_edit" name="level_count" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Holes</label>
            <input type="text" id="holes_edit" name="holes" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Status</label>
            <input type="text" id="status_edit" name="status" class="form-control" autocomplete="off">
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

<!-- Details -->
<div class="modal" tabindex="-1" role="dialog" id="detailModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Details Devices</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailDevices">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>