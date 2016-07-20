
    <script src="<?php echo base_url('asset/public/js/jquery-1.9.1.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/jquery-ui-1.10.0.custom.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/public.js');?>"></script>
    <script type="text/javascript">    
	
	function about(){
		var loadabout = new XMLHttpRequest();
		if(loadabout.readyState==0||loadabout.readyState==4){
			var urll = "<?php echo site_url('parse/json/view/home/about'); ?>";
			//xhr.open("GET", url, true);
			loadabout.onreadystatechange = function () {
				if(loadabout.readyState==4 && loadabout.status==200){
					myabout(loadabout.responseText);	
					}			
			
			}
			loadabout.open("GET", urll, true);
			loadabout.send();
			function myabout(response) {
				var view = JSON.parse(response);
				var i;
				var out='';
				for(i=0;i<view.length;i++){	
					out +='<div class="pull-left"><img src="<?php echo base_url("asset/public/images/'+view[i].photo+'"); ?>" alt="'+view[i].nama+'" style="width: 200px; height: 210px;" class="img-thumbnail"></div>';
					out +='<div class="media-body"><h5 style="margin-top: 0 ;text-transform: capitalize;">'+view[i].nama+'</h5>'+view[i].deskripsi+'<div class="span3"><h4>Alamat</h4><ul class="unstyled address">';
					out +='<li><i class="fa fa-envelope"></i><strong> Email : </strong> '+view[i].email+'</li>';                            	
					out +='<li><i class="fa fa-flag"></i><strong> Country : </strong> '+view[i].country+'</li></ul></div><div class="author-meta"><ul class="list-unstyled list-inline list-social-icons">';
					var viewicon=view[i].icon_sos;
					for(b=0;b<viewicon.length;b++){
						out +='<li><a href="'+viewicon[b].link_sos+'" target="_blank">'+viewicon[b].icon_sos+'</a></li>';							
					}                            	
					out +='</ul></div></div>';				
				}
				out +='';
				document.getElementById("about").innerHTML=out;

			}
		}
		
	}

   </script> 

</body>

</html>
