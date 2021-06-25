<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Dashboard</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right hidden-xs">
                <div class="d-flex flex-row-reverse" id="loading-ajax">

                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="body body-dashboard">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <label for="">Sites</label>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                    <div class="card">
                        <div class="body card-body-dashboard">
                            <div class="row clearfix">
                                <div class="col-4">
                                    <h5 class="mb-0"><img src="http://tunasfarm.com/images/temperature.png" alt="" class="image-remote" width="28px"></h5>
                                    <small class="text-muted"></small>
                                </div>
                                <div class="col-8 text-right">
                                    <label class="label-monitoring1 col-12">Site 1</label>
                                    <label class="label-monitoring2 col-12">Ruko</label>
                                </div>
                                <div class="col-12 text-right">
                                    <label class="label-monitoring2 col-12">3 Towers</label>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-12 text-right">
                                    <a href="http://tunasfarm.com/dashboard/sites/1" class="btn btn-success btn-round">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                    <div class="card">
                        <div class="body card-body-dashboard">
                            <div class="row clearfix">
                                <div class="col-3">
                                    <h5 class="mb-0"><img src="http://tunasfarm.com/images/temperature.png" alt="" class="image-remote" width="28px"></h5>
                                    <small class="text-muted"></small>
                                </div>
                                <div class="col-9 text-right">
                                    <label class="label-monitoring1 col-12">Victor&#039;s Palace</label>
                                    <label class="label-monitoring2 col-12">Ruko</label>
                                </div>
                                <div class="col-12 text-right">
                                    <label class="label-monitoring2 col-12">0 Towers</label>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-12 text-right">
                                    <a href="http://tunasfarm.com/dashboard/sites/3" class="btn btn-success btn-round">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>