<!-- jQuery -->
    <script src="<?php echo base_url('assets');?>/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets');?>/plugins/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/pace-1.0.2/pace.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/formValidation.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/formvalidation/js/language/id_ID.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/toastr/build/toastr.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/uniform/dist/jquery.uniform.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets');?>/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets');?>/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url('assets');?>/dist/js/<?php echo $filejs;?>"></script>
    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
<script type="text/javascript">
    var url = '<?php echo base_url();?>';
  </script>
  <?php echo $this->session->flashdata('notif');?>


</body>

</html>