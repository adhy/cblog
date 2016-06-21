<div id="confdel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header delete">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="h4text" class="modal-title"><i class="fa-question-circle">Delete </i></h4>
      </div>
      <div class="modal-body">
        <p id="bootstrap-confirm-dialog-text">Are you sure you want to delete this <?=$header?> ?</p>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left no" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger pull-right yes">Yes</button>
      </div>    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- jQuery -->
    <script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets');?>/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets');?>/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/pace.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/formValidation.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/language/id_ID.js"></script>
    <script src="<?php echo base_url('assets');?>/js/toastr.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/jquery.uniform.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/bootstrap-select.min.js"></script>
        <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets');?>/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/dataTables.responsive.js"></script>
    <script src="<?php echo base_url('assets');?>/js/chosen.jquery.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets');?>/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url('assets');?>/js/<?php echo $filejs;?>"></script>
    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
<script type="text/javascript">
    var url = '<?php echo base_url();?>';
  </script>
  <?php echo $this->session->flashdata('notif');?>


</body>

</html>