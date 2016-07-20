    <script src="<?php echo base_url('asset/root/js/jquery-1.9.1.min.js');?>"></script>
    <script src="<?php echo base_url('asset/root/js/jquery-ui-1.10.0.custom.min.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/jquery.chosen.min.js');?>"></script>
    <script src="<?php echo base_url('asset/root/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/root/js/metisMenu.min.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/jquery.uniform.min.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/jquery.dataTables.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/dataTables.responsive.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/dataTables.bootstrap.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/bootstrap-datepicker.js');?>"></script>
    <script src="<?php echo base_url('asset/root/js/bootstrap-select.js');?>"></script>
    <script src="<?php echo base_url('asset/root/js/tinymce/tinymce.min.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/formValidation.min.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/framework/bootstrap.js');?>"></script>
	<script src="<?php echo base_url('asset/root/js/language/id_ID.js');?>"></script>

    <script src="<?php echo base_url('asset/root/js/admin-costum.js');?>"></script>
<script type="text/javascript">
		$(document).ready(function() {
	tinymce.init({
        selector: 'textarea',
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect fontsizeselect",
        setup: function(editor) {
            editor.on('keyup', function(e) {
                // Revalidate the hobbies field
                $('#replaynow').formValidation('revalidateField', 'replay');
            });
        }
    });
    $('#replaynow')			
		.formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
        		
            replay: {
                    validators: {
                        callback: {
                            
                            callback: function(value, validator, $field) {
                                // Get the plain text without HTML
                                var text = tinyMCE.activeEditor.getContent({
                                    format: 'text'
                                });

                                return text.length >= 2;
                            }
                        }
                    }
                }
        }
	})
});
		
		</script>
</body>

</html>