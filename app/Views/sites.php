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
            <table class="table table-hover table-custom spacing5" id="tableSites" data-url="<?php echo base_url('api/sites/'); ?>">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th>Subtype</th>
                  <th>Kota</th>
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
      <form id="create_Site_form" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Site</h5>
          <button type="button" id="btnCreate" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
          <input type="text" name="code" id="code" hidden>
            <label for="code" class="control-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Company</label>
            <select name="company" id="company" class="form-control">

              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Type</label>
            <select class="form-control" id="type" name="type">
              <option selected>Choose...</option>
              <option value="indoor">Indoor</option>
              <option value="outdoor">Outdoor</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Subtype</label>
            <select class="form-control" id="subtype" name="subtype">
              <option selected>Choose...</option>
              <option value="warehouse">Warehouse</option>
              <option value="shophouse">Shophouse</option>
              <option value="open spcae">Open Space</option>
            </select>
          </div>
          <div class="form-group mb-3" id="floorr" hidden>
            <label for="releaseName" class="control-label">Floor</label>
            <input type="number" id="floor" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Area</label>
            <select class="form-control" id="building_area" name="building_area">
              <option selected>Choose...</option>
              <option value="70 m2 - 100 m2">70 m2 - 100 m2</option>
              <option value="100 m2 - 500 m2">100 m2 - 500 m2</option>
              <option value="500 m2 - 1000 m2">500 m2 - 1000 m2</option>
              <option value=">1000 m2">>1000 m2</option>
            </select>
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
          <div class="form-group mb-5">
            <label for="releaseName" class="control-label">Provinsi</label>
            <input type="text" id="provinsi" name="provinsi" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-5">
            <h5>Maps</h5>
            <label for="releaseName" class="control-label">Latitude</label>
            <input type="text" id="lat" name="latitude" class="form-control" autocomplete="off">
            <label for="releaseName" class="control-label">Longtitude</label>
            <input type="text" id="long" name="longtitude" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Status</label>
            <select class="form-control" id="building_status" name="building_status">
              <option selected>Choose...</option>
              <option value="owned">Owned</option>
              <option value="rent">Rent</option>
            </select>
          </div>
          <div class="form-group mb-3" hidden id="period">
            <label for="releaseName" class="control-label">Rent Period</label>
            <input type="number" id="rent_period" name="rent_period" placeholader="Year" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3" hidden id="cost">
            <label for="releaseName" class="control-label">Rent Cost</label>
            <input type="number" id="rent_cost" name="rent_cost" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_site">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Site_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Site</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="text" name="id" id="edit_id" hidden>
            <label for="code" class="control-label">Name</label>
            <input type="text" id="name_edit" name="name" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Company</label>
            <select name="company" id="company_edit" class="form-control">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Type</label>
            <select class="form-control" id="type_edit" name="type">
              <option value="indoor">Indoor</option>
              <option value="outdoor">Outdoor</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Subtype</label>
            <select class="form-control" id="subtype_edit" name="subtype">
              <option value="warehouse">Warehouse</option>
              <option value="shophouse">Shophouse</option>
              <option value="open spcae">Open Space</option>
            </select>
          </div>
          <div class="form-group mb-3" id="floorr_edit" hidden>
            <label for="releaseName" class="control-label">Floor</label>
            <input type="number" id="floor_edit" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Area</label>
            <select class="form-control" id="building_area_edit" name="building_area">
              <option value="70 m2 - 100 m2">70 m2 - 100 m2</option>
              <option value="100 m2 - 500 m2">100 m2 - 500 m2</option>
              <option value="500 m2 - 1000 m2">500 m2 - 1000 m2</option>
              <option value=">1000 m2">>1000 m2</option>
            </select>
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
          <div class="form-group mb-5">
            <label for="releaseName" class="control-label">Provinsi</label>
            <input type="text" id="provinsi_edit" name="provinsi" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <h5>Maps</h5>
            <label for="releaseName" class="control-label">Latitude</label>
            <input type="text" id="lat_edit" name="latitude" class="form-control" autocomplete="off">
            <label for="releaseName" class="control-label">Longtitude</label>
            <input type="text" id="long_edit" name="longtitude" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Building Status</label>
            <select class="form-control" id="building_status_edit" name="building_status">
              <option value="owned">Owned</option>
              <option value="rent">Rent</option>
            </select>
          </div>
          <div class="form-group mb-3" hidden id="period_edit">
            <label for="releaseName" class="control-label">Rent Period</label>
            <input type="number" id="rent_period_edit" name="rent_period" placeholader="Year" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3" hidden id="cost_edit">
            <label for="releaseName" class="control-label">Rent Cost</label>
            <input type="number" id="rent_cost_edit" name="rent_cost" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_site">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal" id="detailModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Details Site</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailSite">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('public/js/sites.js') ?>"></script>
<?= $this->endSection() ?>