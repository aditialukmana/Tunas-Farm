<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Seedling Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Seedling Management</li>
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
            New Seedling</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableSeedling" data-url="<?= base_url('api/seedling'); ?>">
              <thead>
                <tr>
                  <th style="width: 10%;">Code</th>
                  <th style="width: 20%">Sprouting</th>
                  <th style="width: 5%">Seedling</th>
                  <th style="width: 15%">Tanggal</th>
                  <th style="width: 10%">Sisa</th>
                  <th style="width: 10%;">Reject</th>
                  <th style="width: 10%">Status</th>
                  <th style="width: 15%;">Action</th>
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

<input type="text" id="id_sprout" hidden>
<input type="text" id="jumlah_sprout" hidden>
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_Seedling_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Seedling</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <?php
            $code = rand(1, 100);
            if ($code <= 10) {
              $kodeSeed = "SE0" . $code;
            } else {
              $kodeSeed = "SE" . $code;
            }
            ?>
            <input type="text" name="code" id="code" value="<?= $kodeSeed; ?>" hidden>
            <label for="code" class="control-label">Sprouting</label>
            <select name="sprouting" id="sprouting" class="form-control">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Seedling</label>
            <input type="number" id="seedling" name="seedling" class="form-control" autocomplete="off" placeholder="Jumlah yang akan di seedling">
          </div>
          <div class="form-group mb-3">
            <input type="text" name="sisa" id="sisa" hidden>
            <label for="code" class="control-label">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
          <input type="number" name="id_tanaman" id="id_tanaman" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_seed">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Seedling_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Seedling</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Sprouting</label>
            <input type="text" name="id" id="edit_id" hidden>
            <select name="sprouting" id="sprouting_edit" class="form-control">
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Seedling</label>
            <input type="number" id="seedling_edit" name="seedling" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Sisa</label>
            <input type="text" id="sisa_edit" name="sisa" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Reject</label>
            <input type="text" id="reject_edit" name="reject" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tanggal</label>
            <input type="date" id="tanggal_edit" name="tanggal" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_seed">Submit</button>
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
        <h5 class="modal-title">Details Seedling</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailSeedling">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('public/js/seedling.js') ?>"></script>
<?= $this->endSection() ?>