<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Transplanting Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Transplanting Management</li>
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
            New Transplanting</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableTransplanting" data-url="<?php echo base_url('api/transplanting'); ?>">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Grooming</th>
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
<input type="text" id="id_groom" hidden>
<input type="text" id="jumlah_groom" hidden>
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_Transplanting_form">
        <div class="modal-body">
          <div class="form-group mb-3">
            <?php
            $code = rand(1, 100);
            if ($code <= 10) {
              $kodeTrans = "TR0" . $code;
            } else {
              $kodeTrans = "TR" . $code;
            }
            ?>
            <input type="text" name="code" id="code" value="<?= $kodeTrans; ?>" hidden>
            <label for="code" class="control-label">Grooming</label>
            <select name="grooming" id="grooming" class="form-control">
              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tower & Level</label>
            <select name="tower_level" id="tower_level" class="form-control">
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
          <button type="button" class="btn btn-round btn-primary" id="add_trans">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Transplanting_form">
        <div class="modal-header">
        <input type="number" name="id" id="edit_id" hidden>
          <h5 class="modal-title" id="exampleModalLabel">Edit Transplanting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="hidden" name="id" id="edit_id">
            <label for="code" class="control-label">Grooming</label>
            <select name="grooming" id="grooming_edit" class="form-control">
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Tower & Level</label>
            <select name="tower_level" id="tower_level_edit" class="form-control">
            </select>
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
          <button type="button" class="btn btn-round btn-primary" id="edit_trans">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('public/js/transplanting.js') ?>"></script>
<?= $this->endSection() ?>