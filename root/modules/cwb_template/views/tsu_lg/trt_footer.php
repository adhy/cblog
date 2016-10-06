     <?php foreach($js_fott as $urljs){echo "<script src='".base_url('assets')."/js/".$urljs."'></script>";}?>
    <script type="text/javascript">
    var url = '<?php echo base_url();?>';
    <?=$js_frlogin?>
  </script>
  <?php echo $this->session->flashdata('notif');?>
</body>
</html>