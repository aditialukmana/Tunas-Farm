<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<div class="row mt-3">
    <div class="col-md-6">
        <canvas id="oilChart" width="300" height="300"></canvas>
    </div>
</div>

<script src="<?= base_url('public/js/planttypes.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
<script src="<?= base_url("public/js/style.js") ?>"></script>
<?= $this->endSection() ?>