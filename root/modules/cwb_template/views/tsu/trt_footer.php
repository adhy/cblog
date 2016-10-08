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

     <?php foreach($js_fott as $urljs){echo "<script src='".base_url('assets')."/js/".$urljs."'></script>";}?>
    <script type="text/javascript">
    var url = '<?php echo base_url();?>';
    var weburi = window.location.origin;
    <?php if (!empty($js_from)){echo $js_from;}?>
  </script>
  <?php echo $this->session->flashdata('notif');?>
</body>
</html>