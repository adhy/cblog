
    <script src="<?php echo base_url('asset/public/js/jquery-1.9.1.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/jquery-ui-1.10.0.custom.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/public.js');?>"></script>
    	<script type="text/javascript">

			     
      var xhr = new XMLHttpRequest();

		if(xhr.readyState==0||xhr.readyState==4){
			var url = "<?php echo site_url('parse/json/view/home/popular'); ?>";
			//xhr.open("GET", url, true);
			xhr.onreadystatechange = function () {
				if(xhr.readyState==4 && xhr.status==200){
					myFunction(xhr.responseText);	
				}			
			
			}
			xhr.open("GET", url, true);
			xhr.send();
			function myFunction(response) {
				var view = JSON.parse(response);
				var i;
				var out='';
				for(i=0;i<view.length;i++)
				{
				out +='<div class="col-md-4"><div  class="panel panel-default"><div class="panel-heading"><h4>'+view[i].judul+'</h4></div>';				
				out +='<div class="panel-body">'+view[i].isi+'';				
				out +='<?php echo anchor("page/'+view[i].link_cont+'","Read More", array("class"=>"btn btn-link")); ?> </div></div></div>';				
				}
				out +='';
				document.getElementById("recent").innerHTML=out;

			}
		}

   </script> 

</body>

</html>
