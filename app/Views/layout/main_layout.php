<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="csrf-token" content="byAFjl0riXrNc2c762Nh7Wr5IM6hBNC5vaHyIxBf">
  <link rel="icon" href="<?php echo base_url(); ?>/favicon.ico" type="image/x-icon">
  <title><?= $title; ?></title>
  <meta name="description">
  <meta name="author">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/vendor/animate-css/vivify.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/vendor/sweetalert/sweetalert.css" />
  <!-- <link rel="stylesheet" href="/theme/vendor/select2-4.0.13/dist/css/select2.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/vendor/dropify/css/dropify.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
  <script src="<?= base_url('js/notify.js'); ?>"></script>
  <style>
    td.details-control {
      background: url('/images/details_open.png') no-repeat center center;
      cursor: pointer;
    }

    tr.shown td.details-control {
      background: url('/images/details_close.png') no-repeat center center;
    }

    .sidebar a {
      color: white !important;
    }

    .sidebar .icon-menu {
      color: #77797c !important;
    }

    .btn-success {
      color: #fff !important;
      background-color: rgba(162, 203, 75, 1) !important;
      border-color: rgba(162, 203, 75, 1) !important;
    }
  </style>

  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/site.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/custom.css">
</head>

<body class="theme-blush font-krub light_version">

  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
      <div class="bar4"></div>
      <div class="bar5"></div>
    </div>
  </div>

  <div class="overlay"></div>
  <div id="wrapper">

    <?= $this->include('layout/navbar') ?>

    <?= $this->include('layout/sidebar') ?>

    <!-- main content  -->
    <div id="main-content">

      <?= $this->renderSection('content') ?>
    </div>


    <?= $this->include('layout/footer') ?>