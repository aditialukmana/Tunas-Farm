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
          <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#modal_create_device">Create
            New Devices</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableDevices" data-url="<?php echo base_url('api/devices/'); ?>">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Site</th>
                  <th>Grow Installation</th>
                  <th>Status</th>
                  <th style="width:10%;">Action</th>
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
<div class="modal fade" id="modal_create_device" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_Devices_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Devices</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <?php $code = rand(1, 100);
            if ($code <= 10) {
              $kodeDevice = "DS0" . $code;
            } else {
              $kodeDevice = "DS" . $code;
            }
            echo "<input type='hidden' name='code' id='code' value='" . $kodeDevice . "'>"
            ?>
            
          <div class="form-group mb-3">
            <label for="code" class="control-label">Site</label>
            <select name="site" id="site" class="form-control">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Grow Installation</label>
            <select name="grow_installation" id="grow_installation" class="form-control">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Status</label>
            <select class="form-control" id="status" name="status">
              <option selected>Choose...</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_device">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Devices -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Devices_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <input type="number" name="id" id="edit_id" hidden>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Site</label>
            <select name="site" id="site_edit" class="form-control">
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Grow Installation</label>
            <select name="grow_installation" id="grow_installation_edit" class="form-control">
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Status</label>
            <select class="form-control" id="status_edit" name="status">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_device">Submit</button>
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
<script src="<?= base_url('js/devices.js') ?>"></script>
<?= $this->endSection() ?>