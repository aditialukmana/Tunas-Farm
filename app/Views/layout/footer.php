<script>
  var base_url = function() {
    return "<?php base_url(); ?>"
  }
</script>

<script src="<?php echo base_url(); ?>/theme/vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/theme/bundles/libscripts.bundle.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/bundles/vendorscripts.bundle.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/bundles/datatablescripts.bundle.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/vendor/jquery-datatable/buttons/dataTables.buttons.min.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/vendor/jquery-datatable/buttons/buttons.colVis.min.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/vendor/jquery-datatable/buttons/buttons.html5.min.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/vendor/jquery-datatable/buttons/buttons.print.min.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/vendor/sweetalert/sweetalert.min.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/bundles/mainscripts.bundle.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<script src="<?php echo base_url(); ?>/theme/js/pages/tables/jquery-datatable.js" type="89b559fa516af968a33a2339-text/javascript"></script>
<!-- <script src="<?php echo base_url('public/theme'); ?>/vendor/select2-4.0.13/dist/js/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/theme'); ?>/vendor/dropify/js/dropify.min.js" type="text/javascript"></script> -->

<?php if (isset($additional_ext_script)) : echo $additional_ext_script;
endif; ?>

<script src="<?php echo base_url('public/theme'); ?>/theme/js/custom.js" type="text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="89b559fa516af968a33a2339-|49" defer=""></script>

<script type="text/javascript">
  $(document).ready(function() {
    let alamat = window.location;
    let page = alamat.pathname.split('/');

    $('#menu-' + page[3]).addClass('active');
    $('#menu-' + page[3]).parents('li').addClass('active');
  });
</script>
</body>

</html>