<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Actuator Grow Installations Setup</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active"> Actuator Grow Installations Setup</li>
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
            New Actuator Grow Installation</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableActuatorGrowInstallations" data-url="<?= base_url('api/actuatorgrowinstallations'); ?>">
              <thead>
                <tr>
                  <th>Site</th>
                  <th>Floor</th>
                  <th>Device</th>
                  <th>Grow Installation</th>
                  <th>Water</th>
                  <th>TDS</th>
                  <th>PH</th>
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


<!-- Create Contract -->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_ActuatorDevices_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Actuator Grow Installation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="site" class="control-label">Site</label>
            <select class="form-control" id="site" name="site">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Floor</label>
            <select class="form-control" id="floor" name="floor">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="device" class="control-label">Device</label>
            <select class="form-control" id="device" name="device">
                <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Water Temperature</label>
            <input type="text" id="water" name="water" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Air Temperature</label>
            <input type="text" id="air" name="air" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Humidty</label>
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
          <button type="button" class="btn btn-round btn-primary" id="add_act_device">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Contract -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_ActuatorDevices_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Actuator Device</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
          <input type="number" name="id" id="edit_id" hidden>
            <label for="site" class="control-label">Site</label>
            <select class="form-control" id="site_edit" name="site">
              
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Floor</label>
            <select class="form-control" id="floor_edit" name="floor">
              
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="device" class="control-label">Device</label>
            <select class="form-control" id="device_edit" name="device">
            
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Water Temperature</label>
            <input type="text" id="water_edit" name="water" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Air Temperature</label>
            <input type="text" id="air_edit" name="air" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Humidty</label>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_act_devices">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('public/js/actuatorgrowinstallations.js') ?>"></script>
<?= $this->endSection() ?>