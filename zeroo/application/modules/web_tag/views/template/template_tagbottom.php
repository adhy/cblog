
    <script src="<?php echo base_url('asset/public/js/jquery-1.9.1.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/jquery-ui-1.10.0.custom.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/public.js');?>"></script>
    <script type="text/javascript">    
function tagfull(){
		var loadkategori = new XMLHttpRequest();
		if(loadkategori.readyState==0||loadkategori.readyState==4){
			var urll = "<?php echo site_url('parse/json/view/home/tag/'.$link.''); ?>";
			loadkategori.open("GET", urll, true);
			loadkategori.onreadystatechange =respon;
			loadkategori.send();
		}
	function respon(){
		if(loadkategori.readyState==4 ){
			if(loadkategori.status==200){
			var view = JSON.parse(loadkategori.responseText);
				var i;
				var out='';
				for(i=0;i<view.length;i++){
					out +='<h1 ><small><a href="<?php echo site_url("page/'+view[i].link_judul+'"); ?>">'+view[i].judul+'</a></small></h1>';	
					out +='<p><i class="fa fa-user"></i> by <a href="<?php echo site_url("about"); ?>"> <span id="by">'+view[i].by_me+'</span>  </a> | <i class="fa fa-folder"></i> Tag <a href="#'+view[i].name_tag+'"> '+view[i].name_tag+' </a> | <i class="fa fa-calendar"></i> '+view[i].date_post+'</p><hr>';
					out +='<div class="row"><div class="col-md-12"><a href="'+view[i].image_cont+'"><img class="img-responsive img-hover" src="'+view[i].image_cont+'" alt="'+view[i].judul+'" style="width: 100%;height: 140px;padding: 0px;margin: 0px;"></a></div></div>';
					out +='<div class="row"><div class="col-md-12"><p>'+view[i].isi+'</p>';
					out +='<a class="btn btn-link" href="<?php echo site_url("page/'+view[i].link_judul+'"); ?>">Read More <i class="fa fa-angle-right"></i></a><br/></div></div><div class="row"><hr class="bdc"></div>';
				}
				out +='';
				document.getElementById("tagfull").innerHTML=out;
			
			}else{
						var not_found='';
						not_found +='<div class="row"><div class="col-md-12"><p>Tag Not Found !</p><br/></div></div>';
						not_found +='<div class="row"><hr class="bdc"></div>';
						document.getElementById("tagfull").innerHTML=not_found;
			}
		}
	}
}		

   </script> 

</body>

</html>
