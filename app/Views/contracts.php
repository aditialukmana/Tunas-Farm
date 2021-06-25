<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Contracts Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Contracts Management</li>
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
            New Contract</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableContracts" data-url="<?= base_url('api/contracts/') ?>">
              <thead>
                <tr>
                  <th>Company</th>
                  <th>Site</th>
                  <th>Start Period</th>
                  <th>End Period</th>
                  <th>Contract Commitment</th>
                  <th>Partnership Objective</th>
                  <th style="width: 10%;">Action</th>
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
      <form id="create_Contract_form" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Company</label>
            <select name="company" id="company" class="form-control">

              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Site</label>
            <select name="site" id="site" class="form-control">

              <option>Choose...</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Start Period</label>
            <input type="text" id="start_period" name="start_period" class="form-control" autocomplete="off" placeholder="Month - Year">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">End Period</label>
            <input type="text" id="end_period" name="end_period" class="form-control" autocomplete="off" placeholder="Month - Year">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Contract Document</label>
            <input type="file" id="document" name="contract_document" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Contract Commitment</label>
            <select name="contract_commitment" id="commitment" class="form-control">
              <option>Choose...</option>

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Partnership Objective</label>
            <select class="form-control" id="partnership" name="partnership_objective">
              <option selected>Choose...</option>
              <option value="building utilization">Building utilization</option>
              <option value="additional income">Additional Income</option>
              <option value="main income">Main Income</option>
              <option value="agriculture contribution">Agriculture Contribution</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_contract">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit_Contract_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="number" name="id" id="edit_id" hidden>
            <label for="releaseName" class="control-label">Company</label>
            <select name="company" id="company_edit" class="form-control">
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Site</label>
            <select name="site" id="site_edit" class="form-control">
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Start Period</label>
            <input type="text" id="start_period_edit" name="start_period" class="form-control" autocomplete="off" placeholder="Month - Year">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">End Period</label>
            <input type="text" id="end_period_edit" name="end_period" class="form-control" autocomplete="off" placeholder="Month - Year">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Contract Commitment</label>
            <select name="contract_commitment" id="commitment_edit" class="form-control">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Partnership Objective</label>
            <select class="form-control" id="partnership_edit" name="partnership_objective">
              <option selected>Choose...</option>
              <option value="building utilization">Building utilization</option>
              <option value="additional income">Additional Income</option>
              <option value="main income">Main Income</option>
              <option value="agriculture contribution">Agriculture Contribution</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_contract">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="<?= base_url('js/contracts.js') ?>"></script>
<?= $this->endSection() ?>