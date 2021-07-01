<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Harvesting Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Harvesting Management</li>
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
            New Harvesting</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableHarvesting" data-url="<?= base_url('api/harvesting'); ?>">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Transplanting</th>
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
<input type="text" id="id_trans" hidden>
<input type="text" id="jumlah_trans" hidden>
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="create_Harvesting_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Harvesting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <?php
            $code = rand(1, 100);
            if ($code <= 10) {
              $kodeHarvest = "HA0" . $code;
            } else {
              $kodeHarvest = "HA" . $code;
            }
            ?>
            <input type="text" name="code" id="code" value="<?= $kodeHarvest; ?>" hidden>
            <label for="code" class="control-label">Transplanting</label>
            <select name="transplanting" id="transplanting" class="form-control">
              <option>Choose...</option>
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
          <button type="button" class="btn btn-round btn-primary" id="add_harvest">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Harvesting_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Harvesting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="hidden" name="id" id="edit_id">
            <label for="code" class="control-label">Transplanting</label>
            <select name="transplanting" id="transplanting_edit" class="form-control">
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
          <input type="number" name="id_tanaman" id="id_tanaman_edit" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_harvest">Submit</button>
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
        <h5 class="modal-title">Details Harvesting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailHarvesting">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('public/js/harvesting.js') ?>"></script>
<?= $this->endSection() ?>