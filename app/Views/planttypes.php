<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Plant Type Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Plant Type Management</li>
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
            New Plant Type</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tablePlantTypes" data-url="<?= base_url('api/planttypes') ?>">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Plant ID</th>
                  <th>Name</th>
                  <th>Image</th>
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

<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" id="create_PlantType_form" action="<?= base_url('api/planttypes/create') ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Plant Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="upload_file" class="control-label">Image</label>
            <input type="file" id="image" name="image" class="form-control" autocomplete="off" value="">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Code</label>
            <input type="text" id="code" name="code" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Est Harvest Time</label>
            <input type="text" id="harvest" name="est_harvest_time" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Est Weight</label>
            <input type="text" id="weigth" name="est_weight" class="form-control" autocomplete="off">
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


<!-- Details -->
<div class="modal" tabindex="-1" role="dialog" id="detailPlant">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Details Plant Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailPlantType">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>