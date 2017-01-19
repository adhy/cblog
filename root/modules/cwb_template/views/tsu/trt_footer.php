<!-- /.modal -->
<!-- jQuery -->
    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->


    <?php if (!empty($end_modadd)){
      echo $end_modadd;
    } ?> 
    <?php if (!empty($end_modit)){
      echo $end_modit;
    } ?>
    <?php if (!empty($end_model)){
      echo $end_model;
    } ?>
    <script type="text/javascript">
      var urlrequire = '<?php echo base_url();?>';
    </script>
     <?php foreach($js_fott as $urljs){echo "<script src='".base_url('assets')."/private/js/".$urljs."'></script>";}?>


    <script type="text/javascript">
    var e = ' ';
    var url = '<?php echo base_url();?>';
        var csfrData = {};
csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo
$this->security->get_csrf_hash(); ?>';
set_tok(csfrData);
function set_tok(csfrData){
  $.ajaxSetup({
  data: csfrData
});
}

    <?php if (!empty($js_from)){echo $js_from;}?>

  </script>

  <?php echo $this->session->flashdata('notif');?>
</body>
</html>