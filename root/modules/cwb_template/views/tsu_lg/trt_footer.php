     <?php foreach($js_fott as $urljs){echo "<script src='".base_url('assets')."/private/js/".$urljs."'></script>";}?>
    <script type="text/javascript">
    var url = '<?php echo base_url();?>';
    var csfrData = {};
csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo
$this->security->get_csrf_hash(); ?>';
$.ajaxSetup({
data: csfrData
});


    <?=$js_frlogin?>
  </script>
  <?php echo $this->session->flashdata('notif');?>
</body>
</html>