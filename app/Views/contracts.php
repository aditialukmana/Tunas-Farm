<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Constracts Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Constracts Management</li>
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
            New Contracts</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableContracts" data-url="<?php echo base_url('api/contracts/'); ?>">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Company</th>
                  <th>Start Period</th>
                  <th>End Period</th>
                  <th>Partnership Objective</th>
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
      <form method="post" action="<?php echo base_url('api/contracts'); ?>" id="create_Contracts_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Code</label>
            <input type="text" id="code" name="code" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Type</label>
            <input type="text" id="type" name="type" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Site</label>
            <input type="text" id="site" name="site" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Floor</label>
            <input type="text" id="floor" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Level Count</label>
            <input type="text" id="level_count" name="level_count" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Holes</label>
            <input type="text" id="holes" name="holes" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Status</label>
            <input type="text" id="status" name="status" class="form-control" autocomplete="off">
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


<!-- Edit Contract -->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" id="update_Contract_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="code_ref" name="code_ref" class="form-control">
          <div class="form-group mb-3">
            <label for="code" class="control-label">Company</label>
            <input type="hidden" name="id" id="id">
            <input type="text" id="company_edit" name="company" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Site</label>
            <input type="text" id="site_edit" name="site" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Start Period</label>
            <input type="text" id="start_edit" name="start_period" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">End Period</label>
            <input type="text" id="end_edit" name="end_period" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Contract Document</label>
            <input type="text" id="document_edit" name="contract_document" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Contract Commitment</label>
            <input type="text" id="commitment_edit" name="contract_commitment" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Partnership Objective</label>
            <input type="text" id="partnership_edit" name="partnership_objective" class="form-control" autocomplete="off">
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


<!-- Details -->
<div class="modal" tabindex="-1" role="dialog" id="detailModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Details Contract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailContract">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>