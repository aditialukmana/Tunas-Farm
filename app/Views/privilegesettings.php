<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/hummingbird-treeview.css') ?>">
<div class="container-fluid">
  <div class="block-header">
    <div class="row clearfix">
      <div class="col-md-6 col-sm-12">
        <h1>Privilege Settings Management</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Privilege Settings Management</li>
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
            New Privilege Settings</button>
        </div>
        <div class="body">
          <div class="table-responsive">
            <table class="table table-hover table-custom spacing5" id="tableGrow" data-url="<?= base_url('api/growinstallations/'); ?>">
              <thead>
                <tr>
                  <th>Roles</th>
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
      <form id="create_Grow_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Privilege Settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="treeview_container" class="hummingbird-treeview">
            <ul id="treeview" class="hummingbird-base">
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Users
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Roles
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Users Role
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Plant Types
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Customers
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Companies
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Sites
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Contracts
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Devices
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Plant Data Logs
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Actuator Devices
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Actuator Sites
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Privilege Settings
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Sprouting
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Seedling
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Grooming
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Transplanting
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
              <li data-id="0" class="mb-1">
                <i class="fa fa-plus"></i>
                <label>
                  <input id="xnode-0" data-id="custom-0" type="checkbox" /> Harvesting
                </label>
                <ul>
                  <li>
                    <label>
                      <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                    </label>
                  </li>
                  <li>
                    <label>
                      <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                    </label>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="add_grow">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="update_Grow_form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Privilege Settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Customer</label>
            <input type="text" name="id" id="edit_id" hidden>
            <select class="form-control" id="customer_edit" name="customer">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="releaseName" class="control-label">Company</label>
            <select class="form-control" id="company_edit" name="company">

            </select>
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Type</label>
            <select class="form-control" id="type_edit" name="type">
              <option value="tower">Tower</option>
              <option value="flat bed">Flat Bed</option>
              <option value="home kit">Home Kit</option>
            </select>
          </div>
          <div class="form-group mb-3" id="grow_count_edit" hidden>
            <label for="code" class="control-label">Level Count</label>
            <input type="number" name="level_count" id="lvl_count_edit" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3" id="grow_hole_edit" hidden>
            <label for="code" class="control-label">Level Hole</label>
            <input type="number" name="level_hole" id="lvl_hole_edit" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3" id="grow_holes_edit" hidden>
            <label for="code" class="control-label">Hole</label>
            <input type="number" id="hole_edit" name="hole" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3" id="grow_sites" hidden>
            <label for="code" class="control-label">Site</label>
            <select name="site" id="site_edit" class="form-control">
            </select>
          </div>
          <div class="form-group mb-3" id="grow_floor_edit" hidden>
            <label for="code" class="control-label">Floor</label>
            <input type="number" id="floor_edit" name="floor" class="form-control" autocomplete="off">
          </div>
          <div class="form-group mb-3">
            <label for="code" class="control-label">Status</label>
            <select class="form-control" id="status_edit" name="status">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-round btn-primary" id="edit_grow">Submit</button>
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
        <h5 class="modal-title">Details Privilege Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailGrow">
        <div id="treeview_container" class="hummingbird-treeview">
          <ul id="treeview" class="hummingbird-base">
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Users
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Roles
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Users Role
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Plant Types
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Customers
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Companies
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Sites
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Contracts
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Devices
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Plant Data Logs
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Actuator Devices
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Actuator Sites
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Privilege Settings
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Sprouting
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Seedling
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Grooming
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Transplanting
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
            <li data-id="0" class="mb-1">
              <i class="fa fa-plus"></i>
              <label>
                <input id="xnode-0" data-id="custom-0" type="checkbox" /> Harvesting
              </label>
              <ul>
                <li>
                  <label>
                    <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" /> Add
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Edit
                  </label>
                </li>
                <li>
                  <label>
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" /> Delete
                  </label>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<script src="<?= base_url('public/js/hummingbird-treeview.js'); ?>"></script>
<script>
  $("#treeview").hummingbird();
</script>
<?= $this->endSection() ?>