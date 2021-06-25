<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Plant Types Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Plant Types Management</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="text-left" style="margin-bottom:10px;margin-top:20px">
          <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#modal_create_plant">Create
            New Plant Type</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tablePlantTypes" data-url="<?= base_url('api/planttypes/') ?>">
              <thead>
                <tr>
                  <th style="width: 10%;">Plant ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Est Harvest Time</th>
                  <th>Est Weight</th>
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

<div class="modal fade" id="modal_create_plant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_PlantType_form" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Plant Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Name</label>
            <input type="text" id="name" name="name" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="upload_file" class="control-label">Image</label>
            <input type="file" id="image" name="image" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Est Harvest Time</label>
            <input type="text" id="harvest" name="est_harvest_time" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Est Weight</label>
            <input type="text" id="weigth" name="est_weight" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_plant">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_update_plant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="update_PlantType_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Plant Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Name</label>
            <input type="text" name="id" id="edit_id" hidden>
            <input type="text" id="name_edit" name="name" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Est Harvest Time</label>
            <input type="text" id="harvest_edit" name="est_harvest_time" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Est Weight</label>
            <input type="text" id="weight_edit" name="est_weight" class="form-control" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_plant">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?= base_url('js/planttypes.js') ?>"></script>
<?= $this->endSection() ?>