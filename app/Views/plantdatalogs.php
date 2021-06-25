<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Plant Data Logs Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Plant Data Logs Management</li>
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
            New Plant Data</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tablePlantData" data-url="<?php echo base_url('api/plantdatalogs'); ?>">
              <thead>
                <tr>
                  <th>Device</th>
                  <th>Grow Installation</th>
                  <th>Water Temperature</th>
                  <th>Air Temperature</th>
                  <th>Humidity</th>
                  <th>TDS</th>
                  <th>PH</th>
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


<!-- Tambah Data -->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_PlantData_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Plant Data Logs</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Device</label>
            <select name="device" id="device" class="form-control">
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
            <label for="releaseName" class="control-label">Water Temperature</label>
            <input type="text" id="water" name="water" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Air Temperature</label>
            <input type="text" id="air" name="air" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Humidity</label>
            <input type="text" id="humidity" name="humidity" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">TDS</label>
            <input type="text" id="tds" name="tds" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">PH</label>
            <input type="text" id="ph" name="ph" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_plantdata">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Data -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" id="update_PlantData_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Device</label>
            <input type="hidden" name="id" id="id">
            <input type="text" id="device_edit" name="device" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Water Temperature</label>
            <input type="text" id="water_edit" name="water_temperature" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Air Temperature</label>
            <input type="text" id="air_edit" name="air_temperature" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Humidity</label>
            <input type="text" id="humidity_edit" name="humidity" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">TDS</label>
            <input type="text" id="tds_edit" name="tds" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">PH</label>
            <input type="text" id="ph_edit" name="ph" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Water Ink Status</label>
            <input type="text" id="water_status_edit" name="water_ink_status" class="form-control" autocomplete="off">
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
        <h5 class="modal-title">Details Contract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailCustomer">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('js/plantdatalogs.js') ?>"></script>
<?= $this->endSection() ?>