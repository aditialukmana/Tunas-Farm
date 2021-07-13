<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Actuator Devices Setup</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Actuator Devices Setup</li>
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
            New Actuator Device</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableActuatorDevices" data-url="<?= base_url('api/actuatordevices'); ?>">
              <thead>
                <tr>
                  <th>Site</th>
                  <th>Floor</th>
                  <th>Devices</th>
                  <th>Air</th>
                  <th>Humidty</th>
                  <th>AC Start Time</th>
                  <th>AC End Time</th>
                  <th>Light Start Time</th>
                  <th>Light End Time</th>
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


<!-- Create Contract -->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_ActuatorSites_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Actuator Device</h5>
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
            <label for="code" class="control-label">AC Start Time</label>
            <input type="number" id="ac_start" name="ac_start_time" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">AC End Time</label>
            <input type="number" id="ac_end" name="ac_end_time" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Light Start Time</label>
            <input type="number" id="light_start" name="light_start_time" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Light End Time</label>
            <input type="number" id="light_end" name="light_end_time" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_act_sites">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Contract -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_ActuatorSites_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Actuator Site</h5>
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
            <label for="code" class="control-label">AC Start Time</label>
            <input type="number" id="ac_start_edit" name="ac_start_time" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">AC End Time</label>
            <input type="number" id="ac_end_edit" name="ac_end_time" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Light Start Time</label>
            <input type="number" id="light_start_edit" name="light_start_time" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Light End Time</label>
            <input type="number" id="light_end_edit" name="light_end_time" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_act_sites">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('public/js/actuatordevices.js') ?>"></script>
<?= $this->endSection() ?>