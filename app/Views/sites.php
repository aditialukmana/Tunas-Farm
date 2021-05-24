<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Site Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Site Management</li>
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
            New Site</button>
        </div>
        <div class="body">
          <div class="table-responsive">
          <table class="table table-hover table-custom spacing5" id="tableSites" data-url="<?php echo base_url('api/sites'); ?>">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th>Building Area</th>
                  <th>Kota</th>
                  <th>Actions</th>
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
      <form method="post" id="create_Site_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Site</h5>
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
            <label for="releaseName" class="control-label">Company</label>
            <input type="text" id="company" name="company" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Type</label>
            <input type="text" id="type" name="type" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Subtype</label>
            <input type="text" id="subtype" name="subtype" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Floor</label>
            <input type="number" id="floor" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Area</label>
            <input type="text" id="building_area" name="building_area" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Photo</label>
            <input type="file" id="photo" name="photo" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Address</label>
            <textarea id="address" name="address" class="form-control" autocomplete="off"> </textarea>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Jalan</label>
            <input type="text" id="jalan" name="jalan" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Kota</label>
            <input type="text" id="kota" name="kota" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Provinsi</label>
            <input type="text" id="provinsi" name="provinsi" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Maps</label>
            <input type="text" id="maps" name="maps" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Status</label>
            <input type="text" id="building_status" name="building_status" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Rent Period</label>
            <input type="text" id="rent_period" name="rent_period" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Rent Cost</label>
            <input type="text" id="rent_cost" name="rent_cost" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-round btn-primary"x>Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" id="edit_Site_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Site</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Name</label>
            <input type="text" id="name_edit" name="name" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Company</label>
            <input type="text" id="company_edit" name="company" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Type</label>
            <input type="text" id="type_edit" name="type" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Subtype</label>
            <input type="text" id="subtype_edit" name="subtype" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Floor</label>
            <input type="number" id="floor_edit" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Area</label>
            <input type="text" id="building_area_edit" name="building_area" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Photo</label>
            <input type="file" id="photo_edit" name="photo" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Address</label>
            <textarea id="address_edit" name="address" class="form-control" autocomplete="off"> </textarea>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Jalan</label>
            <input type="text" id="jalan_edit" name="jalan" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Kota</label>
            <input type="text" id="kota_edit" name="kota" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Provinsi</label>
            <input type="text" id="provinsi_edit" name="provinsi" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Maps</label>
            <input type="text" id="maps_edit" name="maps" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Status</label>
            <input type="text" id="building_status_edit" name="building_status" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Rent Period</label>
            <input type="text" id="rent_period_edit" name="rent_period" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Rent Cost</label>
            <input type="text" id="rent_cost_edit" name="rent_cost" class="form-control" autocomplete="off">
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

<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you will delete this data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-round btn-default" data-dismiss="modal">No</button>
        <a href="#" id="delete_footer" type="button" class="btn btn-round btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>