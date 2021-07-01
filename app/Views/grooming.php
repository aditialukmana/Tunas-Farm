<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Grooming Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Grooming Management</li>
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
            New Grooming</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableGrooming" data-url="<?= base_url('api/grooming'); ?>">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Seedling</th>
                  <th>Tower & Level</th>
                  <th>Tanggal</th>
                  <th>Terproses</th>
                  <th>Sisa</th>
                  <th>Status</th>
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

<input type="text" id="id_seed" hidden>
<input type="text" id="jumlah_seed" hidden>
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_Grooming_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Grooming</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <?php
            $code = rand(1, 100);
            if ($code <= 10) {
              $kodeGroom = "GR0" . $code;
            } else {
              $kodeGroom = "GR" . $code;
            }
            ?>
            <input type="text" name="code" id="code" value="<?= $kodeGroom; ?>" hidden>
            <label for="code" class="control-label">Seedling</label>
            <select name="seedling" id="seedling" class="form-control">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tower & Level</label>
            <select name="tower_level" id="tower_level" class="form-control">
              <option>Choose...</option>
              <option value="tower 1 - level 1">Tower 1 - Level 1</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tanggal</label>
            <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Terproses</label>
            <input type="number" id="terproses" name="terproses" class="form-control" autocomplete="off">
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
          <button type="button" class="btn btn-round btn-primary" id="add_groom">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Grooming_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Seedling</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
          <input type="text" name="id" id="edit_id" hidden>
            <label for="code" class="control-label">Seedling</label>
            <select name="seedling" id="seedling_edit" class="form-control">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tower & Level</label>
            <select name="tower_level" id="tower_level_edit" class="form-control">
              <option>Choose...</option>
              <option value="tower 1 - level 1">Tower 1 - Level 1</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tanggal</label>
            <input type="text" id="tanggal_edit" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Terproses</label>
            <input type="number" id="terproses_edit" name="terproses" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Sisa</label>
            <input type="number" id="sisa_edit" name="sisa" class="form-control" autocomplete="off">
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
          <button type="button" class="btn btn-round btn-primary" id="edit_groom">Submit</button>
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
        <h5 class="modal-title">Details Grooming</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailGrooming">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('public/js/grooming.js') ?>"></script>
<?= $this->endSection() ?>