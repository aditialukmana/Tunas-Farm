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
      <form method="post" action="<?php echo base_url('api/contracts'); ?>" id="create_Contracts_form" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="company" class="control-label">Company</label>
            <select class="form-control" id="company" name="company">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="site" class="control-label">Site</label>
            <select class="form-control" id="site" name="site">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Start Period</label>
            <input type="text" id="start" name="start_period" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">End Period</label>
            <input type="text" id="end" name="end_period" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Contract Document</label>
            <input type="file" id="document" name="contract_document" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Contract Commitment</label>
            <input type="number" id="commitment" name="contract_commitment" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
          <label for="code" class="control-label">Partnership Objective</label>
            <select class="form-control" id="partnership" name="partnership_objective">
              <option selected>Choose...</option>
              <option value="building utilization">Building Utilization</option>
              <option value="additional income">Additional Income</option>
              <option value="main income">Main Income</option>
              <option value="agriculture contribution">Agriculture Contribution</option>
            </select>
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
            <label for="company" class="control-label">Company</label>
            <select class="form-control" id="company_edit" name="company">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="site" class="control-label">Site</label>
            <select class="form-control" id="site_edit" name="site">

            </select>
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

<?= $this->endSection() ?>