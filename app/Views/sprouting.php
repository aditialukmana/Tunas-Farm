<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Sprouting Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Sprouting Management</li>
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
            New Sprouting</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableSprouting" data-url="<?php echo base_url('api/sprouting'); ?>">
              <thead>
                <tr>
                  <th style="width: 17%">Code</th>
                  <th style="width: 18%;">Tipe Tanaman</th>
                  <th style="width: 5%;">Benih</th>
                  <th style="width: 15%;">Tanggal</th>
                  <th style="width: 10%;">Status</th>
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

<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_Sprouting_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Sprouting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <?php
            $code = rand(1, 100);
            if ($code <= 10) {
              $kodeSprout = "SP0" . $code;
            } else {
              $kodeSprout = "SP" . $code;
            }
            ?>
            <input type="text" name="code" id="code" value="<?= $kodeSprout; ?>" hidden>
            <label for="code" class="control-label">Tipe Tanaman</label>
            <select name="tipe_tanaman" id="tanaman" class="form-control">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Benih</label>
            <input type="number" id="benih" name="benih" class="form-control" autocomplete="off" placeholder="Jumlah Benih">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tanggal</label>
            <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
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
          <button type="button" class="btn btn-round btn-primary" id="add_sprout">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Sprouting_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Sprouting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-body">
            <div class="form-group mb-3">
              <label for="code" class="control-label">Tipe Tanaman</label>
              <input type="text" name="id" id="edit_id" hidden>
              <select name="tipe_tanaman" id="tanaman_edit" class="form-control">

              </select>
            </div>
            <div class="form-group mb-3">
              <label for="releaseName" class="control-label">Benih</label>
              <input type="number" id="benih_edit" name="benih" class="form-control" autocomplete="off">
            </div>
            <div class="form-group mb-3">
              <label for="code" class="control-label">Status</label>
              <select name="status" id="status_edit" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-round btn-primary" id="edit_sprout">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('public/js/sprouting.js') ?>"></script>
<?= $this->endSection() ?>