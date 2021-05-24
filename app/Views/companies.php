<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Company Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Company Management</li>
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
            New Company</button>
        </div>
        <div class="body">
          <div class="table-responsive">
          <table class="table table-hover table-custom spacing5" id="tableCompanies" data-url="<?php echo base_url('api/companies'); ?>">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
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

<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url('api/companies'); ?>" id="create_Company_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Company</h5>
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
            <label for="releaseName" class="control-label">Address</label>
            <textarea id="address" name="address" class="form-control" autocomplete="off"> </textarea>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Email</label>
            <input type="text" id="email" name="email" class="form-control" autocomplete="off">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-round btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" id="update_Company_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <input type="hidden" name="id" id="id">
            <label for="code" class="control-label">Name</label>
            <input type="text" id="name_edit" name="name" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Address</label>
            <textarea id="address_edit" name="address" class="form-control" autocomplete="off"> </textarea>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Phone</label>
            <input type="text" id="phone_edit" name="phone" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Email</label>
            <input type="text" id="email_edit" name="email" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Company</label>
            <input type="text" id="company_edit" name="company" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Investment</label>
            <input type="text" id="investment_edit" name="investment" class="form-control" autocomplete="off">
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


<!-- Details -->
<div class="modal" tabindex="-1" role="dialog" id="detailModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Details Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailCompany">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?><?= $this->extend('layout/main_layout') ?>